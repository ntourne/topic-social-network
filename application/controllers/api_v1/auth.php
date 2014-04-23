<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Auth
 *
 * This class is used to manage all stuff related with login, logout, signup, reset password, etc
 *
 * @author		Phil Sturgeon
 */

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH.'/libraries/REST_Controller.php';

class Auth extends REST_Controller
{


    function login_post()
    {
        if ($_POST)
        {
            $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

            if ($this->form_validation->run() === FALSE)
            {
                $this->response(NULL, 200);
            }
            else
            {
                $this->response(NULL, 400);
            }
        }

        else
            $this->response(NULL, 404);
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



    function signup_post()
    {
        $this->response(array('response' => 'ok'), 200);
    }


    function logout_post()
    {
        $this->response(array('response' => 'ok'), 200);
    }


    function reset_password_post()
    {
        $this->response(array('response' => 'ok'), 200);
    }

}
