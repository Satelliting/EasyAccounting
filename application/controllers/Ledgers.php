<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Ledgers extends CI_Controller{


		# Default Constructor Function
		public function __construct(){
			parent::__construct();
			$this->load->model('ledger_model');

			$userID = $this->session->userdata('userID');
			if (!$userID){
				redirect('users/login');
			}
		}


		# Ledgers Index Function
		public function index(){
			$data['userData']   = $this->session->userdata();
			$data['title']      = 'Ledgers | List of Ledgers';
			$data['ledgerList'] = $this->ledger_model->getLedgers();
			$this->load->template('ledgers/home', $data);
		}

		# Ledgers Index Function
		public function ledger($ledgerID){
			$data['userData']   = $this->session->userdata();
			$data['title']      = 'Ledgers | General Ledger #'.$ledgerID;
			$data['ledgerID']   = $ledgerID;
			$data['ledgerInfo'] = $this->ledger_model->getLedgers($ledgerID);			
			$this->load->template('ledgers/ledger', $data);
		}
	}
