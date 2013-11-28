<?php

class Comment_m extends CI_Model {
	
	
	function get($comment_id)
	{
	 	$this->db->select('comment_id, topic_comments.text, topic_comments.topic_id, topic_comments.user_id, topic_users.username, topic_users.email as user_email, topic_users.fullname as user_fullname,
	 						topic_comments.created_on');
   		$this->db->from('topic_comments');
   		$this->db->join('topic_users', 'topic_users.user_id = topic_comments.user_id', 'left');
   		$this->db->where('comment_id', $comment_id);
   		$this->db->limit(1);

   		$query = $this->db->get();

   		if($query->num_rows() == 1)
        {
            return $query->row();
        }
   		else
     		return NULL;
	}

    function get_all($topic_id)
    {
        $this->db->select('comment_id, topic_id, topic_comments.user_id, topic_users.username as user_username, topic_users.fullname as user_fullname, topic_users.email as user_email,
                            text, topic_comments.created_on');
        $this->db->from('topic_comments');
        $this->db->join('topic_users', 'topic_users.user_id = topic_comments.user_id', 'left');
        $this->db->order_by('topic_comments.created_on', 'desc');
        return $this->db->get()->result();
    }


    function insert($topic_id, $text, $user_id)
    {
        $data = array(
            'topic_id' => $topic_id,
            'text' => $text,
            'user_id' => $user_id,
            'created_on' => time()
        );

        if ($this->db->insert('topic_comments', $data))
            return $this->db->insert_id();
        else
            return NULL;
    }


}

?>
