<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keluar_m extends CI_Model
{

    function data()
    {
        $this->db->order_by('keluar_id', 'DESC');
        return $query = $this->db->get('data_keluar');
    }
    public function get($id = null)
    {
        $id =  $this->fungsi->user_login()->user_id;
        $this->db->select('*, u.cabang_id as idnya_user, c.cabang_id as idnya_cabang');
        $this->db->from('data_keluar as k');
        $this->db->join('data_sifat as s', 'k.sifat_id = s.sifat_id');
        $this->db->join('data_perihal as p', 'k.perihal_id = p.perihal_id');
        $this->db->join('data_cabang as c', 'k.cabang_id = c.cabang_id');
        $this->db->join('data_user as u', 'k.user_id = u.user_id');

        $this->db->order_by('k.keluar_id', 'DESC');

        $this->db->where('k.user_id', $id);

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
        return $this->db->insert($table, $data);
    }
    function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_status($data)
    {
        $total = $data['status'];
        $id = $data['no_surat'];
        $sql = "UPDATE data_keluar SET status_keluar = '$total' WHERE no_surat = '$id'";
        $this->db->query($sql);
    }
}
