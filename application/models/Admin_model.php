<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin_model extends CI_model{


		# Create User Log Function
		public function getUsers(){
			$userList = array();

			$getSQL = "SELECT * FROM users";
			$queryDB = $this->db->query($getSQL);
			$userList = $queryDB->result();

			return $userList;
		}


	}
