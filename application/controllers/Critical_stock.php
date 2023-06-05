<?php
defined('BASEPATH')OR exit('No direct script access allowed');
class Critical_stock extends CI_Controller
{
	public function __construct()
		{
				parent::__construct();
				$this->load->model('critical_model');		
		}

	public function index()
	{
		$data['tittle'] = 'Critical stock';

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('critical_stock',$data);
		$this->load->view('templates/footer');
	}

	public function ajax_list()
    {
        $list = $this->critical_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $cts) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $cts->plant;
            $row[] = $cts->nama_area;
            $row[] = $cts->storage_location;
            $row[] = $cts->material_type;
            $row[] = $cts->material_group;
            $row[] = $cts->material_group_desc;
			$row[] = $cts->pack_size_old;
			$row[] = $cts->material;
			$row[] = $cts->material_description;
			$row[] = $cts->batch;
			$row[] = $cts->tanggal_ed;
			$row[] = $cts->valution_tipe;
			$row[] = $cts->gr_date;
			$row[] = $cts->mkt_categori3;
			$row[] = $cts->total_stock_bu;
			$row[] = $cts->schedule_delivery_bu;
			$row[] = $cts->available_stock_bu;
			$row[] = $cts->base_unit;
			$row[] = $cts->total_stock_ou;
			$row[] = $cts->schedule_delivery_ou;
			$row[] = $cts->available_stock_ou;
			$row[] = $cts->order_unit;
			$row[] = $cts->total_stock_su;
			$row[] = $cts->schedule_delivery_su;
			$row[] = $cts->available_su;
			$row[] = $cts->sales_unit;
			$row[] = $cts->shelf_life_product;
			$row[] = $cts->periode_shelf_life;
			$row[] = $cts->cut_off_stock;
			$row[] = $cts->storage_condition;
			$row[] = $cts->total_self_life;
			$row[] = $cts->mkt_category1;
			$row[] = $cts->standard_price;
			$row[] = $cts->total_value;
			$row[] = $cts->time_to_expired;
			$row[] = $cts->shelf_life_present;
			$row[] = $cts->ket_self_life;
			$row[] = $cts->kategori_principal;
			$row[] = $cts->status_inventory;
			$row[] = $cts->sisa_sled;
			$row[] = $cts->ket_mat_group;
			$row[] = $cts->shelf_life_month;
			$row[] = $cts->create_et;
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->critical_model->count_all(),
                        "recordsFiltered" => $this->critical_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
}