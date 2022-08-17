<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{

    function data()
    {
        $this->db->order_by('user_id', 'DESC');
        return $query = $this->db->get('data_user');
    }
    public function get($id = null)
    {
        $this->db->from('data_user')
            ->order_by('user_id', 'DESC');
        if ($id != null) {
            $this->db->where('user_id', $id);
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
        $query = $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('data_user');
        $this->db->where('username', $post['username']);
        $this->db->where('password', $post['password']);
        $query = $this->db->get();
        return $query;
    }

    function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function buat_kode()
    {
        $this->db->select('RIGHT(data_user.user_id,4) as kode', FALSE);
        $this->db->order_by('user_id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('data_user');      //cek dulu apakah ada sudah ada kode di tabel.
        if ($query->num_rows() <> 0) {
            //jika kode ternyata sudah ada.
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada
            $kode = 1;
        }
        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
        $kodejadi = "USR2506" . $kodemax;    // hasilnya ODJ-0001 dst.
        return $kodejadi;
    }

    public function update_data($data)
    {
        $username = $data['username'];
        $password = $data['password'];
        $alamat = $data['alamat'];
        $id = $data['cabang_id'];
        $sql = "UPDATE data_user SET cabang_id = '$id', username = '$username', password = '$password', alamat = '$alamat'  WHERE cabang_id = '$id'";
        $this->db->query($sql);
    }
}
