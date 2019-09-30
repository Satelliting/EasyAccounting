<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Accounts extends CI_Controller{


		# Default Constructor Function
		public function __construct(){
			parent::__construct();
		}


		# Default Index Function
		public function index(){

			$data['accountData'] = $this->session->userdata('accountInfo');
			$this->load->template('accounts/home', $data);
		}


	}
