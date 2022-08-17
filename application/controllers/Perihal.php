<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perihal extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_tidak_login();
        check_admin();
        $this->load->model('perihal_m');
    }
    public function index()
    {
        $data['perihal'] = $this->perihal_m->get();
        $this->template->load('template', 'master_surat/data_perihal/perihal_data', $data);
    }

    public function simpan()
    {
        $data = array(
            'nama_perihal' => $this->input->post('perihal'),
            'keterangan' => $this->input->post('ket')

        );
        $query = $this->perihal_m->simpandata('data_perihal', $data);
        if ($query) {
            $this->session->set_flashdata('info', 'Data perihal Berhasil Di Simpan');
            redirect('perihal');
        } else {
            $this->session->set_flashdata('info', 'Data perihal gagal Di Simpan');
            redirect('perihal');
        }
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $data = array(
            'nama_perihal' => $this->input->post('perihal'),
            'keterangan' => $this->input->post('ket')
        );
        $query = $this->perihal_m->editdata('data_perihal', 'perihal_id', $id, $data);
        if ($query) {
            $this->session->set_flashdata('info', 'Data perihal Berhasil Di Simpan');
            redirect('perihal');
        } else {
            $this->session->set_flashdata('info', 'Data perihal gagal Di Simpan');
            redirect('perihal');
        }
    }

    public function hapus($id)
    {
        $this->perihal_m->hapusdata('data_perihal', $id, 'perihal_id');
        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('info', 'data perihal berhasil di hapus');
            redirect('perihal');
        } else {
            $this->session->set_flashdata('info', 'data perihal gagal terhapus');
            redirect('perihal');
        }
    }
}
