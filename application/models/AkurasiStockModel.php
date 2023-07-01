<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AkurasiStockModel extends CI_Model {

	protected $table;
	protected $columnSearch;
	protected $columnOrder;

	public function __construct(){
		$this->table = 'm_accuracy_stocks';
		$this->columnSearch = ['batch'];
		$this->columnOrder = [
            null,
            'cut_off', 
            'plant', 
            'sloc', 
            'type', 
            'group', 
            'pack_size', 
            'material', 
            'desc', 
            'uom', 
            'batch', 
            'sled_bbd', 
            'val_type', 
            'storage_type', 
            'storage_bin', 
            'total_stock', 
            'unposted', 
            'onhand_rev', 
            'good', 
            'bad', 
            'diff_qty', 
            'bin_accuracy', 
            'std_price', 
            'onhand_val', 
            'physic_val', 
            'diff_val', 
            'ed_pisik', 
            'ket', 
            'val_god', 
            'val_bad', 
            'akurasi', 
            'type_1', 
            'kode', 
            'bulan', 
            'stock_fisik',
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