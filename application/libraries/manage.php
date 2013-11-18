<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Manage {

	private $CI;
	private $modules;
	private $menues;
	
	
	function __construct() {
		$this->CI =& get_instance();
	}
	
	
	function get_modules()
	{
		return $this->CI->config->item('modules');
	}
	
	function get_menu()
	{
		return $this->CI->config->item('menu');
	}
	
	
}