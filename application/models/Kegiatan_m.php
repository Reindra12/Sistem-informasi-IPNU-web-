<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan_m extends CI_Model
{

    function data()
    {
        $this->db->order_by('kegiatan_id', 'DESC');
        return $query = $this->db->get('data_kegiatan');
    }
    public function get()
    {
        $id = $this->fungsi->user_login()->cabang_id;
        $this->db->from('data_kegiatan');
        $this->db->join('data_cabang' , 'data_kegiatan.cabang_id = data_cabang.cabang_id');
        $this->db->order_by('kegiatan_id', 'DESC');
        $this->db->where('data_kegiatan.cabang_id', $id);
        
        
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
