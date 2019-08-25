<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendedor extends CI_Controller 
{	
	function __construct()
		{
			parent::__construct();
			$this->load->model('Vendedor_model');


		}
	public function index()
	{
		$this->load->view('admin/haad');
		$this->load->view('admin/navadmin');
		$this->load->view('admin/bannerCrud');
		$this->load->view('admin/seccionMenu');
		$this->load->view('admin/lateralMenu');
		$this->load->view('altaVendedor');
		$this->load->view('admin/footerAdmin');
	}
	public function vistaVendedor()
	{
		$this->load->view('admin/haad');
		$this->load->view('admin/navadmin');
		$this->load->view('admin/bannerCrud');
		$this->load->view('admin/seccionMenu');
		$this->load->view('admin/lateral_menuModifica');
		$this->load->view('editaVendedor');
		$this->load->view('admin/footerAdmin');
	}
	public function registrovendedor()
	{
		$nomv = $this->input->post('nombre_vendedor');
		$segnom = $this->input->post('segundo_nombrevendedor');
		$apellipv = $this->input->post('apellidopat_vendedor');
		$apellimv = $this->input->post('apellidomat_vendedor');
		$callev = $this->input->post('calle_vendedor');
		$numintv = $this->input->post('numint_vendedor');
		$numextv = $this->input->post('numext_vendedor');
		$cpv = $this->input->post('cp_vendedor');
		$coloniav = $this->input->post('colonia_vendedor');

		$this->form_validation->set_rules('nombre_vendedor','Nombre vendedor','required');
		$this->form_validation->set_rules('apellidopat_vendedor','Apellido vendedor','required');
		$this->form_validation->set_rules('calle_vendedor','Calle','required');
		$this->form_validation->set_rules('numint_vendedor','Numero interior','required');
		$this->form_validation->set_rules('numext_vendedor','Numero exterior','required');
		$this->form_validation->set_rules('cp_vendedor','Codigo postal','required');
		$this->form_validation->set_rules('colonia_vendedor','Colonia','required');

		
		if ($this->form_validation->run()==FALSE) {

			$this->load->view('admin/haad');
			$this->load->view('admin/navadmin');
			$this->load->view('admin/bannerCrud');
			$this->load->view('admin/seccionMenu');
			$this->load->view('admin/lateralMenu');
			$this->load->view('altaVendedor');
			$this->load->view('admin/footerAdmin');
			
		}else{
			$this->load->model('Vendedor_model');
			$res = $this->Vendedor_model->duplicadovendedor($nomv,$segnom,$apellipv,$apellimv);
			if ($res != null) {

				print '<script language="JavaScript">';
                print 'alert("Registro duplicado");';
                print '</script>';
				$this->load->view('admin/haad');
				$this->load->view('admin/navadmin');
				$this->load->view('admin/bannerCrud');
				$this->load->view('admin/seccionMenu');
				$this->load->view('admin/lateralMenu');
				$this->load->view('altaVendedor');
				$this->load->view('admin/footerAdmin');
				
			}else{
				$this->load->model('Vendedor_model');
				$datov = $this->Vendedor_model->guardarvendedor($nomv,$segnom,$apellipv,$apellimv,$callev,$numintv,$numextv,$cpv,$coloniav);
				if ($datov == true) {
							print '<script language="JavaScript">';
                			print 'alert("Registro exitosamente guardado");';
                			print '</script>';
               				$this->load->view('admin/haad');
							$this->load->view('admin/navadmin');
							$this->load->view('admin/bannerCrud');
							$this->load->view('admin/seccionMenu');
							$this->load->view('admin/lateralMenu');
							$this->load->view('altacontrato');
							$this->load->view('admin/footerAdmin');
					
				}//fin del true condicional

			}//Segundoelse

		}//else principal



	}
}