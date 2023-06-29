<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require('./vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Uploadakurasi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Import_Model3');
        $this->load->library('session');	
		$this->load->library('parser');

		if(!$this->session->userdata('email')){
			return header('location:'.base_url('/auth'));
	    }
	}

	public function index()
	{
		$this->load->model('Import_Model3');
		$data = array(
			'list_data'	=> $this->Import_Model3->getData()
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
					$cut_off = $worksheet->getCellByColumnAndRow(2,$row)->getValue();
					$plant = $worksheet->getCellByColumnAndRow(3,$row)->getValue();
					$sloc = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $type = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $group = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $pack_size = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                    $material = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                    $description = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                    $uom = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                    $batch = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
                    $sled_bdd = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
                    $Gr_date = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
                    $valution_type = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
                    $storage_type = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
                    $storage_bin = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
                    $total_stock = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
                    $unposted = $worksheet->getCellByColumnAndRow(18, $row)->getValue();
                    $stock_onhand = $worksheet->getCellByColumnAndRow(19, $row)->getValue();
                    $stock_good = $worksheet->getCellByColumnAndRow(20, $row)->getValue();
                    $stock_bad = $worksheet->getCellByColumnAndRow(21, $row)->getValue();
                    $diff_qty= $worksheet->getCellByColumnAndRow(22, $row)->getValue();
                    $bin_accurasi = $worksheet->getCellByColumnAndRow(23, $row)->getValue();
                    $std_price = $worksheet->getCellByColumnAndRow(24, $row)->getValue();
                    $onhand_val = $worksheet->getCellByColumnAndRow(25, $row)->getValue();
                    $physic_val = $worksheet->getCellByColumnAndRow(26, $row)->getValue();
                    $dif_val = $worksheet->getCellByColumnAndRow(27, $row)->getValue();
                    $ed_fisik = $worksheet->getCellByColumnAndRow(28, $row)->getValue();
                    $keterangan = $worksheet->getCellByColumnAndRow(29, $row)->getValue();
                    $val_god = $worksheet->getCellByColumnAndRow(30, $row)->getValue();
                    $val_bad = $worksheet->getCellByColumnAndRow(31, $row)->getValue();
                    $akurasi = $worksheet->getCellByColumnAndRow(32, $row)->getValue();
                    $type_action = $worksheet->getCellByColumnAndRow(33, $row)->getValue();
                    $kode = $worksheet->getCellByColumnAndRow(34, $row)->getValue();
                    $bulan = $worksheet->getCellByColumnAndRow(35, $row)->getValue();
                    $total_fisik = $worksheet->getCellByColumnAndRow(36, $row)->getValue();
                    
					$temp_data[] = array( 
						'cut_off'	=> $cut_off,
                        'plant'	=> $plant,
                        'sloc'	=> $sloc,
                        'type'	=> $type,
                        'group'	=> $group,
                        'pack_size'	=> $pack_size,
                        'material'	=> $material,
                        'description'	=> $description,
                        'uom'	=> $uom,
                        'batch'	=> $batch,
                        'sled_bdd'	=> $sled_bdd,
                        'valution_type'	=> $valution_type,
                        'storage_type'	=> $storage_type,
                        'storage_bin'	=> $storage_bin,
                        'total_stock'	=> $total_stock,
                        'unposted'	=> $unposted,
                        'stock_onhand'	=> $stock_onhand,
                        'stock_good'	=> $stock_good,
                        'stock_bad'	=> $stock_bad,
                        'diff_qty'	=> $diff_qty,
                        'bin_accurasi'	=> $bin_accurasi,
                        'std_price'	=> $std_price,
                        'onhand_val'	=> $onhand_val,
                        'physic_val'	=> $physic_val,
                        'dif_val'=> $dif_val,
                        'ed_fisik'	=> $ed_fisik,
                        'keterangan'	        => $keterangan,
						'val_god'	=> $val_god,
						'val_bad'	=> $val_bad,
                        'akurasi'	=> $akurasi,
                        'type_action'	=> $type_action,
                        'kode'	=> $kode,
                        'bulan'	=> $bulan,
                        'total_fisik'	=> $total_fisik,
					); 	
				}
			}
			$this->load->model('Import_Model3');
			$insert = $this->Import_Model3->insert($temp_data);
			if($insert){
                $this->session->set_flashdata('pesan','
                <div class="alert alert-success" role="alert">Data berhasil di upload</div>');
                redirect('critical_stock');//----- jika berhasil--
            }else{
                $this->session->set_flashdata('pesan','
                <div class="alert alert-danger" role="alert">Data yang di pilih salah</div>');
                redirect('');// ----Jika gagal---
            }
	}
}
}