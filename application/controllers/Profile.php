<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {


	# Default Constructor Function
	public function __construct(){
		parent::__construct();

		$userID = $this->session->userdata('userID');
		if (!$userID){
			redirect('users/login');
		}
	}


	# Profile Index Function
	public function index(){
		$data['title'] = 'Profile | Home';

		$data['userData'] = $this->session->userdata();
		$this->load->template('profile/home', $data);
	}


}
