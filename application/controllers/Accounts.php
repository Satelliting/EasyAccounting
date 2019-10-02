<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Accounts extends CI_Controller{


		# Default Constructor Function
		public function __construct(){
			parent::__construct();

			$userID = $this->session->userdata('userID');
			if (!$userID){
				redirect('users/login');
			}
		}


		# Account Index Function
		public function index(){

			$data['userData'] = $this->session->userdata();
			$data['title']    = 'Accounts | List of Accounts';
			$data['accountList'] = $this->account_model->getAccounts();
			$this->load->template('accounts/home', $data);
		}


		# Account Edit Function
		public function edit($accountID){
			$getSQL = "SELECT * FROM accounts WHERE accountID = '{$accountID}'";
			$queryDB = $this->db->query($getSQL);
			$accountCheck = $queryDB->result();

			if (empty($accountCheck)) {
				$this->session->set_flashdata('danger', 'The account you attempted to edit does not exist.');
				redirect('accounts');
			}

			$data['userData'] = $this->session->userdata();
			$data['title']    = 'Accounts | Edit Account';
			$data['accountData'] = (array) $this->account_model->getAccounts($accountID)[0];

			# Default Edit View
			if (empty($_POST)){
				$this->load->template('accounts/edit', $data);
			}
		}


	}
