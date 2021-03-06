<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Auth
 *
 * This class is used to manage all methods related with Topic
 *
 * @author		Nicolas Tourne
 */

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH.'controllers/api_v1/Api.php';

class Topic extends Api
{

    /**
     * @description Login a user. It returns an authtoken
     * @method      POST
     * @params      username [string], password [string]
     * @route       /auth/login
     * @return      type="json"
     */
    function list_get()
    {
        $this->response($this->topic_m->get_all(), 200);
    }


    /**
     * Return a topic
     * @param $topic_id
     */
    function get_get($topic_id)
    {
        $this->response($this->topic_m->get($topic_id), 200);
    }


    /**
     * Create a new topic
     */
    function new_post()
    {
        $topic_name = $this->post('topic_name');
        $topic_desc = $this->post('topic_desc');
        $cat_slug = $this->post('cat_slug');
        $user_id = $this->get_auth_user_id(); // TODO replace by logged-in user

        $topic_id = $this->topic_m->insert($topic_name, $topic_desc, $cat_slug, $user_id);

        if ($topic_id)
        {
            $topic = $this->topic_m->get($topic_id);
            $this->response($topic, 201);
        }
        else
            $this->response(NULL, 403);
    }


    /**
     * Update a topic
     */
    function update_post()
    {
        $topic_id = $this->post('topic_id');
        $topic_name = $this->post('topic_name');
        $topic_desc = $this->post('topic_desc');
        $cat_slug = $this->post('cat_slug');
        $user_id = $this->get_auth_user_id();

        $this->response(NULL, 200);
    }


    /**
     * Deletes a topic
     */
    function delete_post()
    {
        $topic_id = $this->post('topic_id');

        $this->response(NULL, 200);
    }


    /**
     * Follow topic
     *
     * @param $topic_id
     */
    function follow_post($topic_id)
    {
        // TODO
        $this->response(NULL, 200);
    }


    /**
     * Unfollow topic
     *
     * @param $topic_id
     */
    function unfollow_post($topic_id)
    {
        // TODO
        $this->response(NULL, 200);
    }


    // ************************** comments **************************************************************************


    /**
     * Return a list of comments from a topic
     *
     * @param $topic_id
     */
    function comments($topic_id)
    {
        $comments = $this->comment_m->get_all($topic_id);
        $this->response($comments, 200);
    }


    /**
     * Save a comment in a topic
     *
     * @param $topic_id
     * @param $user_id
     * @param $comment
     */
    function newcomment($topic_id, $user_id, $comment)
    {
        $this->response(NULL, 200);
    }

}
