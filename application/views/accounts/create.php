<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
		<div class="container">
<?=validation_errors();?>
			<div class="card">
				<div class="card-header">
					<h2>Create an Account</h2>
				</div>
				<div class="card-body">
					<?=form_open(current_url());?>
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Account ID" name="accountID" type="number" min="0" step="1" required autofocus />
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Account Name" name="accountName" type="text" required />
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Account Starting Balance" name="accountBalance" type="number" min="0" step="1" required />
							</div>
							<div class="form-group">
								<select class="form-control" name="accountCategory">
									<option>Assets</option>
									<option>Liabilities</option>
									<option>Owner's Equity</option>
									<option>Revenues</option>
									<option>Operating Expenses</option>
								</select>
							</div>
							<div class="form-group">
								<select class="form-control" name="accountCategorySub">
									<option>Cash Related Accounts</option>
									<option>Recievables</option>
									<option>Inventories</option>
									<option>Prepaid Items</option>
									<option>Land</option>
									<option>Buildings</option>
									<option>Equipment</option>
									<option>Short-term Payables</option>
									<option>Owner's Equity</option>
									<option>Operating Revenues</option>
									<option>Other Revenues</option>
									<option>Cost of Goods Sold</option>
									<option>Selling Expenses</option>
									<option>General and Administrative Expenses</option>
								</select>
							</div>
							<div class="form-group">
								<select class="form-control" name="accountSide">
									<option value='L'>Left (Debit)</option>
									<option value='R'>Right (Credit)</option>
								</select>
							</div>
							<div class="form-group">
								<select class="form-control" name="accountStatement">
									<option value='BS'>Balance Statement</option>
									<option value='IS'>Income Statement</option>
								</select>
							</div>
							<input class="btn btn-lg btn-success btn-block" type="submit" value="Create Account" />
						</fieldset>
					</form>
				</div>
			</div>
		</div>
