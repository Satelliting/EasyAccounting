<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Entry_model extends CI_model{


		# Get Entry(s) Info Model
		public function getEntries($entryID = NULL){
			$entryInfo = NULL;

			if ($entryID == NULL){
				$getSQL = "SELECT * FROM entries";
			}
			else {
				$getSQL = "SELECT * FROM entries WHERE entryID='{$entryID}'";
			}

			$queryDB = $this->db->query($getSQL);
			$entryInfo = $queryDB->result();
			return $entryInfo;
		}


		# Create Entry Model
		public function createEntry($entryInfo){
			if ($this->db->insert('entries', $entryInfo)){
				return true;
			}
			return false;
		}


		# Approve Entry Model
		public function approveEntry($entryID){
			$entryInfo = array('entryStatus' => 1);

			$this->db->where('entryID', $entryID);
			$this->db->update('entries', $entryInfo);

			return true;
		}


		# Reject Entry Model
		public function rejectEntry($entryID){
			$entryInfo = array('entryStatusComment' => 'Default rejection.');

			$this->db->where('entryID', $entryID);
			$this->db->update('entries', $entryInfo);

			return true;
		}


		# Get Accounts(s) Info Model
		public function getAccounts($accountType = NULL){
			$accountsInfo = NULL;

			switch ($accountType) {
				case "L":
					$getSQL = "SELECT * FROM accounts WHERE accountSide='L'";
					break;
				case "R":
					$getSQL = "SELECT * FROM accounts WHERE accountSide='R'";
					break;
				default:
					$getSQL = "SELECT * FROM accounts";
					break;
			}

			$queryDB = $this->db->query($getSQL);
			$accountsInfo = $queryDB->result();
			return $accountsInfo;
		}


		# Get Account Name Model
		public function getAccount($accountID){
			$getSQL = "SELECT * FROM accounts WHERE accountID='{$accountID}'";
			$queryDB = $this->db->query($getSQL);
			$accountInfo = (array) $queryDB->result()[0];
			return $accountInfo;
		}


	}
