<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require('./vendor/autoload.php');

use \PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use \PhpOffice\PhpSpreadsheet\Cell\Coordinate;

class PerbandinganStockController extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('MonitoringPerbandinganStockModel');
		$this->load->library('parser');
	}

	public function index(){
		if(strtolower($_SERVER['REQUEST_METHOD']) === 'get'){
			$data = [
				'title' => 'Perbandingan Stock',
				'year' => date("Y")
			];

			$this->parser->parse('/templates/html_head', $data); // head 
			$this->parser->parse('/templates/body_start_with_sidebar', $data); //body start tag
			$this->parser->parse('PerbandinganStockPage', $data); // main content
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
            	$maxUploadedRow = 20000;  //change 20000 for increase or decrease rows size what you want
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
                        $finalHeaderValue = ($i === $totalColumns) ? 'create_et' : $headerValue; 
                       	$columnsName .= "`".$finalHeaderValue."`".$comma.$scope;
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

                    $query = "INSERT INTO ".$this->MonitoringPerbandinganStockModel->getTable()."".$columnsName." VALUES ".$columnsValues.";";
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

        $list = $this->MonitoringPerbandinganStockModel->getAllData();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $cts) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $cts->periode;
            $row[] = $cts->jenis_penyimpanan;
            $row[] = $cts->plant;
            $row[] = $cts->group;
            $row[] = $cts->material;
            $row[] = $cts->description;
            $row[] = $cts->pack_size;
            $row[] = $cts->valution_type;
            $row[] = $cts->batch;
			$row[] = $cts->sled_bdd;
			$row[] = $cts->uom;
			$row[] = $cts->system_cycle_count;
			$row[] = $cts->system_stock_taking;
			$row[] = $cts->fisik_cycle_count;
			$row[] = $cts->fisik_stock_taking;
			$row[] = $cts->akurasi_cc;
			$row[] = $cts->akurasi_st;
			$row[] = $cts->keterangan;
			$row[] = $cts->gap_akurat;
			$row[] = $cts->create_et;
			$data[] = $row;
        }

 
        $output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->MonitoringPerbandinganStockModel->countAllData(),
			"recordsFiltered" => $this->MonitoringPerbandinganStockModel->countFilteredData(),
			"data" => $data,
		);
        //output to json format
        echo json_encode($output);
    }

}
?>