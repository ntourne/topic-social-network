<?php

class Template extends CI_Model {
	
	// create the array to pass data to the views
	var $data = array();
	
	var $base;
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		
		// assets
		$this->data['css_external_files'] = $this->config->item('css_external_files');
		$this->data['css_files'] = $this->config->item('css_files');
		$this->data['js_external_files'] = $this->config->item('js_external_files');
		$this->data['js_files'] = $this->config->item('js_files');
		$this->data['fonts'] = $this->config->item('fonts');
		$this->data['base'] = $this->config->item('base_url');
		
		// sections
		// $this->data['sections'] = $this->config->item('sections');
		
		$this->base = $this->config->item('base_url');
	}
	
	
	function display($page = 'home', $data = null)
	{
		if ($data != null)
			$this->data = array_merge($this->data, $data);
		
		$this->data['title'] = "TopicSocialNetwork";
		$this->data['page'] = (!empty($page)) ? $page : null;
		
 		if ($this->session->userdata('logged_in'))
   		{
     		$session_data = $this->session->userdata('logged_in');
     		$this->data['username'] = $session_data['username'];
     		$this->data['user_id'] = $session_data['user_id'];
     		$this->data['fullname'] = $session_data['fullname'];
     		$this->data['logged_in'] = TRUE;
   		}
   		else
   		{
   			$this->data['username'] = null;
     		$this->data['user_id'] = null;
     		$this->data['fullname'] = null;   			
   			$this->data['logged_in'] = FALSE;
   		}
		
		$this->load->view('template', $this->data);
	}


    function add_data($key, $value)
    {
        $this->data[$key] = $value;
    }


    function comment($comment = NULL)
    {
        $this->load->view('sections/comment.php', array("comment" => $comment));
    }

}
