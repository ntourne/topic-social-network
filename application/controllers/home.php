<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	
	function __construct()
	{
   		parent::__construct();
 	}


 	public function index()
	{
        $this->add_data('topics', $this->topic_m->get_all());
        $this->add_data('categories', $this->category_m->get_all());
        $this->template->display('home', $this->data);
	}
	
	
 	public function follow()
	{
        $this->add_data('topics', $this->topic_m->get_all());
		$this->template->display('home', $this->data);
	}	
	
	
	public function recent()
	{
        $this->add_data('topics', $this->topic_m->get_all());
		$this->template->display('home', $this->data);
	}	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */