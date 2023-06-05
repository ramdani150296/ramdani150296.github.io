<?php
defined('BASEPATH') OR  exit('No direct script access allowed');
class Chart_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function chart_database()
    {
        return $this->db->get('critical_stock')->result();
        
    }

}