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


		# Get Account Total Model
		public function getAccountTotal($accountID, $startDate='1970-01-01', $endDate=NULL){
			if ($endDate == NULL){
				$endDate = date("Y-m-d");
			}

			$getSQL = "SELECT * FROM entries WHERE( DATE(entryCreateDate) BETWEEN '{$startDate}' AND '{$endDate}') AND entryStatus=1";
			$queryDB = $this->db->query($getSQL);
			$accountEntries = $queryDB->result();

			$total = 0.00;
			$debitTotal  = 0.00;
			$creditTotal = 0.00;
			foreach($accountEntries as $entry){
				$debitAccounts = json_decode($entry->entryDebitAccount);
				if (in_array($accountID, $debitAccounts)){
					$debitLocation = array_search($accountID, $debitAccounts);
					$debitTotal += json_decode($entry->entryDebitBalance)[$debitLocation];
				}

				$creditAccounts = json_decode($entry->entryCreditAccount);
				if (in_array($accountID, $creditAccounts)){
					$creditLocation = array_search($accountID, $creditAccounts);
					$creditTotal += json_decode($entry->entryCreditBalance)[$creditLocation];
				}
			}

			switch($accountID){
				# Assets
				case $this->startsWith($accountID, '100'):
					$total = $debitTotal - $creditTotal;
				break;
				# Liabilities
				case $this->startsWith($accountID, '200'):
					$total = $creditTotal - $debitTotal;
				break;
				# Owners Equity
				case $this->startsWith($accountID, '300'):
					$total = $creditTotal - $debitTotal;
				break;
				# Revenues
				case $this->startsWith($accountID, '400'):
					$total = $creditTotal - $debitTotal;
				break;
				# Operating Expenses
				case $this->startsWith($accountID, '500'):
					$total = $debitTotal - $creditTotal;
				break;
			}


			return $total;
		}


		# Get Account Category Total Model
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


		public function startsWith ($string, $startString){
			$len = strlen($startString);
			return (substr($string, 0, $len) === $startString);
		}


	}
