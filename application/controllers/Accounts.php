<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Accounts extends CI_Controller{


		# Default Constructor Function
		public function __construct(){
			parent::__construct();
		}


		# Account Index Function
		public function index(){
			$data['userData'] = $this->session->userdata();
			$data['title']    = 'Accounts | List of Accounts';
			$data['userList'] = $this->account_model->getAccounts();
			$this->load->template('accounts/home', $data);
		}


	}
