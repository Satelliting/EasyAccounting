<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Account_model extends CI_model{
    public function accountCreate($logInfo)
    {
      if($this->db->insert('logs_accounts',$loginfo))
      {
        return true;
      }
      else
      {
        return false;
      }
    }
    public function getAccounts()
    {
      $accountList = array();

      $getSQL = "SELECT * FROM accounts";
      $queryDB = $this->db->query($getSQL);
      $accountList = $queryDB->result();
    }

  }
