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
		

		# Get Return On Equity Ratio Model
		public function returnOnEquityRatio(){
			$getSQL = "SELECT * FROM accounts WHERE accountStatement = 'Income Statement' AND (accountDebit > 0 OR accountCredit > 0) ORDER BY accountCategory DESC";
			$queryDB = $this->db->query($getSQL);
			$accountList = $queryDB->result();

			$accounts = array();

			$revenueTotal  = 0;
			$expensesTotal = 0;

			foreach ($accountList as $account){
				$account = (array) $account;

				if (!isset($accounts[$account['accountCategory']])){
					$accounts[$account['accountCategory']] = array($account);
				}
				else {
					array_push($accounts[$account['accountCategory']], $account);
				}
			}

			$accountCategories = array_keys($accounts);
			$accountOrder = 0;
			foreach ($accounts as $accountCategory){
				foreach ($accountCategory as $account){
					$accountBalance = $account['accountDebit'] - $account['accountCredit'];
					if ($account['accountCategory'] == 'Revenues'){
						$revenueTotal += $accountBalance;
					}
					else {
						$expensesTotal += $accountBalance;
					}
				}
				if ($accountCategories[$accountOrder] == 'Revenues'){
					$accountAmount = number_format(abs($revenueTotal), 2);
				}
				else {
					$accountAmount = number_format(abs($expensesTotal), 2);
				}
			}

			$getSQL = "SELECT * FROM accounts WHERE accountCategory='Owners Equity'";
			$queryDB = $this->db->query($getSQL);
			$accountInfo = $queryDB->result();

			$totalEquity = 0.00;

			foreach ($accountInfo as $account){
				$account = (array) $account;
				$totalEquity += $account['accountCredit'] - $account['accountDebit'];
			}

			return (abs($revenueTotal) - $expensesTotal) / $totalEquity;
		}


		# Get Return On Assets Ratio Model
		public function returnOnAssetsRatio(){
			$getSQL = "SELECT * FROM accounts WHERE accountStatement = 'Income Statement' AND (accountDebit > 0 OR accountCredit > 0) ORDER BY accountCategory DESC";
			$queryDB = $this->db->query($getSQL);
			$accountList = $queryDB->result();

			$accounts = array();

			$revenueTotal  = 0;
			$expensesTotal = 0;

			foreach ($accountList as $account){
				$account = (array) $account;

				if (!isset($accounts[$account['accountCategory']])){
					$accounts[$account['accountCategory']] = array($account);
				}
				else {
					array_push($accounts[$account['accountCategory']], $account);
				}
			}

			$accountCategories = array_keys($accounts);
			$accountOrder = 0;
			foreach ($accounts as $accountCategory){
				foreach ($accountCategory as $account){
					$accountBalance = $account['accountDebit'] - $account['accountCredit'];
					if ($account['accountCategory'] == 'Revenues'){
						$revenueTotal += $accountBalance;
					}
					else {
						$expensesTotal += $accountBalance;
					}
				}
				if ($accountCategories[$accountOrder] == 'Revenues'){
					$accountAmount = number_format(abs($revenueTotal), 2);
				}
				else {
					$accountAmount = number_format(abs($expensesTotal), 2);
				}
			}

			$getSQL = "SELECT * FROM accounts WHERE accountCategory='Assets'";
			$queryDB = $this->db->query($getSQL);
			$accountInfo = $queryDB->result();

			$totalAssets = 0.00;

			foreach ($accountInfo as $account){
				$account = (array) $account;
				$totalAssets += $account['accountDebit'] - $account['accountCredit'];
			}

			return (abs($revenueTotal) - $expensesTotal) / $totalAssets;
		}


		# Get Asset Turnover Ratio Model
		public function assetTurnoverRatio(){
			$getSQL = "SELECT * FROM accounts WHERE accountCategory='Revenues'";
			$queryDB = $this->db->query($getSQL);
			$accountInfo = $queryDB->result();

			$totalRevenue = 0.00;

			foreach ($accountInfo as $account){
				$account = (array) $account;
				$totalRevenue += $account['accountCredit'] - $account['accountDebit'];
			}

			$getSQL = "SELECT * FROM accounts WHERE accountCategory='Assets'";
			$queryDB = $this->db->query($getSQL);
			$accountInfo = $queryDB->result();

			$totalAssets = 0.00;

			foreach ($accountInfo as $account){
				$account = (array) $account;
				$totalAssets += $account['accountDebit'] - $account['accountCredit'];
			}

			return $totalRevenue / $totalAssets;
		}

    }