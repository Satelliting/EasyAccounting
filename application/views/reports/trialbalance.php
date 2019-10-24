<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
		<div class="container">
			<div class="row">
				<h1>Reports | Trial Balance</h1>
				<div class="input-group" style="padding-bottom: 10px">
					<input id="filter" type="text" class="form-control" placeholder="Type here to filter...">
				</div>
			</div>

			<div class="row">
				<table class="table table-striped table-bordered table-hover">
					<thead class="thead-dark">
						<tr class="text-center">
							<th>Account Name</th>
							<th>Debit</th>
							<th>Credit</th>
						</tr>
					</thead>
					<tbody class="searchable">
<?php
	$totalDebitAccount  = 0;
	$totalCreditAccount = 0;

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
						<td></td>
					</tr>
		';
		$accountOrder += 1;
		foreach ($accountCategory as $account){
			echo '
						<tr>
							<td>'.$account["accountName"].'</td>
			';
			$accountSide = $account["accountDebit"] - $account["accountCredit"];
			if ($accountSide > 0){
				$totalDebitAccount += abs($accountSide);
				echo '
								<td class="text-right">$'.number_format(abs($accountSide), 2).'</td>
								<td></td>
				';
			}
			elseif ($accountSide < 0){
				$totalCreditAccount += abs($accountSide);
				echo '
								<td></td>
								<td class="text-right">$'.number_format(abs($accountSide), 2).'</td>
				';

			}
			else {
				echo '			<td></td>
								<td></td>
				';
			}
			echo '
							</tr>
			';
			}
		}
	echo '
							<tr>
								<td class="text-center"><strong>Total</strong></td>
								<td class="text-right"><strong>$'.number_format(abs($totalDebitAccount), 2).'</strong></td>
								<td class="text-right"><strong>$'.number_format(abs($totalCreditAccount), 2).'</strong></td>
							</tr>
	';
?>
					</tbody>
				</table>
				<br /><br />
				<a class="btn btn-success btn-block" href="<?=site_url("accounts/create");?>">Create Account</a>
			</div>
		</div>
