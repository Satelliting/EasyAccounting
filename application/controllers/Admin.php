<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin extends CI_Controller {


		# Default Constructor Function
		public function __construct(){
			parent::__construct();
			$this->load->model('admin_model');
		}


		# Admin Index Function
		public function index(){
			$userRole = $this->session->userdata('userRole');
			if ($userRole != 20){
				$this->session->set_flashdata('danger', 'You do not have permission to view this.');
				redirect('users');
			}
			else {
				$data['userData'] = $this->session->userdata();
				$data['title']    = 'Admin | List of Users';
				$data['userList'] = $this->admin_model->getUsers();
				$this->load->template('admin/home', $data);
			}
		}

		# Edit User Info Function
		public function edit($userID){
			$getSQL = "SELECT * FROM users WHERE userID = '{$userID}'";
			$queryDB = $this->db->query($getSQL);
			$userCheck = $queryDB->result();

			if (empty($userCheck)) {
				$this->session->set_flashdata('danger', 'The user you attempted to edit does not exist.');
				redirect('admin');
			}

			$data['userData'] = $this->session->userdata();
			$data['userEditData'] = (array) $userCheck[0];
			$data['title']    = "Admin | Edit User: #{$userID}";
			$data['userList'] = $this->admin_model->getUsers($userID);

			# Default Edit View
			if (empty($_POST)){
				$this->load->template('admin/edit', $data);
			}
			# Delete User Form Submitted
			elseif ($_POST['delete'] == 'Y'){
				$deletedUserID = $data['userEditData']['userID'];
				$deleteCheck = $this->admin_model->deleteUser($deletedUserID);
				if ($deleteCheck){
					$logInfo = array(
						'userID' => $data['userData']['userID'],
						'logInfo' => 'User deleted User: #'.$deletedUserID,
					);
					$this->log_model->userCreate($logInfo);

					$this->session->set_flashdata('success', 'You have successfully delete the user: #'.$deletedUserID.'.');
					redirect('admin');
				}
				else {
					$this->session->set_flashdata('danger', 'Internal error. Please try again.');
					$this->load->template('admin/edit', $data);
				}
			}
			# Edit User Form Submitted
			else {
				$_POST['userID'] = $userID;

				if ($_POST['userPassword'] == '' || !array_key_exists('userPassword', $_POST)){
					unset($_POST['userPassword']);
					unset($_POST['userPasswordConfirm']);
				}
				else {
					$_POST['userPassword']        = md5($_POST['userPassword']);
					$_POST['userPasswordConfirm'] = md5($_POST['userPasswordConfirm']);
				}

				# Form Validation For Editing User Information from Admin Panel (WIP)
				#$updateValidation = $this->form_validation->run('update');
				#if ($updateValidation){
				#	$userChange = $this->admin_model->changeUserInfo($_POST);
#
				#	if (!$userChange){
				#		$this->session->set_flashdata('danger', 'Something strange happened. Please try again.');
				#		redirect('admin');
				#	}
				#	else {
				#		$this->session->set_flashdata('success', 'You have successfully updated User: #'.$userID);
				#		redirect('admin');
				#	}
				#}
				#else {
				#	$this->load->template('admin/edit', $data);
				#}

				$userChange = $this->admin_model->changeUserInfo($_POST);

				if (!$userChange){
					$this->session->set_flashdata('danger', 'Something strange happened. Please try again.');
					redirect('admin');
				}
				else {
					$logInfo = array(
						'userID' => $data['userData']['userID'],
						'logInfo' => 'User edited User: #'.$data['userEditData']['userID'].' details; Previous Details: '.json_encode($data['userEditData']).', Updated Details: '.json_encode($_POST),
					);
					$this->log_model->userCreate($logInfo);
					$this->session->set_flashdata('success', 'You have successfully updated User: #'.$userID);
					redirect('admin');
				}
			}
		}


		# Password Requirement Checker Function
		public function password_check($password){
			if (preg_match('~[0-9]~', $password)){
				if (preg_match('~[.!@#$?]~', $password)){
					if (ctype_alpha($password[0])){
						return true;
					}
					else {
						return false;
					}
				}
				else {
					return false;
				}
			}
			else {
				return false;
			}
		}


	}
