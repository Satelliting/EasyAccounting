<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Log_model extends CI_model{


		# Create User Log Function
		public function userCreate($logInfo){
			if($this->db->insert('logs_users', $logInfo)){
				return true;
			}
			else {
				return false;
			}
		}


		# Create Event Log Function
		public function eventCreate($logInfo){
			if($this->db->insert('logs_events', $logInfo)){
				return true;
			}
			else {
				return false;
			}
		}


	}
