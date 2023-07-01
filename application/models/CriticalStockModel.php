<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CriticalStockModel extends CI_Model {

	protected $table;
	protected $columnSearch;
	protected $columnOrder;

	public function __construct(){
		$this->table = 'm_critical_stocks';
		$this->columnSearch = ['Storage_location','batch'];
		$this->columnOrder = [
            null, 
            'plant', 
            'name_1', 
            'storage_location', 
            'material_type', 
            'material_group', 
            'pack_size_old', 
            'material', 
            'material_desc', 
            'batch', 
            'sled_bbd', 
            'valuation_type', 
            'gr_date', 
            'mkt_category_3', 
            'total_stock_bu', 
            'base_unit', 
            'cut_off_stock', 
            'storage_conditions', 
            'total_shelf_life', 
            'standard_price', 
            'total_value', 
            'time_to_expired', 
            'shelf_life', 
            'ket_shelf_life', 
            'principal_non_principal', 
            'status_inventory', 
            'sisa_sled_bbd', 
            'shelf_life_in_month', 
            'qty_sales', 
            'qty_pgi', 
            'qty_nkb', 
            'qty_sto', 
            'qty_disposal', 
            'qty_migo', 
            'remaks_migo', 
            'sales', 
            'pgi', 
            'nkb', 
            'sto', 
            'disposal', 
            'migo', 
            'aall', 
            'value_sales', 
            'value_pgi', 
            'value_nkb', 
            'value_sto', 
            'value_disposal', 
            'value_migo', 
            'progress_value', 
            'value_awal', 
            'kategory_progres',
            'recorded_date'
        ];
	}

	public function insert($data){
		$insert = $this->db->insert_batch($this->table, $data);
		if($insert){
			return true;
		}
	}

	public function getData(){
		$this->db->select('*');
		return $this->db->get($this->table)->result_array();
	}

	private function getAllDataQuery(){
		$this->db->from($this->table);
 
        $i = 0;
     
        foreach ($this->columnSearch as $item) // loop column 
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
 
                if(count($this->columnSearch) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) {
            $this->db->order_by($this->columnOrder[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        // else if(isset($this->order))
        // {
        //     $order = $this->order;
        //     $this->db->order_by(key($order), $order[key($order)]);
        // }
    }

	public function getAllData(){
        $this->getAllDataQuery();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function countFilteredData(){
        $this->getAllDataQuery();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function countAllData(){
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function getTable(){
        return $this->table;
    }
}

?>