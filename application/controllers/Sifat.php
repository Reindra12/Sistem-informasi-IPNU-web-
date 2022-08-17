<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sifat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_tidak_login();
        check_admin();
        $this->load->model('sifat_m');
    }
    public function index()
    {
        $data['sifat'] = $this->sifat_m->get();
        $this->template->load('template', 'master_surat/data_sifat/sifat_data', $data);
    }

    public function simpan()
    {
        $data = array(
            'nama_sifat' => $this->input->post('sifat'),
            'keterangan' => $this->input->post('ket')

        );
        $query = $this->sifat_m->simpandata('data_sifat', $data);
        if ($query) {
            $this->session->set_flashdata('info', 'Data sifat Berhasil Di Simpan');
            redirect('sifat');
        } else {
            $this->session->set_flashdata('info', 'Data sifat gagal Di Simpan');
            redirect('sifat');
        }
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $data = array(
            'nama_sifat' => $this->input->post('sifat'),
            'keterangan' => $this->input->post('ket')
        );
        $query = $this->sifat_m->editdata('data_sifat', 'sifat_id', $id, $data);
        if ($query) {
            $this->session->set_flashdata('info', 'Data sifat Berhasil Di Ubah');
            redirect('sifat');
        } else {
            $this->session->set_flashdata('info', 'Data sifat gagal Di Ubah');
            redirect('sifat');
        }
    }

    public function hapus($id)
    {
        $this->sifat_m->hapusdata('data_sifat', $id, 'sifat_id');
        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('info', 'data sifat berhasil di hapus');
            redirect('sifat');
        } else {
            $this->session->set_flashdata('info', 'data sifat gagal terhapus');
            redirect('sifat');
        }
    }
}
