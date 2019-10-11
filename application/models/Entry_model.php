<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Entry_model extends CI_model{


		# Get Entry(s) Info Model
		public function getEntries($entryID = NULL){
			$entryInfo = NULL;

			if ($entryID == NULL){
				$getSQL = "SELECT * FROM ledgers";
			}
			else {
				$getSQL = "SELECT * FROM ledgers WHERE entryID='{$entryID}'";
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


		# Get Entry(s) Info Model
		public function getAccounts($accountType = "L"){
			$accountsInfo = NULL;

			switch ($accountType) {
				case "L":
					$getSQL = "SELECT * FROM accounts WHERE accountSide='L'";
					break;
				case "R":
					$getSQL = "SELECT * FROM accounts WHERE accountSide='R'";
					break;
			}

			$queryDB = $this->db->query($getSQL);
			$accountsInfo = $queryDB->result();
			return $accountsInfo;
		}


	}
