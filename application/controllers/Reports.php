<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Reports extends CI_Controller {


		# Default Constructor Function
		public function __construct(){
			parent::__construct();
			$this->load->model('report_model');

			$userID = $this->session->userdata('userID');
			if (!$userID){
				redirect('users/login');
			}
		}


		# Reports Trial Balance Function
		public function trialbalance(){
			$data['userData'] = $this->session->userdata();
			$data['title']    = 'Reports | Trial Balance';
			$data['accountList'] = $this->report_model->getAccounts("trialBalance");
			$this->load->template('reports/trialbalance', $data);
		}


	}
