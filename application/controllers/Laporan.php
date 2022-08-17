<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_tidak_login();
        check_admin();
        $this->load->model('laporan_m');
    }

    public function index()
    {
        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];

                $ket = 'Data Pengajuan Kredit Tanggal ' . date('d-m-y', strtotime($tgl));
                $url_cetak = 'laporan/cetak?filter=1&tanggal=' . $tgl;
                $transaksi = $this->laporan_m->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

                $ket = 'Data Pengajuan Kredit Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                $url_cetak = 'laporan/cetak?filter=2&bulan=' . $bulan . '&tahun=' . $tahun;
                $transaksi = $this->laporan_m->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Pengajuan Kredit Tahun ' . $tahun;
                $url_cetak = 'laporan/cetak?filter=3&tahun=' . $tahun;
                $transaksi = $this->laporan_m->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        } else { // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Pengajuan Kredit';
            $url_cetak = 'laporan/cetak';
            $transaksi = $this->laporan_m->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }

        $data['ket'] = $ket;
        $data['url_cetak'] = base_url('' . $url_cetak);
        $data['transaksi'] = $transaksi;
        $data['option_tahun'] = $this->laporan_m->option_tahun();
        $this->template->load('template', 'laporan/laporan_data', $data);
    }

    public function cetak()
    {
        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];

                $ket = 'Data Pengajuan Kredit Tanggal ' . date('d-m-y', strtotime($tgl));
                $transaksi = $this->laporan_m->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

                $ket = 'Data Pengajuan Kredit Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                $transaksi = $this->laporan_m->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Pengajuan Kredit Tahun ' . $tahun;
                $transaksi = $this->laporan_m->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        } else { // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua  Data Pengajuan Kredit';
            $transaksi = $this->laporan_m->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }

        $data['ket'] = $ket;
        $data['transaksi'] = $transaksi;

        ob_start();
        $this->load->view('laporan/print', $data);
        $html = ob_get_contents();
        ob_end_clean();

        require_once('./assets/laporan/html2pdf/html2pdf.class.php');
        $pdf = new HTML2PDF('P', 'A4', 'en');
        $pdf->WriteHTML($html);
        $pdf->Output($ket . '.pdf', 'D');
    }
}
