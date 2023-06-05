<?php
defined('BASEPATH')OR exit('No direct script access allowed');
/**
 * 
 */
class Dashboard extends CI_Controller
{
	public function __construct()
		{
				parent::__construct();
				$this->load->model('jumlah_model');		
		}
	public function index()
	{
			$data['critical_stock']= $this->jumlah_model->hitungan_critical_stock();
			$data['monitoring_stock']= $this->jumlah_model->hitungan_monitoring_stock();
			$data['users']= $this->jumlah_model->hitungan_users();
			
			$data['tittle'] = 'Dashboard';
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('dashboard');
			$this->load->view('templates/footer');

	}
}