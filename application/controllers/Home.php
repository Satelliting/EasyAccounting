<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	# Default Constructor Function
	public function __construct(){
		parent::__construct();
	}


	# Home Index Function
	public function index(){
		$data['title'] = 'Easy Accounting | Home';

		$userID = $this->session->userdata('userID');
		if (!$userID){
			redirect('users/login');
		}

		$data['userData'] = $this->session->userdata();
		$data['assetsTotal']      = $this->account_model->getAccountCategoryTotal('Assets');
		$data['liabilitiesTotal'] = $this->account_model->getAccountCategoryTotal('Liabilities');
		$data['entriesTotal']        = $this->account_model->getEntryTotal('all');
		$data['entriesPendingTotal'] = $this->account_model->getEntryTotal('pending');
		$data['quickRatio']   = $this->account_model->getQuickRatio();
		$data['currentRatio'] = $this->account_model->getCurrentRatio();
		$this->load->template('home', $data);
	}


	# Logout Function
	public function logout(){
		$userID = $this->session->userdata('userID');
		if (!$userID){
			redirect('users/login');
		}
		else{
			$this->session->sess_destroy();
			redirect('users/login');
		}
	}


}
