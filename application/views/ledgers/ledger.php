<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
		<div class="container">
			<div class="row">
				<h1>General Ledger: #<?=$ledgerInfo['ledgerID'];?></h1>
			</div>
			<div class="row">
				<table class="table table-striped table-bordered table-hover">
					<thead class="thead-dark">
						<tr class="text-center">
							<th>Account Name</th>
							<th>Account Debit</th>
							<th>Account Statement</th>
							<th>Account Credit</th>
						</tr>
					</thead>
					<tbody class="searchable">

<?php
	$accountsList = array();
	foreach ($accountList as $account){
		$account = (array) $account;
		if ($account['accountDebit'] > 0 || $account['accountCredit'] > 0){
			array_push($accountsList, $account);
		}
	}

	foreach ($accountsList as $account){
		switch ($account['accountStatement']) {
			case 'BS':
				$accountStatement = "Balance Statement";
				break;
			default:
				$accountStatement = "Income Statement";
				break;
		}

		echo '<tr>';
		echo '<td><strong>'.$account['accountName'].'</strong></td>';
		echo '<td class="text-center">'.$accountStatement.'</td>';
		echo '<td class="text-right">$'.number_format($account['accountDebit'], 2).'</td>';
		echo '<td class="text-right">$'.number_format($account['accountCredit'], 2).'</td>';
		echo '</tr>';
	}

?>
					</tbody>
				</table>
			</div>
		</div>
