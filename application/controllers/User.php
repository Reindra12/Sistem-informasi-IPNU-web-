<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        check_tidak_login();
        check_admin();
        $this->load->model('user_m');
        
    }
	public function index()
	{
        $data['user'] = $this->user_m->get();
        $data['kode'] = $this->user_m->buat_kode();
		$this->template->load('template','data_user/user_data',$data);
    }

    public function simpan()
    {

        $data = array(
            'user_id'  => $this->input->post('kd_user'),
            'username' => $this->input->post('username'),
            'password' =>$this->input->post('password'),
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'level' => $this->input->post('level')
        );
         $query = $this->user_m->simpandata('data_user', $data);
         if ($query) {
            $this->session->set_flashdata('info', 'Data user Berhasil Di Simpan');
            redirect('user');
        } else {
            $this->session->set_flashdata('info', 'Data user gagal Di Simpan');
            redirect('user');
        }
    }

    public function edit(){
        $id = $this->input->post('id');

     
        $data = array(
            'username' => $this->input->post('username'),
            'password' =>$this->input->post('password'),
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'level' => $this->input->post('level')
        );
        $query = $this->user_m->editdata('data_user', 'user_id', $id, $data);
        if ($query) {
            $this->session->set_flashdata('info', 'Data user Berhasil Di Simpan');
            redirect('user');
        } else {
            $this->session->set_flashdata('info', 'Data user gagal Di Simpan');
            redirect('user');
        }
    }

    public function hapus($id)
    {
        $this->user_m->hapusdata('data_user', $id, 'user_id');
        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('info', 'data user berhasil di hapus');
            redirect('user');
        } else {
            $this->session->set_flashdata('info', 'data user gagal terhapus');
            redirect('user');
        }
    }
    
   
   
}
