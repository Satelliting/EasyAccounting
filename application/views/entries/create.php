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
								<input class="form-control" placeholder="Entry Name" name="entryName" type="text" required />
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Entry Description" name="entryDescription" type="text" required />
							</div>
							<div class="form-group">
								<select class="form-control" name="entryPositiveCategory">
<?php
	foreach ($accountsPositiveList as $account) {
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
								<input class="form-control" placeholder="Entry Positive Balance" name="entryPositiveBalance" type="number" step="0.01" min="0" required />
							</div>
							<div class="form-group">
								<select class="form-control" name="entryNegativeCategory">
									<?php
										foreach ($accountsNegativeList as $account) {
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
								<input class="form-control" placeholder="Entry Negative Balance" name="entryNegativeBalance" type="number" step="0.01" min="0" required />
							</div>
							<input class="btn btn-lg btn-success btn-block" type="submit" value="Create Entry" />
						</fieldset>
					</form>
				</div>
			</div>
		</div>
