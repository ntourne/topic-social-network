<?php

class User_m extends CI_Model {
	
	
	function get_logged_user_id()
	{
		$session_data = $this->session->userdata('logged_in');
		return $session_data['user_id'];
	}
	
	
	function login($username, $password)
	{
   		$this->db->select('user_id, username, fullname');
   		$this->db->from('topic_users');
   		$this->db->where('username', $username);
   		$this->db->where('password', MD5($password));
   		$this->db->limit(1);

   		$query = $this->db->get();
   		
   		if($query->num_rows() == 1)
     		return $query->result();
   		else
     		return NULL;
	}
	
}
?>
