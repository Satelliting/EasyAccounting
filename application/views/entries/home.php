<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
		<div class="container">
			<div class="row">
				<h1>List of Entries</h1>
				<div class="input-group" style="padding-bottom: 10px">
					<input id="filter" type="text" class="form-control" placeholder="Type here to filter...">
				</div>
			</div>

			<div class="row">
				<table class="table table-striped table-bordered table-hover">
					<thead class="thead-dark">
						<tr class="text-center">
							<th>Entry ID</th>
							<th>Entry Description</th>
							<th>Entry Debit</th>
							<th>Entry Credit</th>
							<th>Entry Status</th>
							<th>Entry Date</th>
						</tr>
					</thead>
					<tbody class="searchable text-center">
<?php
	foreach ($entryList as $entry){
		$entry = (array) $entry;
		$entry['entryDebitAccount'] = json_decode($entry['entryDebitAccount']);
		$entry['entryDebitBalance'] = json_decode($entry['entryDebitBalance']);
		$entry['entryCreditAccount'] = json_decode($entry['entryCreditAccount']);
		$entry['entryCreditBalance'] = json_decode($entry['entryCreditBalance']);
		echo '
					<tr>
						<td>#'.$entry['entryID'].'</td>
						<td>'.$entry['entryDescription'].'</td>
						<td class="text-right">';
		foreach ($entry['entryDebitAccount'] as $debitAccount){
			$entryNumber = array_search($debitAccount, $entry['entryDebitAccount']);
			echo '<a href="'.site_url().'ledgers/index/'.$this->entry_model->getAccount($debitAccount)['accountID'].'">'.$this->entry_model->getAccount($debitAccount)['accountName'].'</a><br /><strong>$'.number_format($entry['entryDebitBalance'][$entryNumber], 2).'</strong><br />';
		}
						echo '</td><td class="text-right">';
		foreach ($entry['entryCreditAccount'] as $creditAccount){
			$entryNumber = array_search($creditAccount, $entry['entryCreditAccount']);
			echo '<a href="'.site_url().'ledgers/index/'.$this->entry_model->getAccount($creditAccount)['accountID'].'">'.$this->entry_model->getAccount($creditAccount)['accountName'].'</a><br /><strong>$'.number_format($entry['entryCreditBalance'][$entryNumber], 2).'</strong><br />';
		}
						echo '</td><td>';
		if ($entry['entryStatus'] == 0 && $entry['entryStatusComment'] == NULL){
			echo '<span class="text-warning">Pending</span>';

			if ($userData['userRole'] >= 10){
				echo "
					<br/ ><a href=".site_url("entries/approve/".$entry['entryID']).">Approve?</a>
					<br/ ><a href=".site_url("entries/reject/".$entry['entryID']).">Reject?</a>
				";
			}
		}
		elseif ($entry['entryStatus'] == 0 && $entry['entryStatusComment'] != NULL){
			echo '<span class="text-danger">Rejected - '.$entry['entryStatusComment'].'</span>';
		}
		else {
			echo '<span class="text-success">Approved</span>';
		}
						echo '</td>
						<td>'.date('F d, Y | h:i A', strtotime($entry['entryCreateDate'])).'</td>
					</tr>
		';
	}
?>
					</tbody>
				</table>
			</div>

			<div class="row">
				<a class="btn btn-success btn-block" href="<?=site_url("entries/create");?>">Create Entry</a>
			</div>
		</div>
