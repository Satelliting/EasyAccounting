<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Ledger_model extends CI_model{


		# Get Accounts(s) Info Model
		public function getLedgers($ledgerID = NULL){
			$ledgerInfo = NULL;

			if ($ledgerID == NULL){
				$getSQL = "SELECT * FROM ledgers";
			}
			else {
				$getSQL = "SELECT * FROM ledgers WHERE ledgerID='{$ledgerID}'";
			}

			$queryDB = $this->db->query($getSQL);
			$ledgerInfo = $queryDB->result();
			return $ledgerInfo;
		}


	}
