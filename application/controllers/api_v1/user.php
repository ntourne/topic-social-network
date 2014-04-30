<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Auth
 *
 * This class is used to manage all methods related with User
 *
 * @author		Nicolas Tourne
 */

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH.'controllers/api_v1/Api.php';

class User extends Api
{

    /**
     * Return a list of users
     */
    function list_get()
    {
        $this->response($this->user_m->get_all(), 200);
    }


    /**
     * Return a user
     * @param $user_id
     */
    function get_get($user_id)
    {
        $user =  $this->user_m->get($user_id);
        if ($user)
            $this->response($user, 200);
        else
            $this->response($user, 404);
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


    function test_get()
    {
        $user_id = $this->user_m->get_user_id("nico");
        $this->response($user_id, 200);
    }

}
