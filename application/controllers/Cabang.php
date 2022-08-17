<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cabang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_tidak_login();
        check_admin();
        $this->load->model(['cabang_m', 'kecamatan_m']);
    }
    public function index()
    {
        $data['cabang'] = $this->cabang_m->get();
        $data['kecamatan'] = $this->kecamatan_m->get()->result();
        $this->template->load('template', 'master_cabang/data_cabang/cabang_data', $data);
    }

    public function tambah()
    {
        $data['kecamatan'] = $this->kecamatan_m->get()->result();
        $this->template->load('template', 'master_cabang/data_cabang/tambah', $data);
    }
    public function ubah($id)
    {
        $where = array('cabang_id' => $id);
        $data['cabang'] = $this->cabang_m->edit_data($where, 'data_cabang')->result();
        $data['kecamatan'] = $this->kecamatan_m->get()->result();
        $this->template->load('template', 'master_cabang/data_cabang/ubah', $data);
    }

    public function simpan()
    {

        $config['upload_path']   = './assets/upload/cabang/';
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
            'nama_cabang' => $this->input->post('cabang'),
            'alamat' => $this->input->post('alamat'),
            'kecamatan_id' => $this->input->post('kecamatan'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'level' => $this->input->post('level'),
            'foto_cabang' => $ganti

        );
        $id_cabang = $this->cabang_m->simpandata('data_cabang', $data);
        $data2 = array(
            'nama' => $this->input->post('cabang'),
            'cabang_id' => $id_cabang,
            'alamat' => $this->input->post('alamat'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'level' => $this->input->post('level')
        );

        $query = $this->user_m->simpandata('data_user', $data2);
        if ($query) {
            $this->session->set_flashdata('info', 'Data cabang Berhasil Di Simpan');
            redirect('cabang');
        } else {
            $this->session->set_flashdata('info', 'Data cabang gagal Di Simpan');
            redirect('cabang');
        }
    }

    public function edit()
    {
        $id = $this->input->post('id');

        $config['upload_path']   = './assets/upload/cabang/';
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
                redirect('cabang');
            } else {

                $data = array('photo' => $this->upload->data());
                $nama_file = $data['photo']['file_name'];
                $ganti = str_replace(" ", "_", $nama_file);
            }
        }
        $data = array(
            'nama_cabang' => $this->input->post('cabang'),
            'alamat' => $this->input->post('alamat'),
            'kecamatan_id' => $this->input->post('kecamatan'),
            'foto_cabang' => $ganti

        );
        $query = $this->cabang_m->editdata('data_cabang', 'cabang_id', $id, $data);
        if ($query) {
            $this->session->set_flashdata('info', 'Data cabang Berhasil Di Simpan');
            redirect('cabang');
        } else {
            $this->session->set_flashdata('info', 'Data cabang gagal Di Simpan');
            redirect('cabang');
        }
    }

    public function hapus($id)
    {
        $data = $this->cabang_m->formedit('data_cabang', 'cabang_id', $id);
        $this->cabang_m->hapusdata('data_cabang', $id, 'cabang_id');
        $this->user_m->hapusdata('data_user', $id, 'cabang_id');
        if ($this->db->affected_rows()) {
            unlink("./assets/upload/cabang/" . $data->foto_cabang);
            $this->session->set_flashdata('info', 'data cabang berhasil di hapus');
            redirect('cabang');
        } else {
            $this->session->set_flashdata('info', 'data cabang gagal terhapus');
            redirect('cabang');
        }
    }
}
