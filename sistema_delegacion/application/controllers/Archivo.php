<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Archivo extends CI_Controller 
{
	public function index()
	{
		$this->load->view('admin/haad');
		$this->load->view('admin/navadmin');
		$this->load->view('admin/bannerCrud');
		$this->load->view('admin/seccionMenu');
		$this->load->view('admin/lateralMenu');
		$this->load->view('altaArchivo');
		$this->load->view('admin/footerAdmin');
	}
}	