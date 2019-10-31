<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
		<div class="container">
			<div class="row"  class="text-center">
				<p class="text-center col-md-12">
					Easy Accounting<br />
					Balance Sheet<br />
					At October 31st, <?=date("Y");?>
				</p>
			</div>

			<div class="row">
				<table class="table table-striped table-bordered table-hover">
					<thead class="thead-dark">
						<tr class="text-center">
							<th>Account Name</th>
							<th>Account Amount</th>
						</tr>
					</thead>
					<tbody class="searchable">
<?php

	function getRetainedEarnings($accountList){
		$revenueTotal  = 0;
		$expensesTotal = 0;

		$accounts = array();

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
		}
		$netIncome        = abs($revenueTotal) - $expensesTotal;
		$dividends        = 0;
		$retainedEarnings = $netIncome - $dividends;

		return $retainedEarnings;
	}

	$retainedEarnings = getRetainedEarnings($retainedEarningsList);


	$retainedEarningArray = array(
		"accountID" => "30009990",
		"accountName" => "Retained Earnings",
		"accountCategory" => "Owner's Equity",
		"accountCategorySub" => "Stockholders' Equity",
		"accountDebit" => 0,
		"accountCredit" => $retainedEarnings,
	);





	$assetsTotal      = 0;
	$liabilitiesTotal = 0;
	$equityTotal      = 0;

	$accounts = array();

	foreach ($accountList as $account){
		$account = (array) $account;

		if (!isset($accounts[$account['accountCategory']])){
			$accounts[$account['accountCategory']] = array($account);
		}
		else {
			array_push($accounts[$account['accountCategory']], $account);
		}
	}

	array_push($accounts["Owner's Equity"], $retainedEarningArray);

	$accountCategories = array_keys($accounts);
	$accountOrder = 0;
	foreach ($accounts as $accountCategory){
		echo '
					<tr>
						<td><strong>'.$accountCategories[$accountOrder].'</strong></td>
						<td></td>
					</tr>
		';
		foreach ($accountCategory as $account){
			$accountBalance = $account['accountDebit'] - $account['accountCredit'];
			if ($account['accountCategory'] == 'Assets'){
				$assetsTotal += $accountBalance;
			}
			elseif ($account['accountCategory'] == 'Liabilities'){
				$liabilitiesTotal += $accountBalance;
			}
			else {
				$equityTotal += $accountBalance;
			}
			echo '
						<tr>
							<td>'.$account['accountName'].'</td>
							<td class="text-right">$'.number_format(abs($accountBalance), 2).'</td>
							</tr>
			';
			}
		if ($accountCategories[$accountOrder] == 'Assets'){
			$accountAmount = number_format(abs($assetsTotal), 2);
			echo '
								<tr>
									<td class="text-center"><strong>Total '.$accountCategories[$accountOrder].'</strong></td>
									<td class="text-right" style="text-decoration: underline; text-decoration-style: double;"><strong>$'.$accountAmount.'</strong></td>
								</tr>
			';
		}
		elseif ($account['accountCategory'] == 'Liabilities'){
			$accountAmount = number_format(abs($liabilitiesTotal), 2);
			echo '
								<tr>
									<td class="text-center"><strong>Total '.$accountCategories[$accountOrder].'</strong></td>
									<td class="text-right" style="text-decoration: underline;"><strong>$'.$accountAmount.'</strong></td>
								</tr>
			';
		}
		else {
			$accountAmount = number_format(abs($equityTotal), 2);
			echo '
								<tr>
									<td class="text-center"><strong>Total '.$accountCategories[$accountOrder].'</strong></td>
									<td class="text-right" style="text-decoration: underline;"><strong>$'.$accountAmount.'</strong></td>
								</tr>
			';
		}
		$accountOrder += 1;
	}

	echo '
							<tr>
								<td class="text-center"><strong>Total Liabilities & Owner\'s Equity</strong></td>
								<td class="text-right" style="text-decoration: underline; text-decoration-style: double;"><strong>$'.number_format((abs($liabilitiesTotal) + abs($equityTotal)), 2).'</strong></td>
							</tr>
	';
?>
					</tbody>
				</table>
			</div>
		</div>
