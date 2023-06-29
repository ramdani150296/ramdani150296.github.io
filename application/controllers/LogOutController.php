<?php

defined('BASEPATH')OR exit('No direct script access allowed');
require('./vendor/autoload.php');

class LogOutController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
	}

	function index(){
		if($this->session->userdata('email')){
			session_destroy();
		}
		return header('location:'.base_url('/auth'));
	}
	
}
?>