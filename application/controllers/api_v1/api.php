<?php defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH.'/libraries/REST_Controller.php';


abstract class Api extends REST_Controller
{

    private $token = false;

    private $client_api_key = false;

    private $auth_user_id = false;

    private $is_logged = false;

    private $accepted_languages = array('en-US');

    private $public_api_routes = array("api/v1/auth/signup", "api/v1/auth/login", 'api/v1/auth/reset_password', 'api/v1/auth/save_password', 'api/v1/auth/verify');

    function __construct()
    {
        parent::__construct();

        // Load language
        $lang = "en";
        if (isset($headers['Accept-Language']))
            if (in_array($headers['Accept-Language'], $this->accepted_languages))
                $lang = substr($headers['Accept-Language'], 0, 2);

        // get controller
        $controller = $this->router->class;
        $route = $this->uri->uri_string;

        $headers = $this->input->request_headers();


        //if (isset($headers['Apikey']))
            //$this->client_api_key = $headers['Apikey'];

        // validate token
        $enable_token = TRUE;
        if (!in_array($route, $this->public_api_routes))
        {
            $enable_token = FALSE;

            if(isset($headers['Authtoken']))
            {
                // validate authtoken
                $this->authtoken = $headers['Authtoken'];
                $authtoken = $this->authtoken_m->get($this->authtoken);
                if ($authtoken)
                {
                    $this->is_logged = TRUE;
                    $this->auth_user_id = $authtoken->user_id;
                    $enable_token = TRUE;
                }
                else
                    $this->is_logged = FALSE;
            }
        }

        // if token is not enable, return error message
        if (!$enable_token)
        {
            $this->response(array("error" => "Access denied"), 412);
            exit();
        }
    }


    /**
     * Return the token sent by header (if exists) or false
     * @return string or bool
     */
    public function getToken()
    {
        return $this->token;
    }


    /**
     * Return true if a user is logged-in
     * @return string or bool
     */
    protected function is_logged()
    {
        return $this->is_logged;
    }


    /**
     * Return the user id of logged-in user
     * @return string or bool
     */
    protected function get_auth_user_id()
    {
        return $this->auth_user_id;
    }


    /**
     * Return the client API KEY
     * @return string or bool
     */
    protected function getClientAPIKEY()
    {
        return $this->client_api_key;
    }


    /**
     * Return if $route API is a public API or not
     * @param $route
     * @return string or bool
     */
    protected function isPublicAPI($route)
    {
        $is_public_api = FALSE;
        foreach($this->public_api_routes as $public_api_route)
        {
            if ($public_api_route === "" || strpos($route, $public_api_route) === 0)
                $is_public_api = TRUE;
        }
        return $is_public_api;
    }

    protected function getClientPlatform(){
        $api_key = $this->getClientAPIKEY();
        $platform = explode('_', $api_key);
        return $platform[1];
    }


}