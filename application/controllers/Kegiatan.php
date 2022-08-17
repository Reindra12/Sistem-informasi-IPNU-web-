<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_tidak_login();
        $this->load->model('kegiatan_m');
    }
    public function index()
    {
        $data['kegiatan'] = $this->kegiatan_m->get();
        $this->template->load('template', 'data_kegiatan/kegiatan_data', $data);
    }

    public function simpan()
    {

        $config['upload_path']   = './assets/upload/kegiatan/';
        $config['allowed_types'] = 'png|jpg|JPG|jpeg|JPEG|gif|GIF|tif|TIF||tiff|TIFF';
        $config['encrypt_name'] = true;
        $config['max_size']             = 2048; // 1MB

        $namaFile = $_FILES['photo']['name'];
        $error = $_FILES['photo']['error'];

        $this->load->library('upload', $config);
        if ($namaFile == '') {
            $ganti = 'book.png';
        } else {
            if (!$this->upload->do_upload('photo')) {
                $error = $this->upload->display_errors();
                redirect('cabang');
            } else {

                $data = array('photo' => $this->upload->data());
                $nama_file = $data['photo']['file_name'];
                $ganti = str_replace(" ", "_", $nama_file);
            }
        }

        $data = array(
            'nama_kegiatan' => $this->input->post('kegiatan'),
            'tempat' => $this->input->post('tempat'),
            'tgl' => $this->input->post('tgl'),
            'cabang_id' => $this->input->post('pelaksana'),
            'foto_kegiatan' => $ganti

        );
        $query = $this->kegiatan_m->simpandata('data_kegiatan', $data);
        if ($query) {
            $this->session->set_flashdata('info', 'Data cabang Berhasil Di Simpan');
            redirect('kegiatan');
        } else {
            $this->session->set_flashdata('info', 'Data cabang gagal Di Simpan');
            redirect('kegiatan');
        }
    }

    public function edit()
    {
        $id = $this->input->post('id');

        $config['upload_path']   = './assets/upload/kegiatan/';
        $config['allowed_types'] = 'png|jpg|JPG|jpeg|JPEG|gif|GIF|tif|TIF||tiff|TIFF';
        $config['encrypt_name'] = true;
        $config['max_size'] = 2048; // 1MB

        $namaFile = $_FILES['photo']['name'];
        $error = $_FILES['photo']['error'];

        $flama = $this->input->post('fotoLama');
        $this->load->library('upload', $config);
        if ($namaFile == '') {
            $ganti = $flama;
        } else {
            if (!$this->upload->do_upload('photo')) {
                $error = $this->upload->display_errors();
                redirect('kegiatan');
            } else {

                $data = array('photo' => $this->upload->data());
                $nama_file = $data['photo']['file_name'];
                $ganti = str_replace(" ", "_", $nama_file);
            }
        }
        $data = array(
            'nama_kegiatan' => $this->input->post('kegiatan'),
            'tempat' => $this->input->post('tempat'),
            'tgl' => $this->input->post('tgl'),
            'cabang_id' => $this->input->post('pelaksana'),
            'foto_kegiatan' => $ganti

        );
        $query = $this->kegiatan_m->editdata('data_kegiatan', 'kegiatan_id', $id, $data);
        if ($query) {
            $this->session->set_flashdata('info', 'Data Kegiatan Berhasil Di Simpan');
            redirect('kegiatan');
        } else {
            $this->session->set_flashdata('info', 'Data Kegiatan gagal Di Simpan');
            redirect('kegiatan');
        }
    }
}
