<?php
defined('BASEPATH')OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('JumlahModel');
		$this->load->library('session');	
		$this->load->library('parser');

		if(!$this->session->userdata('email')){
			return header('location:'.base_url('/auth'));
	  }
	}

	public function index(){

		$data = [
			'critical_stock' => $this->JumlahModel->hitungan_critical_stock(),
			'monitoring_stock' => $this->JumlahModel->hitungan_monitoring_stock(),
			'users' => $this->JumlahModel->hitungan_users(),
			'graph' => $this->JumlahModel->graph(),
			'title' => 'Dashboard'
		];

		$this->parser->parse('templates/html_head', $data);
		$this->parser->parse('templates/body_start_with_sidebar', $data);
		$this->parser->parse('Dashboard', $data);
		$this->parser->parse('templates/body_end_with_sidebar', $data);
	}
}