<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin extends CI_Controller {


		# Default Constructor Function
		public function __construct(){
			parent::__construct();
			$this->load->model('admin_model');
		}


		# User Index Function
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
	}
