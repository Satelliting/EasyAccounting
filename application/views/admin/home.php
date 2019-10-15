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
							<th>User ID</th>
							<th>User Email</th>
							<th>User Full Name</th>
							<th>User Role</th>
							<th>User Status</th>
<?php
	if ($userData['userRole'] == 20){
		echo '
							<th></th>
		';
	}
?>
						</tr>
					</thead>
					<tbody class="searchable">
<?php
	foreach ($userList as $user){
		$user = (array) $user;

		switch ($user['userRole']) {
			case '10':
				$userRole = "Manager";
				break;
			case '20':
				$userRole = "Administrator";
				break;
			default:
				$userRole = "Accountant";
				break;
		}

		switch ($user['userActive']) {
			case '0':
				$userStatus = "<span class='text-danger'>Disabled</span>";
				break;
			default:
				$userStatus = "<span class='text-success'>Active</span>";
				break;
		}

		echo '
						<tr class="text-center">
							<td>#'.$user["userID"].'</td>
							<td><a href="'.site_url("admin/email/".$user["userID"]).'">'.$user["userEmail"].'</a></td>
							<td>'.$user["userFirstName"]." ".$user["userLastName"].'</td>
							<td>'.$userRole.'</td>
							<td>'.$userStatus.'</td>';

		if ($userData['userRole'] == 20){
			echo '
							<td><a class="btn btn-info" href="'.site_url("admin/edit/".$user["userID"]).'">Edit User</a></td>
			';
		}
		echo '			</tr>
		';
	}
?>
					</tbody>
				</table>
				<br /><br />
<?php
	if ($userRole == 20){
		echo '
				<a class="btn btn-success btn-block" href="'.site_url("admin/create").'">Create User</a>
		';
	}
?>
			</div>
		</div>
