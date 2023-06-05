<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Jumlah_Model extends CI_Model {
    public function hitungan_critical_stock()
        {
            $this->db->select('*');
            $this->db->from('tbl_critical_stock');
            $this->db->where('Storage_location','TG01');
            return $this->db->get()->num_rows();
        }
        public function hitungan_monitoring_stock()
        {
            $this->db->select('*');
            $this->db->from('tbl_monitoring_stock');
            $this->db->where('store_location','9999');
            return $this->db->get()->num_rows();
        }
        public function hitungan_users()
        {
            $this->db->select('*');
            $this->db->from('users');
            $this->db->where('is_active',1);
            return $this->db->get()->num_rows();
        }
        
        public function get_data($table)
        {
            return $this->db->get($table);
        }
}