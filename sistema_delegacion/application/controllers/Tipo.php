<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipo extends CI_Controller {
	
	public function index()
	{
		$this->load->view('admin/haad');
		$this->load->view('admin/navadmin');
		$this->load->view('admin/reaperturas/bannerTumbas');
		$this->load->view('admin/reaperturas/seccionSuperior');
		$this->load->view('admin/reaperturas/lateralTumbas');
		$this->load->view('altaTipo');
		$this->load->view('admin/footerAdmin');
	}
	public function registrotumba() 
	{
		$torden = $this->input->post('tipo_orden');
		$desc = $this->input->post('descripcion');
		

		$this->form_validation->set_rules('tipo_orden','Tipo de orden','required');
		$this->form_validation->set_rules('descripcion','descripcion','required');
		
		
		if ($this->form_validation->run()==FALSE) {

			$this->load->view('admin/haad');
			$this->load->view('admin/navadmin');
			$this->load->view('admin/reaperturas/bannerTumbas');
			$this->load->view('admin/reaperturas/seccionSuperior');
			$this->load->view('admin/reaperturas/lateralTumbas');
			$this->load->view('altaTipo');
			$this->load->view('admin/footerAdmin');
			
		}else{
			$this->load->model('Tipo_model');
			$res = $this->Tipo_model->duplicadotipo($torden);
			if ($res != null) {

				print '<script language="JavaScript">';
                print 'alert("Registro duplicado");';
                print '</script>';
				$this->load->view('admin/haad');
				$this->load->view('admin/navadmin');
				$this->load->view('admin/reaperturas/bannerTumbas');
				$this->load->view('admin/reaperturas/seccionSuperior');
				$this->load->view('admin/reaperturas/lateralTumbas');
				$this->load->view('altaTipo');
				$this->load->view('admin/footerAdmin');
				
			}else{
				$this->load->model('Tipo_model');
				$datos = $this->Tipo_model->guardartipo($torden,$desc);
				if ($datos == true) {
							print '<script language="JavaScript">';
                			print 'alert("Registro exitosamente guardado");';
                			print '</script>';
               				$this->load->view('admin/haad');
							$this->load->view('admin/navadmin');
							$this->load->view('admin/reaperturas/bannerTumbas');
							$this->load->view('admin/reaperturas/seccionSuperior');
							$this->load->view('admin/reaperturas/lateralTumbas');
							$this->load->view('altaTipo');
							$this->load->view('admin/footerAdmin');;
					
				}//fin del true condicional

			}//Segundoelse

		}//else principal



	}//Fin registro
}