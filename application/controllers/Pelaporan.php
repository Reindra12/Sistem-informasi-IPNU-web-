<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelaporan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_tidak_login();
        check_admin();
        $this->load->model('pelaporan_m');
    }
    public function index()
    {
        $data['pelaporan'] = $this->pelaporan_m->get();
        $this->template->load('template', 'data_laporan/laporan_data', $data);
    }


    public function hapus($id)
    {
        $this->pelaporan_m->hapusdata('data_kegiatan', $id, 'kegiatan_id');
        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('info', 'data pelaporan berhasil di hapus');
            redirect('pelaporan');
        } else {
            $this->session->set_flashdata('info', 'data pelaporan gagal terhapus');
            redirect('pelaporan');
        }
    }
}
