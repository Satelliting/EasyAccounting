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



		# Edit User Info Model
		public function userEdit($userInfo, $admin = false){
			if ($admin == true){
				$this->db->where('userID', $userInfo['userID']);
				$this->db->update('users', $userInfo);

				return true;
			}
			# Need to add form validation
			$this->db->where('userID', $userInfo['userID']);
			var_dump($this->db->update('users', $userInfo));

			return true;
		}



		# Verify User ID Model
		public function userVerifyID($userID){
			$getSQL = "SELECT * FROM users WHERE userid='{$userID}'";
			$queryDB = $this->db->query($getSQL);
			$userInfo = $queryDB->result();

			if (empty($userInfo)){
				return false;
			}

			return true;
		}



		# Verify User Password Model
		public function userVerifyPassword($userPassword){
			$userPassword = md5($userPassword);
			$getSQL = "SELECT * FROM users WHERE userPassword='{$userPassword}'";
			$queryDB = $this->db->query($getSQL);
			$userInfo = $queryDB->result();

			if (empty($userInfo)){
				return false;
			}

			return true;
		}


	}
