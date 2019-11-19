<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
		<div class="container">
			<div class="row"  class="text-center">
				<p class="text-center col-md-12">
					Easy Accounting<br />
					Trial Balance<br />
					For the Year Ended December 31st, <?=date("Y");?><br />
					<button class="btn btn-primary" onClick="window.print()">Print</button>
					<button class="btn btn-primary" onClick="window.print()">Save</button>
					<button class="btn btn-primary" onClick="window.print()">Email</button>
				</p>
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

	asort($accountList);
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
		$moneySign = '$&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp';
		echo '
						<tr>
							<td><strong>'.$accountCategories[$accountOrder].':</strong></td>
							<td></td>
							<td></td>
						</tr>
		';
		$accountOrder += 1;

		asort($accountCategory);

		$categoryCount = 0;
		$textDecor = 'none';

		foreach ($accountCategory as $account){
			$categoryCount++;
			if ($categoryCount == count($accountCategory)){
				$textDecor = 'underline';
			}

			$accountTotal = $this->account_model->getAccountTotal($account['accountID']);
			if ($account['accountSide'] == 'Left (Debit)'){
				$totalDebitAccount += $accountTotal;
				echo '
						<tr>
							<td>'.$account['accountName'].'</td>
							<td style="text-decoration: '.$textDecor.';" class="text-right">'.$moneySign;
				if ($accountTotal != abs($accountTotal)){
					echo '('.number_format(abs($accountTotal), 2).')';
				}
				else {
					echo number_format($accountTotal, 2);
				}
				echo '</td>
							<td></td>
						</tr>
				';
			}
			else {
				$totalCreditAccount += $accountTotal;
				echo '
						<tr>
							<td>'.$account['accountName'].'</td>
							<td></td>
							<td style="text-decoration: '.$textDecor.';" class="text-right">'.$moneySign;
				if ($accountTotal != abs($accountTotal)){
					echo '('.number_format($accountTotal, 2).')';
				}
				else {
					echo number_format($accountTotal, 2);
				}
				echo '</td>
						</tr>
				';
			}
			$moneySign = '';
		}
	}
	echo '
						<tr>
							<td class="text-center"><strong>Total</strong></td>
							<td class="text-right" style="text-decoration: underline; text-decoration-style: double;"><strong>$'.number_format(abs($totalDebitAccount), 2).'</strong></td>
							<td class="text-right" style="text-decoration: underline; text-decoration-style: double;"><strong>$'.number_format(abs($totalCreditAccount), 2).'</strong></td>
						</tr>
	';
?>
					</tbody>
				</table>
			</div>
		</div>
