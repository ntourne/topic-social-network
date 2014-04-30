<?php

class Authtoken_m extends CI_Model {
	
    function insert($user_id, $authtoken, $expiration = 0)
    {
        $data = array(
            'user_id' => $user_id,
            'authtoken' => $authtoken,
            'expiration' => $expiration
        );

        if ($this->db->insert('topic_authtokens', $data))
            return $this->db->insert_id();
        else
            return NULL;
    }


    public function get($authtoken){

        $this->db->select('user_id, authtoken, expiration');
        $this->db->from('topic_authtokens');
        $this->db->where('authtoken', $authtoken);
        $this->db->limit(1);
        $query = $this->db->get();

        if($query->num_rows() == 1)
            return $query->row();
        else
            return NULL;
    }

}

?>
