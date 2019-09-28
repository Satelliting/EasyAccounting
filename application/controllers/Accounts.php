<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  class Accounts extends CI_Controller{
    public function __construct()
    {
      parent::__construct();
      this->load->model();
    }




    # User Index Function
		public function index(){
			$data['accountdata'] = $this->session->accountdata();
			$this->load->template('accounts/home', $data);
		}


  }
