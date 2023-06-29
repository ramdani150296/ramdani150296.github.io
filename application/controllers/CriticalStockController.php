<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require('./vendor/autoload.php');

use \PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use \PhpOffice\PhpSpreadsheet\Cell\Coordinate;

class CriticalStockController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('CriticalStockModel');
		$this->load->library('session');	
		$this->load->library('parser');

		if(!$this->session->userdata('email')){
			return header('location:'.base_url('/auth'));
	    }
	}

	public function index(){
		if(strtolower($_SERVER['REQUEST_METHOD']) === 'get'){
			$data = [
				'title' => 'Critical Stock',
				'year' => date("Y")
			];

			$this->parser->parse('/templates/html_head', $data); // head 
			$this->parser->parse('/templates/body_start_with_sidebar', $data); //body start tag
			$this->parser->parse('CriticalStockPage', $data); // main content
			$this->parser->parse('/templates/body_end_with_sidebar', $data); //footer and body end tag
		}
	}

    private function givingComma($iterator, $totalLengthValue, $startIterator){
        return ($iterator >= $startIterator && $iterator < $totalLengthValue) ? (($totalLengthValue === $startIterator) ? null : ", ") : null;
    }

    public function doInsertData(){
        $response = "";
        $status = "Error";

        if(!isset($_FILES['fileExcel']['tmp_name']) || $_FILES['fileExcel']['tmp_name'] == ""){
            $response = "Data File XLSX belum dimasukan";
        }else{
            
            $temporaryFile = $_FILES["fileExcel"]["tmp_name"];
            $readerExcelFile = new Xlsx();
            $readerExcelFile->setReadDataOnly(true);

            if(!$readerExcelFile->canRead($temporaryFile)){
                $response = 'Hanya Dapat Menerima File XLSX';
            }else{
            	$maxUploadedRow = 50000;  //changefor increase or decrease rows size what you want
                $loadActiveSheet = $readerExcelFile->load($temporaryFile)->getActiveSheet();
                $totalRows =  $loadActiveSheet->getHighestRow();
                $endOfColumnSheet = $loadActiveSheet->getHighestColumn();
                $totalColumns = Coordinate::columnIndexFromString($endOfColumnSheet);
                $timeCreated = date('Y-m-d H:i:s');
                $columnsName = "(";
                $columnsValues = ""; 

                if($totalRows > $maxUploadedRow){
                    $response = 'Untuk Saat Proses hanya dapat di lakukan '.
                                'dengan data mecapai '.$maxUploadedRow.' baris, '.
                                'silahkan split file per '.$maxUploadedRow;
                }else{

                    for($i = 1; $i <= $totalColumns; $i++){
                        $comma = $this->givingComma($i, $totalColumns, 1);
                        $scope = ($i == $totalColumns) ? ")" : null;
                        $headerValue = $loadActiveSheet->getCellByColumnAndRow($i, 1)->getValue();
                        $columnsName .=  $headerValue.$comma.$scope;
                    }

                    for($j = 2; $j <= $totalRows;  $j++){
                        $comma2 = $this->givingComma($j, $totalRows, 1);
                        $parentheses = "(";

                        for($k= 1; $k <= $totalColumns; $k++){
                            $comma3 = $this->givingComma($k, $totalColumns, 1);
                            $columnValue = $loadActiveSheet->getCellByColumnAndRow($k, $j)->getValue();
                            $parentheses .= ($k === $totalColumns)? "'".$timeCreated."'" : "'".htmlspecialchars($columnValue, ENT_QUOTES)."'".$comma3;
                        }

                        $columnsValues .= $parentheses.")".$comma2."\r\n";
                    }

                    if(isset($_POST['first_upload']) && $_POST['first_upload'] === 'true'){
                        $executeQueryClear = $this->db->query("truncate tbl_critical_stock;");
                        if(!$executeQueryClear){
                        $response .= $this->db->intl_get_error_message();
                        }
                    }

                    $query = "INSERT INTO tbl_critical_stock ".$columnsName." VALUES ".$columnsValues.";";
                    $executeQuery = $this->db->query($query);
                    if(!$executeQuery){
                        $response .= $this->db->intl_get_error_message();
                    }
                }
            }
        }

        header('Content-Type: application/json');
        if(mb_strlen($response) <= 0){
            $status = 'Success';
            $response = 'Upload Data Berhasil';
        }

        $jsonParse = (string) json_encode(['status' => $status,  'messages' => $response]);
        return print($jsonParse);
    }

    public function getAllData(){

        $list = $this->CriticalStockModel->getAllData();
        $no = ($_POST['start']+1);
        $data = [];

        foreach ($list as $cts) {
            $shelfLife = (round($cts->shelf_life_present)*100)."%";
            $data[] = [
                $no++,
                $cts->plant,
                $cts->nama_area,
                $cts->storage_location,
                $cts->material_type,
                $cts->material_group,
                $cts->material_group_desc,
                $cts->pack_size_old,
                $cts->material,
                $cts->material_description,
                $cts->batch,
                $cts->tanggal_ed,
                $cts->valution_tipe,
                $cts->gr_date,
                $cts->mkt_categori3,
                $cts->total_stock_bu,
                $cts->schedule_delivery_bu,
                $cts->available_stock_bu,
                $cts->base_unit,
                $cts->total_stock_ou,
                $cts->schedule_delivery_ou,
                $cts->available_stock_ou,
                $cts->order_unit,
                $cts->total_stock_su,
                $cts->schedule_delivery_su,
                $cts->available_su,
                $cts->sales_unit,
                $cts->shelf_life_product,
                $cts->periode_shelf_life,
                $cts->cut_off_stock,
                $cts->storage_condition,
                $cts->total_self_life,
                $cts->mkt_category1,
                $cts->standard_price,
                $cts->total_value,
                $cts->time_to_expired,
                $shelfLife,
                $cts->ket_self_life,
                $cts->kategori_principal,
                $cts->status_inventory,
                $cts->sisa_sled,
                $cts->ket_mat_group,
                $cts->shelf_life_month,
                $cts->create_et
            ];
        }

 
        $output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->CriticalStockModel->countAllData(),
			"recordsFiltered" => $this->CriticalStockModel->countFilteredData(),
			"data" => $data,
		);

        //output to json format
        echo json_encode($output);
    }

}
?>