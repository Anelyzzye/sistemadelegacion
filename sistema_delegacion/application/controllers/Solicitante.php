<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solicitante extends CI_Controller {
	
	public function index()
	{
		$this->load->view('admin/haad');
		$this->load->view('admin/navadmin');
		$this->load->view('admin/reaperturas/bannerTumbas');
		$this->load->view('admin/reaperturas/seccionSuperior');
		$this->load->view('admin/reaperturas/lateralTumbas');
		$this->load->view('altaSolicitante');
		$this->load->view('admin/footerAdmin');
	}
	public function registrosolicitante() 
	{
		$nomsol = $this->input->post('nombre_solicitante');
		$nomseg = $this->input->post('nombre_segundo');
		$apellps = $this->input->post('apellidopat_solicitante');
		$apellims = $this->input->post('apellidomat_solicitante');
		$calles = $this->input->post('calle_solicitante');
		$nis = $this->input->post('numint_solicitate');
		$nes = $this->input->post('numext_solicitante');
		$cps = $this->input->post('cp_solicitante');
		$tels = $this->input->post('telefono_solicitante');

		$this->form_validation->set_rules('nombre_solicitante','Nombre solicitante','required');
		$this->form_validation->set_rules('apellidopat_solicitante','Apellido paterno','required');
		$this->form_validation->set_rules('calle_solicitante','Calle','required');
		$this->form_validation->set_rules('numint_solicitate','Numero interior','required');
		$this->form_validation->set_rules('cp_solicitante','Codigo','required');
		$this->form_validation->set_rules('telefono_solicitante','Telefono','required');
		
		
		if ($this->form_validation->run()==FALSE) {

			$this->load->view('admin/haad');
			$this->load->view('admin/navadmin');
			$this->load->view('admin/reaperturas/bannerTumbas');
			$this->load->view('admin/reaperturas/seccionSuperior');
			$this->load->view('admin/reaperturas/lateralTumbas');
			$this->load->view('altaSolicitante');
			$this->load->view('admin/footerAdmin');
			
		}else{
			$this->load->model('Solicitante_model');
			$res = $this->Solicitante_model->duplicadosolicitante($nomsol,$nomseg,$apellps,$apellims);
			if ($res != null) {

				print '<script language="JavaScript">';
                print 'alert("Registro duplicado");';
                print '</script>';
				$this->load->view('admin/haad');
				$this->load->view('admin/navadmin');
				$this->load->view('admin/reaperturas/bannerTumbas');
				$this->load->view('admin/reaperturas/seccionSuperior');
				$this->load->view('admin/reaperturas/lateralTumbas');
				$this->load->view('altaSolicitante');
				$this->load->view('admin/footerAdmin');
				
			}else{
				$this->load->model('Solicitante_model');
				$datos = $this->Solicitante_model->guardarsolicitante($nomsol,$nomseg,$apellps,$apellims,$calles,$nis,$nes,$cps,$tels);
				if ($datos == true) {
							print '<script language="JavaScript">';
                			print 'alert("Registro exitosamente guardado");';
                			print '</script>';
               				$this->load->view('admin/haad');
							$this->load->view('admin/navadmin');
							$this->load->view('admin/reaperturas/bannerTumbas');
							$this->load->view('admin/reaperturas/seccionSuperior');
							$this->load->view('admin/reaperturas/lateralTumbas');
							$this->load->view('altaSolicitante');
							$this->load->view('admin/footerAdmin');;
					
				}//fin del true condicional

			}//Segundoelse

		}//else principal



	}//Fin registro
}