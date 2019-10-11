<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Entries extends CI_Controller{


		# Default Constructor Function
		public function __construct(){
			parent::__construct();
			$this->load->model('entry_model');

			$userID = $this->session->userdata('userID');
			if (!$userID){
				redirect('users/login');
			}
		}


		# Account Index Function
		public function index(){
			$data['userData'] = $this->session->userdata();
			$data['title']    = 'Entries | List of Entries';
			$data['entryList'] = $this->entry_model->getEntries();
			$this->load->template('entries/home', $data);
		}


		# Create User Info Function
		public function create(){
			$data['title'] = "Entries | Create Entry";
			$data['userData'] = $this->session->userdata();

			$data['accountsPositiveList'] = $this->entry_model->getAccounts("L");
			$data['accountsNegativeList'] = $this->entry_model->getAccounts("R");

			if (!empty($this->input->post())){
				#Temporary until we insert ledgers
				$_POST['ledgerID'] = 0;
				$_POST['userID']   = $data['userData']['userID'];


				$createCheck = $this->entry_model->createEntry($_POST);
				if ($createCheck){
					$this->session->set_flashdata('success', 'You have successfully created an entry.');
					redirect('entries');
				}
				else {
					$this->session->set_flashdata('danger', 'Something internally happened. Please try again.');
					$this->load->template('entries/create', $data);
				}
			}
			else {
				$this->load->template('entries/create', $data);
			}
		}
	}
