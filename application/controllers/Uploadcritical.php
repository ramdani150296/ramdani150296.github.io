<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require('./vendor/autoload.php');
// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\IOFactory;
use \PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use \PhpOffice\PhpSpreadsheet\Cell\Coordinate;
class Uploadcritical extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Import_Model');
        // $this->load->helper(['form', 'url']);
	}

	public function index()
	{
		$this->load->model('Import_Model');
		$data = array(
			'list_data'	=> $this->Import_Model->getData()
		);
		$this->load->view('import_excel.php',$data);
	}

    private function givingComma($iterator, $totalLengthValue, $startIterator){
        return ($iterator >= $startIterator && $iterator < $totalLengthValue) ? ($totalLengthValue === $startIterator) ? null : ", " : null;
    }
    public function import_excel(){
         $response = "";
         $status = "Error";

        if(isset($_FILES['fileExcel']['tmp_name']) && $_FILES['fileExcel']['tmp_name'] !== ""){

            $temporaryFile = $_FILES["fileExcel"]["tmp_name"];
            $readerExcelFile = new Xlsx();
            $readerExcelFile->setReadDataOnly(true);
            $loadActiveSheet = $readerExcelFile->load($temporaryFile)->getActiveSheet();
            $totalRows =  $loadActiveSheet->getHighestRow();
            $endOfColumnSheet = $loadActiveSheet->getHighestColumn();
            $totalColumns = Coordinate::columnIndexFromString($endOfColumnSheet);
            $columnsName = "(";
            $columnsValues = ""; 
           

            //looping for columns header name
            for($i = 1; $i <= $totalColumns; $i++){
                $comma = $this->givingComma($i, $totalColumns, 1);
                $scope = ($i == $totalColumns) ? ")" : null;
                $headerValue = $loadActiveSheet->getCellByColumnAndRow($i, 1)->getValue();
                $columnsName .=  $headerValue.$comma.$scope;
            }

            for($j = 2; $j <= $totalRows;  $j++){
                $comma2 = $this->givingComma($j, $totalRows, 1);
                $testTemp = "(";

                for($k= 1; $k <= $totalColumns; $k++){
                    $comma3 = $this->givingComma($k, $totalColumns, 1);
                    $columnValue = $loadActiveSheet->getCellByColumnAndRow($k, $j)->getValue();
                    $testTemp .= "'".htmlspecialchars($columnValue, ENT_QUOTES)."'".$comma3;
                }

                $columnsValues .= $testTemp.")".$comma2."\r\n";
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

        }else{
            $response = "Data File Xlsx belum dimasukan";
        }

        header('Content-Type: application/json');
        if(mb_strlen($response) <= 0){
            $status = 'Success';
            $response = 'Upload Data Berhasil';
        }

        $jsonParse = (string) json_encode(['status' => $status,  'messages' => $response]);
        return print($jsonParse);
    }

}

