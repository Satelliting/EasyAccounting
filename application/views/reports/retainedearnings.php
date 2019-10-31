<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
		<div class="container">
			<div class="row"  class="text-center">
				<p class="text-center col-md-12">
					Easy Accounting<br />
					Statement of Retained Earnings<br />
					For the Year Ended October 30, 2019<br />
				</p>
			</div>

			<div class="row">
				<table class="table table-striped table-bordered table-hover">
					<thead class="thead-dark">
						<tr class="text-center">
							<th>Accounts</th>
							<th>Amounts</th>
						</tr>
					</thead>
					<tbody class="searchable">
						<tr>
							<td class="text-center">Beg Retained Earnings, 10/1/19</td>
							<td class="text-right">$0.00</td>
						</tr>
<?php
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
	echo '
							<tr>
								<td class="text-center">Add: Net Income</td>
								<td class="text-right">$'.number_format($netIncome, 2).'</td>
							</tr>
							<tr>
								<td class="text-center">Less: Dividends</td>
								<td class="text-right" style="text-decoration: underline;">$'.number_format($dividends, 2).'</td>
							</tr>
							<tr>
								<td class="text-center"><strong>Retained Earnings as of '.date("F j, Y").'</strong></td>
								<td class="text-right" style="text-decoration: underline; text-decoration-style: double;"><strong>$'.number_format($retainedEarnings, 2).'</strong></td>
							</tr>
	';
?>
					</tbody>
				</table>
			</div>
		</div>
