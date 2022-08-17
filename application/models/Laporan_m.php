<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_m extends CI_Model
{

	public function view_by_date($date)
	{
		$this->db->where('DATE(tanggal)', $date);
		$this->db->join('data_nasabah', 'data_nasabah.nasabah_id = data_verifikasi.nasabah_id');
		$this->db->join('data_pengajuan', 'data_pengajuan.pengajuan_id = data_verifikasi.pengajuan_id');
		return $this->db->get('data_verifikasi')->result();
	}

	public function view_by_month($month, $year)
	{
		$this->db->where('MONTH(tanggal)', $month);
		$this->db->where('YEAR(tanggal)', $year);
		$this->db->join('data_nasabah', 'data_nasabah.nasabah_id = data_verifikasi.nasabah_id');
		$this->db->join('data_pengajuan', 'data_pengajuan.pengajuan_id = data_verifikasi.pengajuan_id');
		return $this->db->get('data_verifikasi')->result();
	}

	public function view_by_year($year)
	{
		$this->db->where('YEAR(tanggal)', $year);
		$this->db->join('data_nasabah', 'data_nasabah.nasabah_id = data_verifikasi.nasabah_id');
		$this->db->join('data_pengajuan', 'data_pengajuan.pengajuan_id = data_verifikasi.pengajuan_id');
		return $this->db->get('data_verifikasi')->result();
	}

	public function view_all()
	{
		$this->db->join('data_nasabah', 'data_nasabah.nasabah_id = data_verifikasi.nasabah_id');
		$this->db->join('data_pengajuan', 'data_pengajuan.pengajuan_id = data_verifikasi.pengajuan_id');
		return $this->db->get('data_verifikasi')->result();
	}

	public function option_tahun()
	{
		$this->db->select('YEAR(tanggal) AS tahun');
		$this->db->from('data_verifikasi');
		$this->db->order_by('YEAR(tanggal)');
		$this->db->group_by('YEAR(tanggal)');
		$this->db->join('data_nasabah', 'data_nasabah.nasabah_id = data_verifikasi.nasabah_id');
		return $this->db->get()->result();
	}
}
