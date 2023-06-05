<?php
defined('BASEPATH') OR  exit('No direct script access allowed');
class Critical_model extends CI_Model
{
	var $table = 'tbl_critical_stock';
    var $column_order = array(null, 
	'plant','nama_area','storage_location','material_type','material_group','material_group_desc','pack_size_old','material','material_description','batch','tanggal_ed','valution_tipe','gr_date','mkt_categori3','total_stock_bu','schedule_delivery_bu','available_stock_bu','base_unit','total_stock_ou','schedule_delivery_ou','available_stock_ou','order_unit','total_stock_su','schedule_delivery_su','available_su','sales_unit','shelf_life_product','periode_shelf_life','cut_off_stock','storage_condition','total_self_life','mkt_category1','standard_price','total_value','time_to_expired','shelf_life_present','ket_self_life','kategori_principal','status_inventory','sisa_sled','ket_mat_group','shelf_life_month','create_et'); //set column field database for datatable orderable
    var $column_search = array('Storage_location','batch'); //set column field database for datatable searchable 
    var $order = array('id' => 'asc'); // default order 
    public function get_data($table)
	{
		return $this->db->get($table);
	}
	private function _get_datatables_query()
    {
         
        $this->db->from($this->table);
 
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        // else if(isset($this->order))
        // {
        //     $order = $this->order;
        //     $this->db->order_by(key($order), $order[key($order)]);
        // }
    }
 
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
	function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
}