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

			$userRole = $this->session->userdata('userRole');
			if ($userRole == 20){
				$this->session->set_flashdata('danger', 'You do not have permission to view this.');
				redirect('admin');
			}
		}


		# Account Index Function
		public function index(){
			$data['userData']  = $this->session->userdata();
			$data['title']     = 'Entries | List of Entries';
			$data['entryList'] = $this->entry_model->getEntries();
			$this->load->template('entries/home', $data);
		}


		# Entry Approve Function
		public function approve($entryID){
			$data['userData'] = $this->session->userdata();
			$entryInfo        = (array) $this->entry_model->getEntries($entryID)[0];

			if ($data['userData']['userRole'] < 10){
				$this->session->set_flashdata('danger', 'You do not have this permission.');
				redirect('entries');
			}


			if ($entryInfo['entryStatus'] == 0 && $entryInfo['entryStatusComment'] == NULL){
				$entryDebitAccounts = array();
				$entryDebitBalances = 0;

				$entryCreditAccounts = array();
				$entryCreditBalances = 0;

				foreach (json_decode($entryInfo['entryDebitAccount']) as $debitAccount){
					array_push($entryDebitAccounts, array((string) $debitAccount => json_decode($entryInfo['entryDebitBalance'])[$entryDebitBalances]));
					$entryDebitBalances += 1;
				}

				foreach (json_decode($entryInfo['entryCreditAccount']) as $creditAccount){
					array_push($entryCreditAccounts, array((string) $creditAccount => json_decode($entryInfo['entryCreditBalance'])[$entryCreditBalances]));
					$entryCreditBalances += 1;
				}

				$this->entry_model->approveEntry($entryID, $entryDebitAccounts, $entryCreditAccounts);

				$this->session->set_flashdata('success', 'You have successfully approved Entry: #'.$entryID.'.');
				redirect('entries');
			}
			elseif ($entryInfo['entryStatus'] == 0 && $entryInfo['entryStatusComment'] != NULL) {
				$this->session->set_flashdata('danger', 'This account has already been rejected.');
				redirect('entries');
			}
			else {
				$this->session->set_flashdata('danger', 'This account has already been approved.');
				redirect('entries');
			}
		}

		# Entry Reject Function
		public function reject($entryID){
			$data['userData'] = $this->session->userdata();
			$entryInfo = (array) $this->entry_model->getEntries($entryID)[0];

			if ($data['userData']['userRole'] < 10){
				$this->session->set_flashdata('danger', 'You do not have this permission.');
				redirect('entries');
			}


			if ($entryInfo['entryStatus'] == 0 && $entryInfo['entryStatusComment'] == NULL){
				$this->entry_model->rejectEntry($entryID);

				$this->session->set_flashdata('success', 'You have successfully rejected Entry: #'.$entryID.'.');
				redirect('entries');
			}
			elseif ($entryInfo['entryStatus'] == 0 && $entryInfo['entryStatusComment'] != NULL) {
				$this->session->set_flashdata('danger', 'This account has already been rejected.');
				redirect('entries');
			}
			else {
				$this->session->set_flashdata('danger', 'This account has already been approved.');
				redirect('entries');
			}
		}


		# Create Entry Function
		public function create(){
			$data['title']    = "Entries | Create Entry";
			$data['userData'] = $this->session->userdata();
			$data['accountsList'] = $this->entry_model->getAccounts();

			if (!empty($this->input->post())){
				$_POST['userID'] = $data['userData']['userID'];

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
