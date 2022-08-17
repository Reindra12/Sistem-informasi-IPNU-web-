<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kecamatan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_tidak_login();
        check_admin();
        $this->load->model('kecamatan_m');
    }
    public function index()
    {
        $data['kecamatan'] = $this->kecamatan_m->get();
        $this->template->load('template', 'master_cabang/data_kecamatan/kecamatan_data', $data);
    }

    public function simpan()
    {
        $data = array(
            'nama_kecamatan' => $this->input->post('kecamatan'),
            'keterangan' => $this->input->post('ket')

        );
        $query = $this->kecamatan_m->simpandata('data_kecamatan', $data);
        if ($query) {
            $this->session->set_flashdata('info', 'Data kecamatan Berhasil Di Simpan');
            redirect('kecamatan');
        } else {
            $this->session->set_flashdata('info', 'Data kecamatan gagal Di Simpan');
            redirect('kecamatan');
        }
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $data = array(
            'nama_kecamatan' => $this->input->post('kecamatan'),
            'keterangan' => $this->input->post('ket')
        );
        $query = $this->kecamatan_m->editdata('data_kecamatan', 'kecamatan_id', $id, $data);
        if ($query) {
            $this->session->set_flashdata('info', 'Data kecamatan Berhasil Di Simpan');
            redirect('kecamatan');
        } else {
            $this->session->set_flashdata('info', 'Data kecamatan gagal Di Simpan');
            redirect('kecamatan');
        }
    }

    public function hapus($id)
    {
        $this->kecamatan_m->hapusdata('data_kecamatan', $id, 'kecamatan_id');
        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('info', 'data kecamatan berhasil di hapus');
            redirect('kecamatan');
        } else {
            $this->session->set_flashdata('info', 'data kecamatan gagal terhapus');
            redirect('kecamatan');
        }
    }
}
