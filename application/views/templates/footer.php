<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
		<div class="container">
			<footer class="text-center">
				<hr />
				<a href="<?=site_url();?>">Easy Accounting</a> &copy; <?=date("Y");?> All rights reserved.
			</footer>
		</div>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

		<script type="text/javascript">
		var debitCount  = 1;
		var creditCount = 1;
		$(document).ready(function() {
			$('button#addDebit').click(function(){
				var divOption    = '<div class="row" id="debitRow'+debitCount+'">';
				var selectOption = '<div class="col-5"><select class="form-control" name="entryDebitAccount[]" data-toggle="tooltip" data-placement="left" title="Debit Account">';
<?php
	foreach ($accountsList as $account) {
		$account = (array) $account;
		echo "
				selectOption += '<option value=\"{$account['accountID']}\">Debit: {$account['accountName']}</option>';
		";
	}
?>
				selectOption += '</select></div>';
				var inputOption   = $('<div class="col-5"><input class="form-control" placeholder="Entry Debit Balance" name="entryDebitBalance[]" type="number" step="0.01" required /></div>');
				var buttonOption  = $('<div class="col-2"><button id="removeDebit[]" class="btn btn-danger btn-block">Remove</button></div></div>');

				buttonOption.click(function() {
					$(this).parent().remove();
				});

				$('#debitAccounts').append(divOption);
				$('#debitRow'+debitCount).append(selectOption);
				$('#debitRow'+debitCount).append(inputOption);
				$('#debitRow'+debitCount).append(buttonOption);
				debitCount += 1;

			});

			$('button#addCredit').click(function(){
				var divOption    = '<div class="row" id="creditRow'+creditCount+'">';
				var selectOption = '<div class="col-5"><select class="form-control" name="entryCreditAccount'+creditCount+'" data-toggle="tooltip" data-placement="left" title="Credit Account">';
<?php
	foreach ($accountsList as $account) {
		$account = (array) $account;
		echo "
				selectOption += '<option value=\"{$account['accountID']}\">Credit: {$account['accountName']}</option>';
		";
	}
?>
				selectOption += '</select></div>';
				var inputOption   = $('<div class="col-5"><input class="form-control" placeholder="Entry Credit Balance" name="entryCreditBalance'+creditCount+'" type="number" step="0.01" required /></div>');
				var buttonOption  = $('<div class="col-2"><button id="removeCredit'+creditCount+'" class="btn btn-danger btn-block">Remove</button></div></div>');

				buttonOption.click(function() {
					$(this).parent().remove();
				});

				$('#creditAccounts').append(divOption);
				$('#creditRow'+count).append(selectOption);
				$('#creditRow'+count).append(inputOption);
				$('#creditRow'+count).append(buttonOption);
				creditCount += 1;

			});
		});
		</script>
		<script src="<?=base_url('/assets/js/main.js');?>"></script>
	</body>
</html>
