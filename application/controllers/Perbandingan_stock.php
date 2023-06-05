<?php
defined('BASEPATH')OR exit('No direct script access allowed');
/**
 * 
 */
class Perbandingan_stock extends CI_Controller
{
	public function __construct()
		{
				parent::__construct();
				$this->load->model('perbandingan_model');		
		}

	public function index()
	{
		$data['tittle'] = 'Perbandingan Stock';
		$data['perbandingan_stock']= $this->perbandingan_model->get_data('tbl_perbandingan')->result();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('perbandingan_stock',$data);
		$this->load->view('templates/footer');
	}
}