<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		check_tidak_login();
		$this->load->model(['perihal_m', 'sifat_m']);
	}

	public function index()
	{
		$this->template->load('template', 'dashboard');
	}
}
