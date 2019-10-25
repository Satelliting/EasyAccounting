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
			if (in_array($account['accountID'], json_decode($entry['entryDebitAccount'])) || in_array($account['accountID'], json_decode($entry['entryCreditAccount']))){
				array_push($accountEntries, $entry);
			}
		}

		if (!empty($accountEntries)){
			echo '<h3 class="pull-left"><a href="'.site_url().'ledgers/index/'.$account['accountID'].'">'.$account['accountName'].'</a></h3>';

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

				$entryDebitAccounts = array();
				$entryDebitBalances = 0;

				$entryCreditAccounts = array();
				$entryCreditBalances = 0;

				foreach (json_decode($entry['entryDebitAccount']) as $debitAccount){
					array_push($entryDebitAccounts, array((string) $debitAccount => json_decode($entry['entryDebitBalance'])[$entryDebitBalances]));
					$entryDebitBalances += 1;
				}

				foreach (json_decode($entry['entryCreditAccount']) as $creditAccount){
					array_push($entryCreditAccounts, array((string) $creditAccount => json_decode($entry['entryCreditBalance'])[$entryCreditBalances]));
					$entryCreditBalances += 1;
				}

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
				foreach ($entryDebitAccounts as $account){
					$balance = $account[key($account)];
					$account = key($account);
					$accountInfo = $this->entry_model->getAccount($account);

					echo '<a href="'.current_url().'/index/'.$accountInfo['accountID'].'">'.$accountInfo['accountName'].'</a><br /><strong>$'.number_format($balance, 2).'</strong><br />';
				}
				echo '			</td>
								<td class="text-right">';
				foreach ($entryCreditAccounts as $account){
					$balance = $account[key($account)];
					$account = key($account);
					$accountInfo = $this->entry_model->getAccount($account);

					echo '<a href="'.current_url().'/index/'.$accountInfo['accountID'].'">'.$accountInfo['accountName'].'</a><br /><strong>$'.number_format($balance, 2).'</strong><br />';
				}
				echo '			</td>
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
