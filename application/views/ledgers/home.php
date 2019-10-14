<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
		<div class="container">
			<div class="row">
				<h1>List of Ledgers</h1>
				<div class="input-group" style="padding-bottom: 10px">
					<input id="filter" type="text" class="form-control" placeholder="Type here to filter...">
				</div>
			</div>

			<div class="row">
				<table class="table table-striped table-bordered table-hover">
					<thead class="thead-dark">
						<tr class="text-center">
							<th>Ledger ID</th>
							<th>Ledger Creation Date</th>
							<th>Ledger Closed Date</th>
						</tr>
					</thead>
					<tbody class="searchable text-center">
<?php
	foreach ($ledgerList as $ledger){
		$ledger = (array) $ledger;
		echo '
					<tr>
						<td><a href="'.current_url().'/ledger/'.$ledger['ledgerID'].'">#'.$ledger['ledgerID'].'</a></td>
						<td>'.date('F d, Y | h:i A', strtotime($ledger['ledgerCreateDate'])).'</td>
		';

		if (is_null($ledger['ledgerCloseDate'])){
			echo '		<td><strong><span class="text-success">Current Ledger</span></strong></td>
			';
		}
		else {
			echo '		<td>'.date('F d, Y | h:i A', strtotime($ledger['ledgerCloseDate'])).'</td>
			';

		}
		echo '
					</tr>
		';
	}
?>
					</tbody>
				</table>
			</div>
		</div>
