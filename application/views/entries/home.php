<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
		<div class="container">
			<div class="row">
				<h1>List of Users</h1>
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
		echo '
						<td>'.$entry['entryID'].'</td>
						<td>'.$entry['entryDescription'].'</td>
						<td class="text-right">'.$this->entry_model->getAccount($entry['entryDebitAccount'])['accountName'].'<br /><strong>$'.number_format($entry['entryDebitBalance'], 2).'</strong></td>
						<td class="text-right">'.$this->entry_model->getAccount($entry['entryCreditAccount'])['accountName'].'<br /><strong>$'.number_format($entry['entryCreditBalance'], 2).'</strong></td>
						<td>';
		if ($entry['entryStatus'] == 0 && $entry['entryStatusComment'] == NULL){
			echo 'Not Approved';

			if ($userData['userRole'] >= 10){
				echo "
					<br/ ><a href=".site_url("entries/approve/".$entry['entryID']).">Approve?</a>
					<br/ ><a href=".site_url("entries/reject/".$entry['entryID']).">Reject?</a>
				";
			}
		}
		elseif ($entry['entryStatus'] == 0 && $entry['entryStatusComment'] != NULL){
			echo 'Rejected - '.$entry['entryStatusComment'];
		}
		else {
			echo 'Approved';
		}
						echo '</td>
						<td>'.date('F d, Y | h:i A', strtotime($entry['entryCreateDate'])).'</td>
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
