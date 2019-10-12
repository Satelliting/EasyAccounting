<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
		<div class="container">
<?=validation_errors();?>
			<div class="card">
				<div class="card-header">
					<h2>Create an Entry</h2>
				</div>
				<div class="card-body">
					<?=form_open(current_url());?>
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Entry Description" name="entryDescription" type="text" required />
							</div>
							<div class="form-group">
								<select class="form-control" name="entryDebitAccount" data-toggle="tooltip" data-placement="left" title="Debit Account">
<?php
	foreach ($accountsList as $account) {
		$account = (array) $account;
		var_dump($account);
		echo "
									<option value='{$account['accountID']}'>{$account['accountName']}</option>
		";
	}
?>
								</select>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Entry Debit Balance" name="entryDebitBalance" type="number" step="0.01" required />
							</div>
							<div class="form-group">
								<select class="form-control" name="entryCreditAccount" data-toggle="tooltip" data-placement="left" title="Credit Account">
<?php
	foreach ($accountsList as $account) {
		$account = (array) $account;
		var_dump($account);
		echo "
									<option value='{$account['accountID']}'>{$account['accountName']}</option>
		";
	}
?>
								</select>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Entry Credit Balance" name="entryCreditBalance" type="number" step="0.01" required />
							</div>
							<input class="btn btn-lg btn-success btn-block" type="submit" value="Create Entry" />
						</fieldset>
					</form>
				</div>
			</div>
		</div>
