<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
	public function index()
	{
			$this->load->model('Login_model');
			if ($this->Login_model->login($_POST['username'],$_POST['pass_usuario'])) 
			{
				$this->load->view('admin/haad');
				$this->load->view('admin/navadmin');
				$this->load->view('admin/bannerPanel');
				$this->load->view('panel');
				$this->load->view('admin/footerAdmin');
			}else
			{
				$this->load->view('layout/cabezera');
				$this->load->view('layout/nav');
				$this->load->view('index');
				$this->load->view('layout/footer');
			}
		}
	
}