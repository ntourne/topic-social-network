<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {
	
	function __construct()
	{
   		parent::__construct();
 	}

 	function index()
 	{
        if ($_POST)
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

        else
            $this->template->display('login');
 	}


    function check_database($password)
    {
        // Field validation succeeded.  Validate against database
        $username = $this->input->post('username');

        // query the database
        $result = $this->user_m->login($username, $password);

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
