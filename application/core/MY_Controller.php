<?php

class MY_Controller extends CI_Controller {

	
	protected $data;

	public function  __construct() {
    	
		parent::__construct();
		
		$this->data = array();
		
		// get current page
		$current_page = $this->router->fetch_class();
		
    	// check if current controller doesnt belongs to public page

        if ($this->is_logged_in() && in_array($current_page, $this->config->item('acl_not_authenticated_pages')))
            redirect('home', 'refresh');

        else if (!$this->is_logged_in() && in_array($current_page, $this->config->item('acl_authenticated_pages')))
            redirect('login', 'refresh');

    	// initialize
    	$this->data['menu'] = $this->manage->get_menu();
    	
	}

	
	public function is_logged_in() {
    	return ($this->session->userdata('logged_in')) ? TRUE : FALSE;
	}

	
	function sessdestroy() {
    	// $this->session->sess_destroy();
	}


    public function add_data($key, $value)
    {
        $this->data[$key] = $value;
    }
	
}