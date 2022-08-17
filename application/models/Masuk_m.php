<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masuk_m extends CI_Model
{

    function data()
    {
        $this->db->order_by('masuk_id', 'DESC');
        return $query = $this->db->get('data_masuk');
    }
    public function get()
    {
        $id =  $this->fungsi->user_login()->cabang_id;
        $this->db->select('*, u.cabang_id as idnya_user, c.cabang_id as idnya_cabang');
        $this->db->from('data_keluar as k');
        $this->db->join('data_sifat as s', 'k.sifat_id = s.sifat_id');
        $this->db->join('data_perihal as p', 'k.perihal_id = p.perihal_id');
        $this->db->join('data_cabang as c', 'k.cabang_id = c.cabang_id');
        $this->db->join('data_user as u', 'k.user_id = u.user_id');

        // $this->db->order_by('k.keluar_id', 'DESC');

        $this->db->where('k.cabang_id', $id);

        return $query = $this->db->get();
    }
    public function get1()
    {
        $id =  $this->fungsi->user_login()->cabang_id;
        $this->db->from('data_masuk')
            ->order_by('masuk_id', 'ASC');

        $this->db->where('masuk_id', $id);

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
