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
						<td><a href="'.site_url().'entries/index/'.$entry['entryID'].'">#'.$entry['entryID'].'</a></td>
						<td>';
		echo $entry['entryDescription'];
		$entryFiles = glob('assets/files/entries/'.$entry['entryID'].'/*.*');
		if (!empty($entryFiles)){
			echo '<br /><br />';
			$fileCount = 1;
			foreach ($entryFiles as $file){
				echo '<a href="'.site_url().$file.'" target="_blank">File '.$fileCount.'</a><br />';
				$fileCount++;
			}
		}
		echo 			'</td>
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
				echo '
					<br/ ><a href='.site_url("entries/approve/".$entry['entryID']).'>Approve?</a>
					<br/ ><span class="text-danger"><a data-toggle="modal" data-target="#reject'.$entry['entryID'].'">Reject?</span></a>
				';

				echo '
					<div class="modal fade" id="reject'.$entry['entryID'].'" tabindex="-1" aria-labelledby="reject'.$entry['entryID'].'Title" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="reject'.$entry['entryID'].'Title">Reject Entry: #'.$entry['entryID'].'</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<p class="text-left">
										Are you sure you wish to reject Entry: #'.$entry['entryID'].'?<br ?>
										If so, please give a reason why below.
									</p>
									'.form_open(site_url("entries/reject/".$entry['entryID'])).'
										<fieldset>
											<div class="form-group">
												 <textarea class="form-control" placeholder="Reject Reason" name="rejectReason" id="rejectReason" rows="3" required></textarea>
											</div>
											<div class="form-group float-right">
												 <input class="btn btn-lg btn-danger" type="submit" value="Reject Entry" />
											</div>
										</fieldset>
									</form>
								</div>
							</div>
						</div>
					</div>
				';
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

<div class="modal fade" id="reject10000004" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="reject10000004Title">Reject Entry: #ENTRYNO</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
Are you sure you wish to reject the entry? If so, please give a reason why below.
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="button" class="btn btn-danger">Reject Entry</button>
</div>
</div>
</div>
</div>

			<div class="row">
				<a class="btn btn-success btn-block" href="<?=site_url("entries/create");?>">Create Entry</a>
			</div>
		</div>
