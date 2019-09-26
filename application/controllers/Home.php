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
		$this->load->template('home', $data);
	}


}
