<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| ACL - Access Control List
|--------------------------------------------------------------------------
|
| To manage all configurations regarding to ACL.
|
*/

$config['acl_not_authenticated_pages'] = array('login');
$config['acl_authenticated_pages'] = array('topic/create', 'profile/me/edit');