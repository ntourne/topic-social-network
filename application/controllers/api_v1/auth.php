<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Auth
 *
 * This class is used to manage all stuff related with login, logout, signup, reset password, etc
 *
 * @author		Phil Sturgeon
 */

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH.'controllers/api_v1/Api.php';

class Auth extends Api
{


    /**
     * @description Login a user. It returns an authtoken
     * @method      POST
     * @params      username [string], password [string]
     * @route       /auth/login
     * @return      type="json"
     */
    function login_post()
    {
        $_POST['username'] = $this->post('username');
        $_POST['password'] = $this->post('password');

        if ($_POST)
        {
            $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

            if ($this->form_validation->run() === FALSE)
            {
                $this->response(NULL, 400);
            }
            else
            {
                // insert auth token
                $user = $this->user_m->get($this->post('username'));
                $authtoken = generate_token();
                $this->authtoken_m->insert($user->user_id, $authtoken);

                $this->response(array("user" => $user, "authtoken" => $authtoken), 200);
            }
        }

        else
            $this->response(NULL, 404);
    }


    private function check_database($password)
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


    /**
     * @description Create a new account
     * @method      POST
     * @params      ????
     * @route       /auth/signup
     * @return      type="json"
     */
    function signup_post()
    {
        $this->response(array('response' => 'ok'), 200);
    }


    /**
     * @description Logout a user
     * @method      POST
     * @params      authtoken [string]
     * @route       /auth/logout
     * @return      type="json"
     */
    function logout_post()
    {
        $this->response(array('response' => 'ok'), 200);
    }


    /**
     * @description Reset user password
     * @method      POST
     * @params      authtoken [string]
     * @route       /auth/reset_password
     * @return      type="json"
     */
    function reset_password_post()
    {
        $this->response(array('response' => 'ok'), 200);
    }

}
