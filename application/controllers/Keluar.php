<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keluar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_tidak_login();
        $this->load->model(['keluar_m', 'user_m', 'perihal_m', 'sifat_m', 'cabang_m']);
    }
    public function index()
    {
        $data['keluar'] = $this->keluar_m->get();
        $this->template->load('template', 'data_surat/surat_keluar/keluar_data', $data);
    }

    public function tambah()
    {
        $data['sifat'] = $this->sifat_m->get()->result();
        $data['perihal'] = $this->perihal_m->get()->result();
        $data['cabang'] = $this->cabang_m->get()->result();
        $this->template->load('template', 'data_surat/surat_keluar/tambah', $data);
    }

    public function ubah($id)
    {
        $where = array('keluar_id' => $id);

        $data['keluar'] = $this->keluar_m->edit_data($where, 'data_keluar')->result();
        $data['sifat'] = $this->sifat_m->get()->result();
        $data['perihal'] = $this->perihal_m->get()->result();
        $data['cabang'] = $this->cabang_m->get()->result();
        $this->template->load('template', 'data_surat/surat_keluar/ubah', $data);
    }

    public function simpan()
    {
        $config['upload_path']   = './assets/upload/surat_keluar/';
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
                redirect('keluar');
            } else {

                $data = array('photo' => $this->upload->data());
                $nama_file = $data['photo']['file_name'];
                $ganti = str_replace(" ", "_", $nama_file);
            }
        }

        $data = array(
            'no_surat' => $this->input->post('no_surat'),
            'tgl_keluar' => $this->input->post('tgl_keluar'),
            'user_id' =>  $this->fungsi->user_login()->user_id,
            'cabang_id' => $this->input->post('cabang'),
            'sifat_id' => $this->input->post('sifat'),
            'perihal_id' => $this->input->post('perihal'),
            'isi' => $this->input->post('isi'),
            'status_keluar' => 1,
            'berkas_keluar' => $ganti

        );
        $query = $this->keluar_m->simpandata('data_keluar', $data);
        if ($query) {
            $this->session->set_flashdata('info', 'Surat Keluar Berhasil Di Kirim');
            redirect('keluar');
        } else {
            $this->session->set_flashdata('info', 'Surat keluar Gagal Di Kirim');
            redirect('keluar');
        }
    }

    public function edit()
    {
        $id = $this->input->post('id');

        $config['upload_path']   = './assets/upload/surat_keluar/';
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
                redirect('keluar');
            } else {

                $data = array('photo' => $this->upload->data());
                $nama_file = $data['photo']['file_name'];
                $ganti = str_replace(" ", "_", $nama_file);
            }
        }
        $data = array(
            'no_surat' => $this->input->post('no_surat'),
            'tgl_keluar' => $this->input->post('tgl_keluar'),
            'user_id' =>  $this->fungsi->user_login()->user_id,
            'cabang_id' => $this->input->post('penerima'),
            'sifat_id' => $this->input->post('sifat'),
            'perihal_id' => $this->input->post('perihal'),
            'isi' => $this->input->post('isi'),
            'status_keluar' => 1,
            'berkas_keluar' => $ganti

        );
        $query = $this->keluar_m->editdata('data_keluar', 'keluar_id', $id, $data);
        if ($query) {
            $this->session->set_flashdata('info', 'Data keluar Berhasil Di Simpan');
            redirect('keluar');
        } else {
            $this->session->set_flashdata('info', 'Data keluar gagal Di Simpan');
            redirect('keluar');
        }
    }

    public function hapus($id)
    {
        $data = $this->cabang_m->formedit('data_keluar', 'keluar_id', $id);
        $this->keluar_m->hapusdata('data_keluar', $id, 'keluar_id');
        if ($this->db->affected_rows()) {
            unlink("./assets/upload/surat_keluar/" . $data->berkas_keluar);
            $this->session->set_flashdata('info', 'data keluar berhasil di hapus');
            redirect('keluar');
        } else {
            $this->session->set_flashdata('info', 'data keluar gagal terhapus');
            redirect('keluar');
        }
    }
}
