<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comprador extends CI_Controller {
		function __construct()
		{
			parent::__construct();
			$this->load->model('Comprador_model');


		}

		public function index()
		{
			$this->load->view('admin/haad');
			$this->load->view('admin/navadmin');
			$this->load->view('admin/bannerCrud');
			$this->load->view('admin/seccionMenu');
			$this->load->view('admin/lateralMenu');
			$this->load->view('compraventa');
			$this->load->view('admin/footerAdmin');
		}

		public function vistaComprador()
		{
			$this->load->view('admin/haad');
			$this->load->view('admin/navadmin');
			$this->load->view('admin/bannerCrud');
			$this->load->view('admin/seccionMenu');
			$this->load->view('admin/lateral_menuModifica');
			$this->load->view('editaComprador');
			$this->load->view('admin/footerAdmin');
		}
		public function registrocomprador()
		{
			$nombrec = $this->input->post('nombre_comprador');
			$segundon= $this->input->post('segundo_nombrecomprador');
			$apellidopatc = $this->input->post('apellidopat_comprador');
			$apellidomatc= $this->input->post('apellidomat_comprador');
			$callec = $this->input->post('calle_comprador');
			$numintc= $this->input->post('numint_comprador');
			$numextc = $this->input->post('numext_comprador');
			$cpc = $this->input->post('cp_comprador');
			$coloniac= $this->input->post('colonia_comprador');

			$this->form_validation->set_rules('nombre_comprador','Nombre comprador','required');
			$this->form_validation->set_rules('apellidopat_comprador','Apellido paterno','required');
			$this->form_validation->set_rules('calle_comprador','Calle','required');
			$this->form_validation->set_rules('numint_comprador','Numero interior','required');
			$this->form_validation->set_rules('numext_comprador','Numero exterior','required');
			$this->form_validation->set_rules('cp_comprador','Codigo postal','required');
			$this->form_validation->set_rules('colonia_comprador','Colonia','required');


			if ($this->form_validation->run()==FALSE) 
			{
				$this->load->view('admin/haad');
				$this->load->view('admin/navadmin');
				$this->load->view('admin/bannerCrud');
				$this->load->view('admin/seccionMenu');
				$this->load->view('admin/lateral_menuModifica');
				$this->load->view('compraventa');
				$this->load->view('admin/footerAdmin');
				
			}else
			{
				$this->load->model('Comprador_model');
				$res = $this->Comprador_model->duplicadocomprador($nombrec,$segundon,$apellidopatc,$apellidomatc);
				if ($res != null) 
				{
					print '<script language="JavaScript">';
                	print 'alert("Registro duplicado");';
                	print '</script>';
                	$this->load->view('admin/haad');
					$this->load->view('admin/navadmin');
					$this->load->view('admin/bannerCrud');
					$this->load->view('admin/seccionMenu');
					$this->load->view('admin/lateral_menuModifica');
					$this->load->view('compraventa');
					$this->load->view('admin/footerAdmin');
				}else
				{	
					$this->load->model('Comprador_model');
					$dato = $this->Comprador_model->guardar($nombrec,$segundon,$apellidopatc,$apellidomatc,$callec,$numintc,$numextc,$cpc,$coloniac);
			
						if ($dato== true) 
						{
							print '<script language="JavaScript">';
                			print 'alert("Registro exitosamente guardado");';
                			print '</script>';
               				$this->load->view('admin/haad');
							$this->load->view('admin/navadmin');
							$this->load->view('admin/bannerCrud');
							$this->load->view('admin/seccionMenu');
							$this->load->view('admin/lateralMenu');
							$this->load->view('altavendedor');
							$this->load->view('admin/footerAdmin');
						}
				}			
			}

		}
}		