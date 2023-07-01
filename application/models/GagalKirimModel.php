<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GagalKirimModel extends CI_Model {

	protected $table;
	protected $columnSearch;
	protected $columnOrder;

	public function __construct(){
		$this->table = 'm_undeliverable_stocks';
		$this->columnSearch = ['periode','plant'];
		$this->columnOrder = [
            null,
            'plant', 
            'plant_desc', 
            'shipment_no', 
            'shipment_date', 
            'delivery_date', 
            'delivery_no', 
            'delivery_type', 
            'delivery_type_desc', 
            'ship_to_party', 
            'ship_to_party_desc', 
            'shipping_point', 
            'sales_group', 
            'material_no', 
            'storage', 
            'line_item', 
            'brand', 
            'material_desc', 
            'uom', 
            'delivery_qty', 
            'value_tax', 
            'total_value_tax', 
            'ext_vehicle_data', 
            'int_vehicle_id', 
            'int_driver_code', 
            'int_driver_name', 
            'int_helper_code_1', 
            'pod_date', 
            'diff_qty', 
            'uom_pod', 
            'pod_reason_code', 
            'pod_reason_desc', 
            'rejection', 
            'condition_group_2', 
            'ket_tambahan', 
            'bulan', 
            'value_gagal', 
            'cek_segment', 
            'ke_cbg_atau_bukan', 
            'mk3_category', 
            'week',
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
         
        if(isset($_POST['order'])) // here order processing
        {
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