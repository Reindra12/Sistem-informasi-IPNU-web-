<?php

class Fungsi
{
    protected $ci;
    function __construct()
    {
        $this->ci = &get_instance();
    }
    function user_login()
    {
        $this->ci->load->model('user_m');
        $user_id = $this->ci->session->userdata('userid');
        $userdata = $this->ci->user_m->get($user_id)->row();
        return $userdata;
    }

    public function data_cabang()
    {
        $this->ci->load->model('cabang_m');
        return $this->ci->cabang_m->get()->num_rows();
    }

    public function data_masuk()
    {
        $this->ci->load->model('masuk_m');
        return $this->ci->masuk_m->get()->num_rows();
    }
    public function data_keluar()
    {
        $this->ci->load->model('keluar_m');
        return $this->ci->keluar_m->get()->num_rows();
    }
    public function data_laporan()
    {
        $this->ci->load->model('pelaporan_m');
        return $this->ci->pelaporan_m->get()->num_rows();
    }
}
