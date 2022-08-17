<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cabang_m extends CI_Model
{

    function data()
    {
        $this->db->order_by('cabang_id', 'DESC');
        return $query = $this->db->get('data_cabang');
    }
    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('data_cabang as c');
        $this->db->join('data_kecamatan as k', 'k.kecamatan_id = c.kecamatan_id');

        $this->db->order_by('c.cabang_id', 'DESC');
        return $query = $this->db->get();
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
        $query = $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
    public function formedit($table, $primary, $id)
    {
        return $this->db->get_where($table, array($primary => $id))->row();
    }
    function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
}
