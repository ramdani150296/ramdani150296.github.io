<?php
defined('BASEPATH')OR exit('No direct script access allowed');
/**
 * 
 */
class Akurasi_stock extends CI_Controller
{
	public function __construct()
		{
				parent::__construct();
				$this->load->model('akurasi_model');		
		}

	public function index()
	{
		$data['tittle'] = 'Akurasi stock';
		$data['akurasi_stock']= $this->akurasi_model->get_data('tbl_akurasi_stock')->result();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('akurasi_stock',$data);
		$this->load->view('templates/footer');
	}
}