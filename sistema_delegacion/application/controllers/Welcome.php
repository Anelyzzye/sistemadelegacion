<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Description; Página principal de logeo
	 * @return void
	 */
	public function index()
	{
		$this->load->view('layout/cabezera');
		$this->load->view('layout/nav');
		$this->load->view('index');
		$this->load->view('layout/footer');
	}

	/**
	 * Description: Imprime en pantalla la vista
	 * del panel
	 * @return void
 	*/
	public function panel()
	{
		$this->load->view('admin/haad');
		$this->load->view('admin/navadmin');
		$this->load->view('admin/bannerPanel');
		$this->load->view('panel');
		$this->load->view('admin/footerAdmin');
	}


}
