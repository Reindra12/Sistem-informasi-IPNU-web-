<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// <?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_api extends CI_ModeL {
    // private $pesanan ='pesanan';
 

    public function produkByid($id)
    {
        return $this->db->get_where('produk', array('id_produk' => $id))->row();
    }
    
    public function tampilsantribyid($data){
        // return $this->db
        // ->join('tb_santri','tbl_walisantri.santri = tb_santri.id')
        // ->get_where('tbl_walisantri', array('santri'=> $data))->result_object();    
     
        $this->db->select ( '*' ); 
        $this->db->from ( 'tb_santri' );
        $this->db->join ( 'tb_status', 'tb_status.id_santri = tb_santri.id' , 'left' );
        $this->db->join ( 'tbl_walisantri', 'tbl_walisantri.santri = tb_santri.id' , 'left' );
        $this->db->where ( 'tb_santri.id', $data);
        $query = $this->db->get ();
        return $query->result ();

    }

    public function join3table(){
        $this->db->select('*');
        $this->db->from('tb_santri');
        $this->db->join('tbl_walisantri', 'tbl_walisantri.santri=tb_santri.id');
        $this->db->join('tb_status', 'tb_status.id_santri=tb_santri.id');
        $query = $this->db->get();
        return $query->result(); 
        
        echo json_encode($query);
    }

   
    public function santridanpembayaran($data){
        // return $this->db
        // ->join('tb_santri','tbl_walisantri.santri = tb_santri.id')
        // ->get_where('tbl_walisantri', array('santri'=> $data))->result_object();    
     
        $this->db->select ( '*' ); 
        $this->db->from ( 'tb_santri' );
        $this->db->join ( 'tb_status', 'tb_status.id_santri = tb_santri.id' , 'left' );
        $this->db->join ( 'tbl_walisantri', 'tbl_walisantri.santri = tb_santri.id' , 'left' );
        $this->db->join ('tb_pembayaran', 'tb_pembayaran.id_santri = tb_santri.id', 'left');
        $this->db->where ( 'tb_santri.id', $data);
        $query = $this->db->get ();
        return $query->result ();

    }


    public function joinpesanan($table,$primary,$id){
        // $query = $this->db->select('*')
        // ->from('pesanan')
        // ->join('produk', 'pesanan.id_produk=produk.id_produk', 'left')
        // ->order_by('produk.id_produk', 'DESC')
        // ->get();

        // return $query;
        return $this->db
        ->join('produk','pesanan.id_produk = produk.id_produk','left')
        ->get_where($table, array($primary => $id))->result_object();
        
    }
    //   public function trxDetail($table,$primary,$id)
    // {
    //     return $this->db
    //     // ->join('layanan', 'transaksi_detail.id_layanan=layanan.id_layanan')
    //     ->join('transaksi','transaksi.id_transaksi_t = transaksi_detail.id_transaksi')
    //     ->join('layanan','transaksi_detail.id_layanan = layanan.id_layanan')
    //     ->join('santri', 'santri.nim = transaksi.nim')
    //     ->join('penyuci', 'transaksi.id_penyuci = penyuci.id_penyuci')
    //     ->join('status', 'transaksi.id_status = status.id_status')
    //     ->get_where($table, array($primary => $id))->result_object();
    // }

    public function register($data)
    {
        return $this->db->insert('data_user', $data);
    }

    public function surat_keluar($data)
    {
       $this->db->insert('data_keluar', $data);
       $insert_id = $this->db->insert_id();

       return  $insert_id;
    }

    public function daftarwali($data)
    {
        return $this->db->insert('tbl_walisantri', $data);
    }

    public function insertstatus($data)
    {
        return $this->db->insert('tb_status', $data);
    }

    public function simpanpesanan($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function simpanpembayaran($table, $data)
    {
        return $this->db->insert('tb_pembayaran', $data);

        
    }

    // public function simpanpembayaran($table, $data)
    // {
    //     return $this->db->insert('tb_pembayaran', $data);
    // }


    public function hapuspesanan($id_produk)
    {
        $this->db->where('id_produk', $id_produk);
        $this->db->delete($this->pesanan);

    }

    public function insert_img( $data){
        $this->db->insert('tb_pembayaran',$data);
        }


    public function get_surat_keluar($data)
    {
        $this->db->select ( '*' ); 
        $this->db->from('data_keluar')
            ->order_by('tgl_keluar', 'DESC')
            ->where('user_id',$data)
            ->join('data_perihal', 'data_perihal.perihal_id =  data_keluar.perihal_id','left')
            ->join('data_cabang', 'data_cabang.cabang_id =  data_keluar.cabang_id','left')
            ->join('data_sifat', 'data_sifat.sifat_id =  data_keluar.sifat_id','left');

            // ->where('tgl_keluar', date('Y-m-d'));
    
        // $this->db->from ('data_keluar');
        // $this->db->join ('data_perihal', 'data_perihal.perihal_id =  data_keluar.data_perihal','left');
        // if ($id != null) {
        //     $this->db->where('sifat_id', $id);
        // }
        $query = $this->db->get();
        return $query->result();
    }

    public function jumlahsuratkeluar($id){
        $this->db->select ('*');
        $this->db->from('data_keluar')
        ->where('user_id', $id);

        $query = $this->db->count_all_results();
        return $query;
    }

    public function jumlahsuratmasuk($id){
        $this->db->select ('*');
        $this->db->from('data_masuk')
        ->where('user_id', $id);

        $query = $this->db->count_all_results();
        return $query;
    }

    public function list_laporan($id){
        $this->db->select ('*');
        $this->db->from('data_kegiatan')
        ->where('user_id', $id);

        $query = $this->db->get();
        return $query->result();

    }

    public function buatlaporan($data)
    {
       $this->db->insert('data_kegiatan', $data);
       $insert_id = $this->db->insert_id();

       return  $insert_id;
    }

    public function jumlahlaporankeluar($id){
        $this->db->select ('*');
        $this->db->from('data_kegiatan')
        ->where('user_id', $id);

        $query = $this->db->count_all_results();
        return $query;
    }

    
}