<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Import_perbandingan_Model extends CI_Model {

	public function insert($data){
		$insert = $this->db->insert_batch('tbl_perbandingan_stock', $data);
		if($insert){
			return true;
		}
	}
	public function getData(){
		$this->db->select('*');
		return $this->db->get('tbl_perbandingan_stock')->result_array();
	}

}