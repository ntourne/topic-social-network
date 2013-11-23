<?php

class Category_m extends CI_Model {
	
	
	function get_all()
	{
	   	$this->db->select('cat_slug, cat_name, cat_desc');
   		$this->db->from('topic_categories');
   		$this->db->order_by("cat_name", "asc"); 
   		$query = $this->db->get();
   		return $query->result();
	}
	
}
?>
