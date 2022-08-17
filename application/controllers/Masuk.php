<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masuk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_tidak_login();
        $this->load->model(['masuk_m', 'keluar_m']);
    }
    public function index()
    {
        $data['masuk'] = $this->masuk_m->get();
        $data['arsip'] = $this->masuk_m->get1();
        $this->template->load('template', 'data_surat/surat_masuk/masuk_data', $data);
    }

    public function simpan()
    {

        $data = array(
            'no_surat' => $this->input->post('no_surat'),
            'tgl_masuk' => $this->input->post('tgl_masuk'),
            'user_id' =>  $this->input->post('pengirim'),
            'cabang_id' => $this->fungsi->user_login()->user_id,
            'sifat_id' => $this->input->post('sifat'),
            'perihal_id' => $this->input->post('perihal'),
            'isi' => $this->input->post('isi'),
            'status' => 2,
            'berkas' => $this->input->post('photo')

        );
        $query = $this->masuk_m->simpandata('data_masuk', $data);
        $this->keluar_m->update_status($data);
        if ($query) {
            $this->session->set_flashdata('info', 'Data Surat masuk Berhasil Di Arsipkan');
            redirect('masuk');
        } else {
            $this->session->set_flashdata('info', 'Data masuk gagal Di Simpan');
            redirect('masuk');
        }
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $data = array(
            'nama_masuk' => $this->input->post('masuk'),
            'keterangan' => $this->input->post('ket')
        );
        $query = $this->masuk_m->editdata('data_masuk', 'masuk_id', $id, $data);
        if ($query) {
            $this->session->set_flashdata('info', 'Data masuk Berhasil Di Simpan');
            redirect('masuk');
        } else {
            $this->session->set_flashdata('info', 'Data masuk gagal Di Simpan');
            redirect('masuk');
        }
    }

    public function hapus($id)
    {
        $this->masuk_m->hapusdata('data_masuk', $id, 'masuk_id');
        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('info', 'data masuk berhasil di hapus');
            redirect('masuk');
        } else {
            $this->session->set_flashdata('info', 'data masuk gagal terhapus');
            redirect('masuk');
        }
    }
}
