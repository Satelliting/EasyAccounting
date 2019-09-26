<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class User_model extends CI_model{


		# User Login Model
		public function userLogin($email, $password){
			$loginSQL = "SELECT * FROM users WHERE userEmail = ? AND userPassword = ?";
			$queryDB = $this->db->query($loginSQL, array($email, $password));
			$query = $queryDB->result();

			if (!empty($query)){
				return $query;
			}
			else {
				return false;
			}
		}


		# User Register Model
		public function userRegister($userInfo){
			if($this->db->insert('users', $userInfo)){
				return true;
			}
			else {
				return false;
			}
		}


	}
