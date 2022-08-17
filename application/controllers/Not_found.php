<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Not_found extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        check_tidak_login();
        
    }
	public function index()
	{
		$this->template->load('template','error/not_found');
    }

   
}
