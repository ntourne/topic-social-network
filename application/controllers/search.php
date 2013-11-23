<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends MY_Controller {

	
	function __construct()
	{
   		parent::__construct();
 	}


 	public function index()
	{
        $cat_slug = $this->input->get('cat');
        $this->template->display('search');
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */