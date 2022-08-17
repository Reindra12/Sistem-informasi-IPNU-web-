<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Arsip_m extends CI_Model
{

    public function get($id = null)
    {

        $this->db->select('*,');
        $this->db->from('data_masuk as k');
        $this->db->join('data_sifat as s', 'k.sifat_id = s.sifat_id');
        $this->db->join('data_perihal as p', 'k.perihal_id = p.perihal_id');

        $this->db->order_by('k.masuk_id', 'DESC');

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
        $sql = "UPDATE data_masuk SET status_masuk = '$total' WHERE no_surat = '$id'";
        $this->db->query($sql);
    }
}
