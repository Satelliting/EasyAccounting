<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
		<div class="container">
			<div class="row"  class="text-center">
				<p class="text-center col-md-12">
					Easy Accounting<br />
					Income Statement<br />
					For the Year Ended October 31st, <?=date("Y");?>
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
		echo '
					<tr>
						<td><strong>'.$accountCategories[$accountOrder].'</strong></td>
						<td></td>
					</tr>
		';
		foreach ($accountCategory as $account){
			$accountBalance = $account['accountDebit'] - $account['accountCredit'];
			if ($account['accountCategory'] == 'Revenues'){
				$revenueTotal += $accountBalance;
			}
			else {
				$expensesTotal += $accountBalance;
			}
			echo '
						<tr>
							<td>'.$account['accountName'].'</td>
							<td class="text-right">$'.number_format(abs($accountBalance), 2).'</td>
							</tr>
			';
			}
		if ($accountCategories[$accountOrder] == 'Revenues'){
			$accountAmount = number_format(abs($revenueTotal), 2);
		}
		else {
			$accountAmount = number_format(abs($expensesTotal), 2);
		}
		echo '
							<tr>
								<td class="text-center"><strong>Total '.$accountCategories[$accountOrder].'</strong></td>
								<td class="text-right" style="text-decoration: underline;"><strong>$'.$accountAmount.'</strong></td>
							</tr>
		';
		$accountOrder += 1;
		}
	echo '
							<tr>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td class="text-center"><strong>Net Income</strong></td>
								<td class="text-right" style="text-decoration: underline; text-decoration-style: double;"><strong>$'.number_format((abs($revenueTotal) - $expensesTotal), 2).'</strong></td>
							</tr>
	';
?>
					</tbody>
				</table>
			</div>
		</div>
