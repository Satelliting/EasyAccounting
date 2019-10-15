<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
		<div class="container">
			<div class="row">
				<h1>
					List of Ledgers
<?php
	if (current_url() != 'http://localhost/ci/ledgers'){
		echo '| <a class="btn btn-primary" href="'.site_url().'ledgers">Show All</a>';
	}
?>
				</h1>
				<div class="input-group" style="padding-bottom: 10px">
					<input id="filter" type="text" class="form-control" placeholder="Type here to filter...">
				</div>
			</div>

			<div class="row">
<?php

	foreach ($accountList as $account){
		$account = (array) $account;
		$accountEntries = array();

		foreach($entryList as $entry){
			$entry = (array) $entry;
			if ($entry['entryDebitAccount'] == $account['accountID'] || $entry['entryCreditAccount'] == $account['accountID']){
				array_push($accountEntries, $entry);
			}
		}

		if (!empty($accountEntries)){
			echo '<h3 class="pull-left"><a href="'.site_url().'/ledgers/index/'.$account['accountID'].'">'.$account['accountName'].'</a></h3>';

			echo '
				<table class="table table-striped table-bordered table-hover">
					<thead class="thead-dark">
						<tr class="text-center">
							<th>Entry ID</th>
							<th>Entry Description</th>
							<th>Entry Debit</th>
							<th>Entry Credit</th>
							<th>Entry Date</th>
						</tr>
					</thead>
					<tbody class="searchable text-center">
			';
			foreach ($accountEntries as $entry){
				$entry = (array) $entry;
				echo '
							<tr>
								<td>#'.$entry['entryID'].'</td>
								<td>'.$entry['entryDescription'].'</td>
								<td class="text-right"><a href="'.site_url().'/ledgers/index/'.$this->entry_model->getAccount($entry['entryDebitAccount'])['accountID'].'">'.$this->entry_model->getAccount($entry['entryDebitAccount'])['accountName'].'</a><br /><strong>$'.number_format($entry['entryDebitBalance'], 2).'</strong></td>
								<td class="text-right"><a href="'.site_url().'/ledgers/index/'.$this->entry_model->getAccount($entry['entryCreditAccount'])['accountID'].'">'.$this->entry_model->getAccount($entry['entryCreditAccount'])['accountName'].'</a><br /><strong>$'.number_format($entry['entryCreditBalance'], 2).'</strong></td>
								<td>'.date('F d, Y | h:i A', strtotime($entry['entryCreateDate'])).'</td>
							</tr>
				';
			}
			echo '
					</tbody>
				</table>
			';
		}
	}

?>
			</div>
		</div>
