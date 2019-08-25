<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delegado extends CI_Controller {
	public function index()
		{	
			$this->load->model('Delegado_model');
			$data['resultado'] = $this->Delegado_model->combopuesto();
			$this->load->view('admin/haad');
			$this->load->view('admin/navadmin');
			$this->load->view('admin/bannerCrud');
			$this->load->view('admin/seccionMenu');
			$this->load->view('admin/lateralMenu');
			$this->load->view('altaDelegado',$data);
			$this->load->view('admin/footerAdmin');
		}
	public function vistaDelegado()
		{
			$this->load->view('admin/haad');
			$this->load->view('admin/navadmin');
			$this->load->view('admin/bannerCrud');
			$this->load->view('admin/seccionMenu');
			$this->load->view('admin/lateral_menuModifica');
			$this->load->view('editaDelegado');
			$this->load->view('admin/footerAdmin');
		}
	public function registrodelegado()
	{
		$nd = $this->input->post('nombre_delegado');
		$snd = $this->input->post('segundonombre_delegado');
		$apd = $this->input->post('apellidopat_delegado');
		$amd = $this->input->post('apellidomat_delegado');
		$ip = $this->input->post('idpuesto'); 
		

		$this->form_validation->set_rules('nombre_delegado','Nombre delegado','required');
		$this->form_validation->set_rules('apellidopat_delegado','Apellido paterno','required');
		$this->form_validation->set_rules('idpuesto','Puesto','required');

		
		if ($this->form_validation->run()==FALSE) {

			$this->load->model('Delegado_model');
			$data['resultado'] = $this->Delegado->combopuesto();
			$this->load->view('admin/haad');
			$this->load->view('admin/navadmin');
			$this->load->view('admin/bannerCrud');
			$this->load->view('admin/seccionMenu');
			$this->load->view('admin/lateralMenu');
			$this->load->view('altaDelegado',$data);
			$this->load->view('admin/footerAdmin');
			
		}else{
			$this->load->model('Delegado_model');
			$res = $this->Delegado_model->duplicadodelegado($nd,$snd,$apd,$amd);
			if ($res != null) {

				
				$this->load->model('Delegado_model');
				$data['resultado'] = $this->Delegado_model->combopuesto();
				print '<script language="JavaScript">';
                print 'alert("Registro duplicado");';
                print '</script>';
				$this->load->view('admin/haad');
				$this->load->view('admin/navadmin');
				$this->load->view('admin/bannerCrud');
				$this->load->view('admin/seccionMenu');
				$this->load->view('admin/lateralMenu');
				$this->load->view('altaDelegado',$data);
				$this->load->view('admin/footerAdmin');
				
			}else{
				$this->load->model('Delegado_model');
				$datot = $this->Delegado_model->guardardelegado($nd,$snd,$apd,$amd,$ip);
				if ($datot == true) {
						$this->load->model('Delegado_model');
						$data['resultado'] = $this->Delegado_model->combopuesto();
						print '<script language="JavaScript">';
                		print 'alert("Registro guardado");';
                		print '</script>';
						$this->load->view('admin/haad');
						$this->load->view('admin/navadmin');
						$this->load->view('admin/bannerCrud');
						$this->load->view('admin/seccionMenu');
						$this->load->view('admin/lateralMenu');
						$this->load->view('altaDelegado',$data);
						$this->load->view('admin/footerAdmin');
					
				}//fin del true condicional

			}//Segundoelse

		}//else principal



	}

}