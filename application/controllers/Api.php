<?php
class Api extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->helper('text');
        $this->load->model('m_api');
        $this->load->model('cabang_m');
        $this->load->model('sifat_m');
        $this->load->model('perihal_m');
    }

    //get alldatasantri
    public function anggota()
    {
        {
            // $data['santri'] = $this->db->query("SELECT * FROM tb_santri  
            // INNER JOIN tbl_walisantri  
            // ON tbl_walisantri.santri = tb_santri.id")->result_object(); 

            $data['anggota'] = $this->db->query("SELECT * FROM data_user")->result_object(); 
            
            $data['status'] = true;

            echo json_encode($data);
        }
    }

    public function register(){
        
        $register = [
            'cabang_id' => $this->input->post('cabang_id'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'level' => $this->input->post('level')
           
            // 'pengguna_password' => md5($this->input->post('pengguna_password')),
            // 'pengguna_nohp' => $this->input->post('pengguna_nohp')

        ];

        $register['register'] = $this->m_api->register($register);
        if($register['register'] != null){
            $register['status'] = true;
                    $register['msg'] = "data ditemukan";
            
                } else {
                    $register['status'] = false;
                    $register['msg'] = "data tidak ditemukan";
                }
        
                echo json_encode($register);
        }

        public function login(){
            $username = $this->input->post('username');
            $password =  $this->input->post('password');
            $level = $this->input->post('level');

    
            $data ['data']= $this->db->query("SELECT * FROM data_user WHERE username = '$username' AND password = '$password' AND level = '$level' ")->row_object();
            if ($data['data'] != null) {
                $data['status'] = true;
                $data['msg'] = "data ditemukan";
        
            } else {
                $data['status'] = false;
                $data['msg'] = "data tidak ditemukan";
            }
    
            echo json_encode($data);
        }

        public function spindatasurat(){
            $data['sifat'] = $this->sifat_m->get()->result_object();
            $data['perihal'] = $this->perihal_m->get()->result_object();
            $data['cabang'] = $this->cabang_m->get()->result_object();

            echo json_encode($data);
        }

        public function suratkeluar(){

            $image = base64_decode($this->input->post("berkas_keluar"));
            $config['upload_path']          = 'assets/upload/surat_keluar/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 5024; // 1MB
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;
    
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('berkas_keluar')) {
                $error = array('error' => $this->upload->display_errors());

                echo json_encode($error);
            
            }

            $surat = [

                'no_surat' => $this->input->post('no_surat'),
                'tgl_keluar' =>  $this->input->post('tgl_keluar'),
                'user_id' => $this->input->post('user_id'),
                'cabang_id' => $this->input->post('cabang_id'),
                'sifat_id' => $this->input->post('sifat_id'),
                'perihal_id' => $this->input->post('perihal_id'),
                'isi' =>  $this->input->post('isi'),
                'status_keluar' =>  $this->input->post('status_keluar'),
                'berkas_keluar' =>  $this->upload->data('file_name'),
                

            ];
            $data['surat'] = $this->m_api->surat_keluar($surat);

            $data['data'] = $surat;
            $data['sukses'] = true;
            echo json_encode($data);
            

        }

        public function listkeluar($id){
            // $data['surat_keluar'] = $this->m_api->get_surat_keluar()->result_object();
            $data['surat_keluar'] = $this->m_api->get_surat_keluar($id);

            // $data['perihal'] = $this->perihal_m->get()->result_object();
            // $data['cabang'] = $this->cabang_m->get()->result_object();

            echo json_encode($data);
        }

        public function getallcount($id){

            // query yg dinonaktifkan adalah query untuk menampilkan semua data pada table
            
            // $query = $this->db->query('SELECT * FROM data_keluar');
            // $data['hitungkeluar'] = $query->num_rows();
       
            // $query = $this->db->query('SELECT * FROM data_masuk');
            // $data['hitungmasuk'] = $query->num_rows();

            $data['hitungkeluar'] = $this->m_api->jumlahsuratkeluar($id);
            $data['hitungmasuk'] = $this->m_api->jumlahsuratmasuk($id);

            echo json_encode($data);

        }

        public function listlaporan($id){
            $data['laporan'] = $this->m_api->list_laporan($id);

            echo json_encode($data);
        }

        public function laporan(){

            $image = base64_decode($this->input->post("foto_kegiatan"));
            $config['upload_path']          = 'assets/upload/kegiatan/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 5024; // 1MB
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;
    
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto_kegiatan')) {
                $error = array('error' => $this->upload->display_errors());

                echo json_encode($error);
            
            }

            $kegiatan = [

                'nama_kegiatan' => $this->input->post('nama_kegiatan'),
                'tempat' =>  $this->input->post('tempat'),
                'tgl' => $this->input->post('tgl'),
                'cabang_id' => $this->input->post('cabang_id'),
                'user_id' => $this->input->post('user_id'),
                'keterangan' => $this->input->post('keterangan'),
                'foto_kegiatan' =>  $this->upload->data('file_name')
                

            ];
            $data['laporan'] = $this->m_api->buatlaporan($kegiatan);

            $data['data'] = $kegiatan;
            $data['sukses'] = true;
            echo json_encode($data);
            
        }

        public function jumlahlaporan($id){

            $data['laporankeluar'] = $this->m_api->jumlahlaporankeluar($id);
            echo json_encode($data);

        }
    
}   
