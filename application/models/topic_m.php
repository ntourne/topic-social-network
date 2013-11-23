<?php

class Topic_m extends CI_Model {
	
	
	function insert($topic_name, $topic_desc, $cat_slug, $user_id)
	{
		$data = array(
			'topic_name' => $topic_name,
			'topic_desc' => $topic_desc,
            'cat_slug' => $cat_slug,
			'user_id' => $user_id,
		    'created_on' => time()
		);
		
		if ($this->db->insert('topic_topics', $data))
			return $this->db->insert_id();
		else
			return NULL;
	}

	
	function get($topic_id)
	{
	 	$this->db->select('topic_id, topic_name, topic_desc, topic_topics.user_id, topic_users.username, topic_users.fullname, 
	 						topic_categories.cat_slug, topic_categories.cat_name as cat_name, topic_topics.comments_count, topic_topics.followers_count, topic_topics.created_on');
   		$this->db->from('topic_topics');
   		$this->db->join('topic_users', 'topic_users.user_id = topic_topics.user_id', 'left');
        $this->db->join('topic_categories', 'topic_categories.cat_slug = topic_topics.cat_slug', 'left');
   		$this->db->where('topic_id', $topic_id);
   		$this->db->limit(1);

   		$query = $this->db->get();
   		
   		if($query->num_rows() == 1)
     		return $query->result();
   		else
     		return NULL;
	}
	
	
	
	function get_all()
	{
	 	$this->db->select('topic_id, topic_name, topic_desc, topic_topics.user_id, topic_users.username as user_username, topic_users.fullname as user_fullname, 
	 						topic_categories.cat_slug, topic_categories.cat_name as cat_name, topic_topics.comments_count, topic_topics.followers_count, topic_topics.created_on');
   		$this->db->from('topic_topics');
   		$this->db->join('topic_users', 'topic_users.user_id = topic_topics.user_id', 'left');
        $this->db->join('topic_categories', 'topic_categories.cat_slug = topic_topics.cat_slug', 'left');
   		$this->db->order_by('topic_topics.created_on', 'desc'); 
   		$query = $this->db->get();
     	return $query->result();
	}
	
}
?>
