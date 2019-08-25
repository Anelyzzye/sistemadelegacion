<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sexo extends CI_Controller {
	
	public function index()
	{
		$this->load->view('admin/haad');
		$this->load->view('admin/navadmin');
		$this->load->view('admin/reaperturas/bannerTumbas');
		$this->load->view('admin/reaperturas/seccionSuperior');
		$this->load->view('admin/reaperturas/lateralTumbas');
		$this->load->view('altaSexo');
		$this->load->view('admin/footerAdmin');
	}
}