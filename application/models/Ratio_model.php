<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Ratio_model extends CI_model{


        # Get Quick Ratio Model
		public function quickRatio(){
			$getSQL = "SELECT * FROM accounts WHERE accountName='Cash' OR accountName='Accounts Receivable'";
			$queryDB = $this->db->query($getSQL);
			$accountInfo = $queryDB->result();

			$currentAssets = 0.00;

			foreach ($accountInfo as $account){
				$account = (array) $account;
				$currentAssets += $account['accountDebit'] - $account['accountCredit'];
			}

			var_dump($currentAssets);

			$getSQL = "SELECT * FROM accounts WHERE accountCategorySub='Current Liabilities'";
			$queryDB = $this->db->query($getSQL);
			$accountInfo = $queryDB->result();

			$currentLiabilities = 0.00;

			foreach ($accountInfo as $account){
				$account = (array) $account;
				$currentLiabilities += $account['accountCredit'] - $account['accountDebit'];
			}

			var_dump($currentLiabilities);
			return $currentAssets / $currentLiabilities;
        }
        

        # Get Current Ratio Model
		public function currentRatio(){
			$getSQL = "SELECT * FROM accounts WHERE accountCategorySub='Current Assets'";
			$queryDB = $this->db->query($getSQL);
			$accountInfo = $queryDB->result();

			$currentAssets = 0.00;

			foreach ($accountInfo as $account){
				$account = (array) $account;
				$currentAssets += $account['accountDebit'] - $account['accountCredit'];
			}

			$getSQL = "SELECT * FROM accounts WHERE accountCategorySub='Current Liabilities'";
			$queryDB = $this->db->query($getSQL);
			$accountInfo = $queryDB->result();

			$currentLiabilities = 0.00;

			foreach ($accountInfo as $account){
				$account = (array) $account;
				$currentLiabilities += $account['accountCredit'] - $account['accountDebit'];
			}
			return $currentAssets / $currentLiabilities;

        }
        

        # Get Debt Ratio Model
        public function debtRatio(){
            $getSQL = "SELECT * FROM accounts WHERE accountCategory='Assets'";
			$queryDB = $this->db->query($getSQL);
			$accountInfo = $queryDB->result();

			$totalAssets = 0.00;

			foreach ($accountInfo as $account){
				$account = (array) $account;
				$totalAssets += $account['accountDebit'] - $account['accountCredit'];
			}

			$getSQL = "SELECT * FROM accounts WHERE accountCategory='Liabilities'";
			$queryDB = $this->db->query($getSQL);
			$accountInfo = $queryDB->result();

			$totalLiabilities = 0.00;

			foreach ($accountInfo as $account){
				$account = (array) $account;
				$totalLiabilities += $account['accountCredit'] - $account['accountDebit'];
			}
			return $totalLiabilities / $totalAssets;
        }

    }