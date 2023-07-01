<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require('./vendor/autoload.php');

class AkurasiStockController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('AkurasiStockModel');
		$this->load->library('session');	
		$this->load->library('parser');

		if(!$this->session->userdata('email')){
			return header('location:'.base_url('/auth'));
	  }
	}

	public function index(){
		if(strtolower($_SERVER['REQUEST_METHOD']) === 'get'){
			$data = [
				'title' => 'Akurasi Stock',
				'year' => date("Y")
			];

			$this->parser->parse('/templates/html_head', $data); // head 
			$this->parser->parse('/templates/body_start_with_sidebar', $data); //body start tag
			$this->parser->parse('AkurasiStockPage', $data); // main content
			$this->parser->parse('/templates/body_end_with_sidebar', $data); //footer and body end tag
		}
	}

    public function doInsertData(){
        $response = "";
        $status = "Error";
        $response .= doImportExcel($this->AkurasiStockModel, $this->db);

        header('Content-Type: application/json');
        if(mb_strlen($response) <= 0){
            $status = 'Success';
            $response = 'Upload Data Berhasil';
        }

        $jsonParse = (string) json_encode(['status' => $status,  'messages' => $response]);
        return print($jsonParse);
    }

    public function getAllData(){
        return resultsDataToJson($this->AkurasiStockModel);
    }

}
?>