<?php

class MY_Controller extends CI_Controller {

	
	protected $data;

    protected $logged_user;

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


        if ($this->is_logged_in())
        {
            $this->logged_user = $this->session->userdata('logged_in');
            $this->template->add_data('logged_user', $this->logged_user);
        }
        else
            $this->logged_user = NULL;

    	// initialize
    	$this->data['menu'] = $this->manage->get_menu();
    	
	}

	
	public function is_logged_in() {
    	return ($this->session->userdata('logged_in')) ? TRUE : FALSE;
	}


    public function get_logged_userid()
    {
        return ($this->is_logged_in()) ? $this->logged_user['user_id'] : NULL;
    }

	
	function sessdestroy() {
    	// $this->session->sess_destroy();
	}


    public function add_data($key, $value)
    {
        $this->data[$key] = $value;
    }
	
}