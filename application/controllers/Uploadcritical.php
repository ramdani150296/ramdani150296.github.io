<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require('./vendor/autoload.php');

//start copy for nonreplacing action
use \PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use \PhpOffice\PhpSpreadsheet\Cell\Coordinate;
//end copy for nonreplacing action

class Uploadcritical extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Import_Model');
        // $this->load->helper(['form', 'url']);
	}

	public function index()
	{
		$data = array(
			'list_data'	=> $this->Import_Model->getData()
		);
		$this->load->view('import_excel.php',$data);
	}

    private function givingComma($iterator, $totalLengthValue, $startIterator){
        return ($iterator >= $startIterator && $iterator < $totalLengthValue) ? (($totalLengthValue === $startIterator) ? null : ", ") : null;
    }

    public function import_excel(){
         //start copy for non replacing action
         $response = "";
         $status = "Error";

         //makesure the form data request have field input data files with name fileExcel
        if(!isset($_FILES['fileExcel']['tmp_name']) || $_FILES['fileExcel']['tmp_name'] == ""){
            $response = "Data File Xlsx belum dimasukan";
        }else{
            
            $temporaryFile = $_FILES["fileExcel"]["tmp_name"];
            $readerExcelFile = new Xlsx();
            $readerExcelFile->setReadDataOnly(true);
            $loadActiveSheet = $readerExcelFile->load($temporaryFile)->getActiveSheet();
            $totalRows =  $loadActiveSheet->getHighestRow();
            $endOfColumnSheet = $loadActiveSheet->getHighestColumn();
            $totalColumns = Coordinate::columnIndexFromString($endOfColumnSheet);
            $timeCreated = date('Y-m-d H:i:s');
            $columnsName = "(";
            $columnsValues = ""; 

            if($totalRows > 20000){ //change 20000 for increase or decrease rows size what you want
                $response = 'Untuk Saat Proses hanya dapat di lakukan dengan data mecapai 20.0000 baris, silahkan split file per 20.0000';
            }else{

                //looping for columns header name
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

                //please don,t copy this syntax
                if(isset($_POST['first_upload']) && $_POST['first_upload'] === 'true'){
                    $executeQueryClear = $this->db->query("truncate tbl_critical_stock;");
                    if(!$executeQueryClear){
                    $response .= $this->db->intl_get_error_message();
                    }
                }
                //please don,t copy this syntax

                $query = "INSERT INTO tbl_critical_stock ".$columnsName." VALUES ".$columnsValues.";";
                $executeQuery = $this->db->query($query);
                if(!$executeQuery){
                    $response .= $this->db->intl_get_error_message();
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
        //end copy for nonreplacing action
    }

}

