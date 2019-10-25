<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
		<div class="container">
			<div class="row">
				<h1><?= $title;?></h1>
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
		}
		elseif ($account['accountCategory'] == 'Liabilities'){
			$accountAmount = number_format(abs($liabilitiesTotal), 2);
		}
		else {
			$accountAmount = number_format(abs($equityTotal), 2);
		}
		echo '
							<tr>
								<td class="text-center"><strong>Total '.$accountCategories[$accountOrder].'</strong></td>
								<td class="text-right"><strong>$'.$accountAmount.'</strong></td>
							</tr>
		';
		$accountOrder += 1;
	}
?>
					</tbody>
				</table>
			</div>
		</div>
