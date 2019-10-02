<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Users extends CI_Controller {


		# Default Constructor Function
		public function __construct(){
			parent::__construct();

			$userID = $this->session->userdata('userID');
			if ($userID){
				redirect('profile');
			}
		}


		# User Index Function
		public function index(){
			$data['userData'] = $this->session->userdata();
			$this->load->template('users/home', $data);
		}


		# Register User Function
		public function register(){
			$data['title'] = "User Registration";

			$registerInfo = array(
				'userFirstName'        => $this->input->post('userFirstName'),
				'userLastName'         => $this->input->post('userLastName'),
				'userEmail'            => $this->input->post('userEmail'),
				'userPassword'         => md5($this->input->post('userPassword')),
			);

			$registerValidation = $this->form_validation->run('registration');

			if ($registerValidation) {
				$userRegistration = $this->user_model->userRegister($registerInfo);
				if ($userRegistration){
					$this->session->set_flashdata('success', 'You have successfully registered. Please wait to be authorized by an Administrator.');
					redirect('users/login');
				}
				else {
					$this->session->set_flashdata('danger', 'Something has happened internally. Please try again.');
					$this->load->template('users/register', $data);
				}
			}
			else {
				$this->load->template('users/register', $data);
			}
		}


		# User Login Function
		public function login(){
			$data['title'] = "User Login";

			$email    = $this->input->post('userEmail');
			$password = md5($this->input->post('userPassword'));

			if (empty($email)){
				$this->load->template('users/login', $data);
			}
			else {
				$loginUser = $this->user_model->userLogin($email, $password);

				if ($loginUser){
					$userInfo = (array) $loginUser[0];

					$username = $userInfo['userFirstName'][0].$userInfo['userLastName'].date('m',strtotime($userInfo['userCreationDate'])).date('y',strtotime($userInfo['userCreationDate']));

					$this->session->set_userdata(array(
						'userID'        => $userInfo['userID'],
						'userName'      => $username,
						'userFirstName' => $userInfo['userFirstName'],
						'userLastName'  => $userInfo['userLastName'],
						'userEmail'     => $userInfo['userEmail'],
						'userRole'      => $userInfo['userRole']
					));


					$logInfo = array(
						'userID' => $userInfo['userID'],
						'logInfo' => 'User logged in.',
					);
					$this->log_model->userCreate($logInfo);

					$this->session->set_flashdata('success', 'You have successfully logged in.');
					redirect();
				}
				else {
					$this->session->set_flashdata('danger', 'Something has happened internally. Please try again.');
					$this->load->template('users/login', $data);
				}
			}
		}


		# User Logout Function
		public function logout(){
			$userID = $this->session->userdata('userID');
			if (!$userID){
				redirect('users/login');
			}
			else{
				$logInfo = array(
					'userID' => $userID,
					'logInfo' => 'User logged out.',
				);
				$this->log_model->userCreate($logInfo);

				$this->session->sess_destroy();
				redirect('users/login');
			}
		}


		# Password Requirement Checker Function
		public function password_check($password){
			if (preg_match('~[0-9]~', $password)){
				if (preg_match('~[.!@#$?]~', $password)){
					if (ctype_alpha($password[0])){
						return true;
					}
					else {
						return false;
					}
				}
				else {
					return false;
				}
			}
			else {
				return false;
			}
		}


	}
