<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct()
	{
   		parent::__construct();
   		$this->load->model('user_model','',TRUE);
 	}

 	function index()
 	{
 		if ($this->session->userdata('logged_in'))
   		{
     		$session_data = $this->session->userdata('logged_in');
     		$data['username'] = $session_data['username'];
     		redirect('home', 'refresh');
   		}
   		$this->template->display('login');
 	}

 	
 	function submit()
 	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

   		if ($this->form_validation->run() == FALSE)
   		{
     		$this->template->display('login');
   		}
   		else
   		{
     		redirect('home', 'refresh');
   		}
	}
	
	
	function check_database($password)
	{
	  	// Field validation succeeded.  Validate against database
   		$username = $this->input->post('username');

	    // query the database
   		$result = $this->user_model->login($username, $password);

   		if($result)
   		{
     		$sess_array = array();
     		foreach($result as $row)
     		{
       			$sess_array = array('user_id' => $row->user_id, 'username' => $row->username, 'fullname' => $row->fullname);
       			$this->session->set_userdata('logged_in', $sess_array);
     		}
     		return TRUE;
   		}
   		else
   		{
     		$this->form_validation->set_message('check_database', 'Invalid username or password');
     		return false;
   		}
 	}	
 	
}

?>
