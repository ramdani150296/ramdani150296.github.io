<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UsersModel extends CI_Model
{

    protected $table;
    protected $columnSearch;
    protected $columnOrder;

    public function __construct()
    {
        $this->table = 'users';
        $this->columnSearch = ['fullname', 'email'];
        $this->columnOrder = [
            null,
            'fullname',
            'email',
            'role_id',
            'is_active',
            'date_created'
        ];
    }

    public function insert($data)
    {
        $insert = $this->db->insert_batch($this->table, $data);
        if ($insert) {
            return true;
        }
    }

    public function getData()
    {
        $this->db->select('*');
        return $this->db->get($this->table)->result_array();
    }

    private function getAllDataQuery()
    {
        $this->db->from($this->table);

        $i = 0;

        foreach ($this->columnSearch as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->columnSearch) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->columnOrder[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        // else if(isset($this->order))
        // {
        //     $order = $this->order;
        //     $this->db->order_by(key($order), $order[key($order)]);
        // }
    }

    public function getAllData()
    {
        $this->getAllDataQuery();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function countFilteredData()
    {
        $this->getAllDataQuery();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function countAllData()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function getTable()
    {
        return $this->table;
    }

    public function findUserById($id){
        $this->db->select('id');
        $this->db->from($this->table);
        $this->db->where('id', $id);
        return $this->db->get()->num_rows();
    }

    public function doDeleteUserById($id){
        $this->db->where('id', $id);
        $this->db->delete($this->table);
        return $this->findUserById($id);
    }

    public function doUpdateUserById(array $data){
        return $this->db->update(
            $this->table,
            $data,
            "id=BINARY('".$data['id']."')"
        );
    }
}
