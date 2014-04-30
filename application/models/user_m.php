<?php

class User_m extends CI_Model {

	function get_logged_user_id()
	{
		$session_data = $this->session->userdata('logged_in');
		return $session_data['user_id'];
	}

    function get_all()
    {
        $this->db->select('user_id, username, fullname');
        $this->db->from('topic_users');
        return $this->db->get()->result();
    }


    function get($param)
    {
        $this->db->select('user_id, username, fullname');
        $this->db->from('topic_users');
        if (is_numeric($param))
            $this->db->where('user_id', $param);
        elseif (filter_var($param, FILTER_VALIDATE_EMAIL))
            $this->db->where('email', $param);
        else
            $this->db->where('username', $param);
        $this->db->limit(1);

        $query = $this->db->get();

        if($query->num_rows() == 1)
        {
            return $query->row();
        }
        else
            return NULL;
    }



    function get_user_id($username)
    {
        $this->db->select('user_id');
        $this->db->from('topic_users');
        $this->db->where('username', $username);
        $this->db->limit(1);

        $query = $this->db->get();

        if($query->num_rows() == 1)
        {
            return $query->row()->user_id;
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
