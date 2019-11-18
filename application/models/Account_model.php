<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Account_model extends CI_model{


		# Get Accounts(s) Info Model
		public function getAccounts($accountID = NULL){
			$accountInfo = NULL;

			if ($accountID == NULL){
				$getSQL = "SELECT * FROM accounts";
			}
			else {
				$getSQL = "SELECT * FROM accounts WHERE accountID='{$accountID}'";
			}

			$queryDB = $this->db->query($getSQL);
			$accountInfo = $queryDB->result();
			return $accountInfo;
		}


		# Create Account Model
		public function createAccount($accountInfo){
			switch ($accountInfo['accountSide']) {
				case 'L':
					$accountInfo['accountDebit']  = $accountInfo['accountBalance'];
					$accountInfo['accountCredit'] = 0;
					break;

				default:
					$accountInfo['accountDebit']  = 0;
					$accountInfo['accountCredit'] = $accountInfo['accountBalance'];
					break;
			}
			if ($this->db->insert('accounts', $accountInfo)){
				return true;
			}
			return false;
		}


		# Change Edited Account's Info Model
		public function accountEdit($accountInfo){
			$this->db->where('accountID', $accountInfo['accountID']);
			$this->db->update('accounts', $accountInfo);

			return true;
		}



		# Delete Account Model
		public function accountDelete($accountID){
			$dbCheck = $this->db->delete('accounts', array('accountID' => $accountID));
			if($dbCheck){
				return true;
			}
			return false;
		}

		# Get Total of Account Category
		public function getAccountCategoryTotal($accountCategory){
			$getSQL = "SELECT * FROM accounts WHERE accountCategory='{$accountCategory}'";
			$queryDB = $this->db->query($getSQL);
			$accountInfo = $queryDB->result();

			$categoryTotal = 0;

			foreach ($accountInfo as $account){
				$account = (array) $account;
				switch($accountCategory){
					case 'Assets':
						$categoryTotal += $account['accountDebit'] - $account['accountCredit'];
					break;
					case 'Liabilities':
						$categoryTotal += $account['accountCredit'] - $account['accountDebit'];
					break;
				}
			}
			return $categoryTotal;
		}


		# Get Entry Total
		public function getEntryTotal($entryType = NULL){
			switch($entryType){
				case 'approved':
					$getSQL = "SELECT * FROM entries WHERE entryStatus=1";
				break;
				case 'pending':
					$getSQL = "SELECT * FROM entries WHERE entryStatus=0 AND entryStatusComment IS NULL";
				break;
				case 'rejected':
					$getSQL = "SELECT * FROM entries WHERE entryStatus=0 AND entryStatusComment IS NOT NULL";
				break;
				default:
					$getSQL = "SELECT * FROM entries";
				break;
			}
			$queryDB = $this->db->query($getSQL);
			$accountInfo = $queryDB->result();
			return count($accountInfo);
		}


	}
