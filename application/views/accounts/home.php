<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
		<div class="container">
			<div class="row">
				<span class="float-left"><h1>List of Accounts</h1></span>
				<span class="float-right mx-5">
					<a class="btn btn-primary btn-block" href="<?=site_url("accounts/create");?>">Create Account</a>
				</span>
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
							<th>Debit</th>
							<th>Credit</th>
							<th>Statement</th>
<?php
	if ($userData['userRole'] == 20){
		echo '
							<th></th>
		';
	}
?>
						</tr>
					</thead>
					<tbody class="searchable">
<?php
	foreach ($accountList as $account){
		$account = (array) $account;
		echo '
						<tr class="text-center">
							<td><a href="'.site_url()."ledgers/index/".$account["accountID"].'">#'.$account["accountID"].'</a></td>
							<td><a href="'.site_url()."ledgers/index/".$account["accountID"].'">'.$account["accountName"].'</a></td>
							<td>'.$account["accountCategory"].'</td>
							<td>'.$account["accountCategorySub"].'</td>
							<td class="text-left">'.$account["accountSide"].'</td>
							<td class="text-right">$'.number_format($account["accountBalance"], 2).'</td>
							<td class="text-right">$'.number_format($account["accountDebit"], 2).'</td>
							<td class="text-right">$'.number_format($account["accountCredit"], 2).'</td>
							<td class="text-left">'.$account["accountStatement"].'</td>';
		if ($userData['userRole'] == 20){
			echo '
							<td><a class="btn btn-info" href="'.site_url("accounts/edit/".$account["accountID"]).'">Edit Account</a></td>
			';
		}
		echo '			</tr>
		';
	}
?>
					</tbody>
				</table>
			</div>
		</div>
