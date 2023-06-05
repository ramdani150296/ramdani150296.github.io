<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require('./vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Uploadstock extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Import_Model2');
	}

	public function index()
	{
		$this->load->model('Import_Model2');
		$data = array(
			'list_data'	=> $this->Import_Model2->getData()
		);
		$this->load->view('import_excel.php',$data);
	}

	public function import_excel(){
		if (isset($_FILES["fileExcel"]["name"])) {
			$path = $_FILES["fileExcel"]["tmp_name"];
			$object = IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();	
                for($row=2;$row<=$highestRow;$row++)
				{
					$periode = $worksheet->getCellByColumnAndRow(2,$row)->getValue();
					$kode_plant = $worksheet->getCellByColumnAndRow(3,$row)->getValue();
                    $nama_plant = $worksheet->getCellByColumnAndRow(4,$row)->getValue();
                    $store_location = $worksheet->getCellByColumnAndRow(5,$row)->getValue();
                    $material_type = $worksheet->getCellByColumnAndRow(6,$row)->getValue();
                    $material_group = $worksheet->getCellByColumnAndRow(7,$row)->getValue();
                    $material_group_description = $worksheet->getCellByColumnAndRow(8,$row)->getValue();
                    $pack_size_old = $worksheet->getCellByColumnAndRow(9,$row)->getValue();
                    $material = $worksheet->getCellByColumnAndRow(10,$row)->getValue();
                    $material_description = $worksheet->getCellByColumnAndRow(11,$row)->getValue();
                    $batch = $worksheet->getCellByColumnAndRow(12,$row)->getValue();
                    $sled_bdd = $worksheet->getCellByColumnAndRow(13,$row)->getValue();
                    $valution_type = $worksheet->getCellByColumnAndRow(14,$row)->getValue();
                    $gr_date = $worksheet->getCellByColumnAndRow(15,$row)->getValue();
                    $mkt_category3 = $worksheet->getCellByColumnAndRow(16,$row)->getValue();
                    $total_stock = $worksheet->getCellByColumnAndRow(17,$row)->getValue();
                    $schedule_delivery = $worksheet->getCellByColumnAndRow(18,$row)->getValue();
                    $available_stock = $worksheet->getCellByColumnAndRow(19,$row)->getValue();
                    $base_unit = $worksheet->getCellByColumnAndRow(20,$row)->getValue();
                    $total_cost = $worksheet->getCellByColumnAndRow(21,$row)->getValue();
                    $total_value = $worksheet->getCellByColumnAndRow(22,$row)->getValue();
                    $keterangan_ed = $worksheet->getCellByColumnAndRow(23,$row)->getValue();
                    $kategori_principal = $worksheet->getCellByColumnAndRow(24,$row)->getValue();
                    $cut_off_stock = $worksheet->getCellByColumnAndRow(25,$row)->getValue();
                    
					$temp_data[] = array( 
						'periode'	=> $periode,
                        'kode_plant'	=> $kode_plant,
                        'nama_plant'	=> $nama_plant,
                        'store_location'	=> $store_location,
                        'material_type'	=> $material_type,
                        'material_group'	=> $material_group,
                        'material_group_description'	=> $material_group_description,
                        'pack_size_old'	=> $pack_size_old,
                        'material'	=> $material,
                        'material_description'	=> $material_description,
                        'batch'	=> $batch,
                        'sled_bdd'	=> $sled_bdd,
                        'valution_type'	=> $valution_type,
                        'gr_date'=> $gr_date,
                        'mkt_category3'	=> $mkt_category3,
                        'total_stock'	=> $total_stock,
                        'schedule_delivery'	=> $schedule_delivery,
                        'available_stock'	=> $available_stock,
                        'base_unit'	=> $base_unit,
                        'total_cost'	=> $total_cost,
                        'total_value'	=> $total_value,
                        'keterangan_ed'	=> $keterangan_ed,
                        'kategori_principal'	=> $kategori_principal,
                        'cut_off_stock'	=> $cut_off_stock,
					); 	
				}
			}
			$this->load->model('Import_Model2');
			$insert = $this->Import_Model2->insert($temp_data);
			if($insert){
				$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-ok"></span> Data Berhasil di Import ke Database');
				redirect($_SERVER['HTTP_REFERER']);
			}else{
				$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-remove"></span> Terjadi Kesalahan');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}else{
			echo "Tidak ada file yang masuk";
		}
	}
}