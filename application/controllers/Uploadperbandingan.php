<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require('./vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Uploadperbandingan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Import_perbandingan_Model');
	}

	public function index()
	{
		$this->load->model('Import_perbandingan_Model');
		$data = array(
			'list_data'	=> $this->Import_perbandingan_Model->getData()
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
					$bulan = $worksheet->getCellByColumnAndRow(2,$row)->getValue();
					$jenis_penyimpanan = $worksheet->getCellByColumnAndRow(3,$row)->getValue();
                    $plant = $worksheet->getCellByColumnAndRow(4,$row)->getValue();
                    $material = $worksheet->getCellByColumnAndRow(5,$row)->getValue();
                    $description = $worksheet->getCellByColumnAndRow(6,$row)->getValue();
                    $pack_size = $worksheet->getCellByColumnAndRow(7,$row)->getValue();
                    $valution_type = $worksheet->getCellByColumnAndRow(8,$row)->getValue();
                    $batch = $worksheet->getCellByColumnAndRow(9,$row)->getValue();
                    $sled_bdd = $worksheet->getCellByColumnAndRow(10,$row)->getValue();
                    $uom = $worksheet->getCellByColumnAndRow(11,$row)->getValue();
                    $system_cycle_count = $worksheet->getCellByColumnAndRow(12,$row)->getValue();
                    $system_stock_taking = $worksheet->getCellByColumnAndRow(13,$row)->getValue();
                    $fisik_cycle_count = $worksheet->getCellByColumnAndRow(14,$row)->getValue();
                    $fisik_stock_taking = $worksheet->getCellByColumnAndRow(15,$row)->getValue();
                    $akurasi_cc = $worksheet->getCellByColumnAndRow(16,$row)->getValue();
                    $akurasi_st = $worksheet->getCellByColumnAndRow(17,$row)->getValue();
                    $keterangan = $worksheet->getCellByColumnAndRow(18,$row)->getValue();
                    $gap_akurat = $worksheet->getCellByColumnAndRow(19,$row)->getValue();
					$temp_data[] = array( 
						'bulan'	=> $bulan,
                        'jenis_penyimpanan'	=> $jenis_penyimpanan,
                        'plant'	=> $plant,
                        'material'	=> $material,
                        'description'	=> $description,
                        'pack_size'	=> $pack_size,
                        'valution_type'	=> $valution_type,
                        'batch'	=> $batch,
                        'sled_bdd'	=> $sled_bdd,
                        'uom'	=> $uom,
                        'system_cycle_count'	=> $system_cycle_count,
                        'system_stock_taking'	=> $system_stock_taking,
                        'fisik_cycle_count'	=> $fisik_cycle_count,
                        'fisik_stock_taking'=> $fisik_stock_taking,
                        'akurasi_cc'	=> $akurasi_cc,
                        'akurasi_st'	=> $akurasi_st,
                        'keterangan'	=> $keterangan,
                        'gap_akurat'	=> $gap_akurat,
					); 	
				}
			}
			$this->load->model('Import_perbandingan_Model');
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