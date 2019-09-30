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


		# Change Edited Account's Info Model (WIP)
		#public function changeAccountInfo($accountInfo){
		#	$accountCheck = $this->account_model->accountVerifyID($accountInfo['accountID']);
		#	if (!$accountCheck){
		#		return false;
		#	}
		#	$accountChange = $this->account_model->accountEdit($accountInfo, true);
		#	return $accountChange;
		#}



		# Delete Account Model
		public function deleteAccount($accountID){
			$dbCheck = $this->db->delete('accounts', array('accountID' => $accountID));
			if($dbCheck){
				return true;
			}
			return false;
		}


	}
