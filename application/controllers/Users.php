<?php
defined('BASEPATH')OR exit('No direct script access allowed');
/**
 * 
 */
class Users extends CI_Controller
{
	public function __construct()
		{
				parent::__construct();
				$this->load->model('users_model');		
		}

        public function index()
        {
            $data['tittle'] = 'User';
            $data['users']= $this->users_model->get_data('users')->result();
    
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('users',$data);
            $this->load->view('templates/footer');
    
        }
}