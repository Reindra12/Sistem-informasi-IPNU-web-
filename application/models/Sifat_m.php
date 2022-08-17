<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sifat_m extends CI_Model
{

    function data()
    {
        $this->db->order_by('sifat_id', 'DESC');
        return $query = $this->db->get('data_sifat');
    }
    public function get($id = null)
    {
        $this->db->from('data_sifat')
            ->order_by('sifat_id', 'DESC');
        if ($id != null) {
            $this->db->where('sifat_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function editdata($table, $primary, $id, $data)
    {
        return $this->db->where($primary, $id)
            ->update($table, $data);
    }

    public function hapusdata($table, $id, $primary)
    {
        return $this->db->delete($table, array($primary => $id));
    }
    public function simpandata($table, $data)
    {
        return $this->db->insert($table, $data);
    }
}
