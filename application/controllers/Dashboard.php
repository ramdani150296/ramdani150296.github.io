<?php
defined('BASEPATH')OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
		{
				parent::__construct();
				$this->load->model('JumlahModel');		
		}
	public function index()
	{
			$data['critical_stock']= $this->JumlahModel->hitungan_critical_stock();
			$data['monitoring_stock']= $this->JumlahModel->hitungan_monitoring_stock();
			$data['users']= $this->JumlahModel->hitungan_users();
			$data['graph'] = $this->JumlahModel->graph();

			$data['tittle'] = 'Dashboard';
			$this->load->view('templates/html_head', $data);
			$this->load->view('templates/body_start_with_sidebar', $data);
			$this->load->view('dashboard');
			$this->load->view('templates/body_end_with_sidebar', $data);
						
	}
}