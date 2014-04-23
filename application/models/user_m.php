<?php

class User_m extends CI_Model {

	function get_logged_user_id()
	{
		$session_data = $this->session->userdata('logged_in');
		return $session_data['user_id'];
	}

    function users()
    {
        $this->db->select('user_id, username, fullname');
        $this->db->from('topic_users');
        return $this->db->get()->result();
    }


    function user($user_id)
    {
        $this->db->select('user_id, username, fullname');
        $this->db->from('topic_users');
        $this->db->where('user_id', $user_id);
        $this->db->limit(1);

        $query = $this->db->get();

        if($query->num_rows() == 1)
        {
            return $query->row();
            return $topic;
        }
        else
            return NULL;
    }

	
	function login($username, $password)
	{
   		$this->db->select('user_id, username, fullname');
   		$this->db->from('topic_users');
   		$this->db->where('(username = "' . $username . '" OR email = "' . $username . '")');
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
