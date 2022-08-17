<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelaporan_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('data_kegiatan')
            ->order_by('kegiatan_id', 'ASC');
        $this->db->join('data_cabang', 'data_kegiatan.cabang_id = data_cabang.cabang_id');
        if ($id != null) {
            $this->db->where('kegiatan_id', $id);
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
