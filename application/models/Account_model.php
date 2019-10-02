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


	}
