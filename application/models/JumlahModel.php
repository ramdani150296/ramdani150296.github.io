<?php
defined('BASEPATH') or exit('No direct script access allowed');
class JumlahModel extends CI_Model
{

    public function hitungan_critical_stock()
    {
        $this->db->select('*');
        $this->db->from('m_critical_stocks');
        $this->db->where('storage_location', 'TG01');
        return $this->db->get()->num_rows();
    }

    public function hitungan_monitoring_stock()
    {
        $this->db->select('*');
        $this->db->from('m_monitoring_stocks');
        $this->db->where('storage_location', '9999');
        return $this->db->get()->num_rows();
    }
    public function hitungan_users()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('is_active', 1);
        return $this->db->get()->num_rows();
    }

    public function get_data($table)
    {
        return $this->db->get($table);
    }

    public function graph()
    {
        $data = $this->db->query("SELECT * from m_critical_stocks");
        return $data->result_array();
    }
}
