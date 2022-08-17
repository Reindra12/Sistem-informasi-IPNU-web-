<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Arsip extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_tidak_login();
        $this->load->model(['arsip_m', 'user_m', 'perihal_m', 'sifat_m', 'cabang_m']);
    }
    public function index()
    {
        $data['arsip'] = $this->arsip_m->get()->result();
        $this->template->load('template', 'data_surat/arsip_surat/arsip_data', $data);
    }

    public function hapus($id)
    {
        $data = $this->cabang_m->formedit('data_arsip', 'arsip_id', $id);
        $this->arsip_m->hapusdata('data_arsip', $id, 'arsip_id');
        if ($this->db->affected_rows()) {
            unlink("./assets/upload/surat_arsip/" . $data->berkas_arsip);
            $this->session->set_flashdata('info', 'data arsip berhasil di hapus');
            redirect('arsip');
        } else {
            $this->session->set_flashdata('info', 'data arsip gagal terhapus');
            redirect('arsip');
        }
    }
}
