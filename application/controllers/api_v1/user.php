<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Auth
 *
 * This class is used to manage all methods related with User
 *
 * @author		Phil Sturgeon
 */

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH.'/libraries/REST_Controller.php';

class User extends REST_Controller
{

    /**
     * Return a list of users
     */
    function list_get()
    {
        $this->response($this->user_m->users(), 200);
    }


    /**
     * Return a user
     * @param $user_id
     */
    function get_get($user_id)
    {
        $this->response($this->user_m->user($user_id), 200);
    }


    /**
     * Follow user
     *
     * @param $user_id
     */
    function follow_post($user_id)
    {
        // TODO
        $this->response(NULL, 200);
    }


    /**
     * Unfollow user
     *
     * @param $user_id
     */
    function unfollow_post($user_id)
    {
        // TODO
        $this->response(NULL, 200);
    }

}
