<?php
defined('BASEPATH')OR exit('No direct script access allowed');
/**
 * 
 */
class Monitoring_stock extends CI_Controller
{

	public function __construct()
		{
				parent::__construct();
				$this->load->model('monitoring_stock_model');		
		}
	public function index()
	{
		$data['tittle'] = 'Monitoring stock';
		$data['monitoring_stock']= $this-> monitoring_stock_model->get_data('tbl_monitoring_stock')->result();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('monitoring_stock');
		$this->load->view('templates/footer');

	}
}