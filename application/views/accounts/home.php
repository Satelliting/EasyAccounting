<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
		<div class="container">
			<div class="row">
				<h1>List of Accounts</h1>
				<div class="input-group" style="padding-bottom: 10px">
					<input id="filter" type="text" class="form-control" placeholder="Type here to filter...">
				</div>
			</div>

			<div class="row">
				<table class="table table-striped table-bordered table-hover">
					<thead class="thead-dark">
						<tr class="text-center">
							<th>Account ID</th>
							<th>Name</th>
							<th>Category</th>
							<th>Sub-Category</th>
							<th>Normal Side</th>
							<th>Balance</th>
							<th>Debits</th>
							<th>Credits</th>
							<th>Statement</th>
							<th></th>
						</tr>
					</thead>
					<tbody class="searchable">
<?php
	foreach ($accountList as $account){
		$account = (array) $account;

		switch ($account['accountSide']) {
			case 'L':
				$accountSide = "Left (Debit)";
				break;
			default:
				$accountSide = "Right (Credit)";
				break;
		}

		switch ($account['accountStatement']) {
			case 'BS':
				$accountStatement = "Balance Statement";
				break;
			default:
				$accountStatement = "Income Statement";
				break;
		}
		setlocale(LC_MONETARY, 'en_US');
		echo '
						<tr class="text-center">
							<td>#'.$account["accountID"].'</td>
							<td>'.$account["accountName"].'</td>
							<td>'.$account["accountCategory"].'</td>
							<td>'.$account["accountCategorySub"].'</td>
							<td>'.$accountSide.'</td>
							<td>$'.number_format($account["accountBalance"], 2).'</td>
							<td>$'.number_format($account["accountDebit"], 2).'</td>
							<td>$'.number_format($account["accountCredit"], 2).'</td>
							<td>'.$accountStatement.'</td>
							<td><a class="btn btn-info" href="'.site_url("accounts/edit/".$account["accountID"]).'">Edit Account</a></td>
						</tr>
		';
	}
?>
					</tbody>
				</table>
				<br /><br />
				<a class="btn btn-success btn-block" href="<?=site_url("accounts/create");?>">Create Account</a>
			</div>
		</div>
