<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	$userID = $this->session->userdata('userID');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title><?=$title;?></title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://bootswatch.com/4/materia/bootstrap.min.css" />
		<link rel="stylesheet" href="<?=base_url('/assets/css/main.css');?>" />
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="container-fluid">
				<a class="navbar-brand" href="<?=site_url();?>">
					<img src="<?=base_url('/assets/img/logo.png');?>" height="20" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navBarLeft" aria-controls="navBarLeft" aria-expanded="false" aria-label="Toggle Navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navBarLeft">
					<div class="navbar-nav mr-auto">
						<a class="nav-item nav-link" href="<?=site_url('admin/');?>">Users</a>
						<a class="nav-item nav-link" href="<?=site_url('accounts/');?>">Accounts</a>
						<a class="nav-item nav-link" href="<?=site_url('logs/');?>">Logs</a>
						<a class="nav-item nav-link" href="<?=site_url('entries/');?>">Entries</a>
						<a class="nav-item nav-link" href="<?=site_url('ledgers/');?>">Ledgers</a>
<?php
	if ($userID){
		echo '						<a class="nav-item nav-link" href="'.site_url('profile').'">Profile</a>';
		echo '						<a class="nav-item nav-link" href="'.site_url('home/logout').'">Logout</a>';
	}
	else {
		echo '						<a class="nav-item nav-link" href="'.site_url('users/login').'">Login</a>';
		echo '						<a class="nav-item nav-link" href="'.site_url('users/register').'">Register</a>';
	}
?>
					</div>
				<span class="navbar-text">
<?php
	if ($userID){
		echo "					".$userData['userName'];
	}
?>
				</span>
				</div>
			</div>
		</nav>
		<div class="container" style="padding-top: 25px;">
<?php

	if ($this->session->flashdata('success')){
		echo '
			<div class="alert alert-success alert-dismissible fade show">
				'.$this->session->flashdata('success').'
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		';
	}
	if ($this->session->flashdata('warning')){
		echo '
			<div class="alert alert-warning alert-dismissible fade show">
				'.$this->session->flashdata('warning').'
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		';
	}
	if ($this->session->flashdata('danger')){
		echo '
			<div class="alert alert-danger alert-dismissible fade show">
				'.$this->session->flashdata('danger').'
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		';
	}
?>
		</div>
