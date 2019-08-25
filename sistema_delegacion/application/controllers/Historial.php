<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Historial extends CI_Controller 
{
	public function index()
	{	
		$this->load->model('HistorialContrato_model');
		$data['resultadocontrato'] = $this->HistorialContrato_model->combocontrato();
		$this->load->model('HistorialContrato_model');
		$data['resultadoterreno'] = $this->HistorialContrato_model->comboterreno();
		$this->load->model('HistorialContrato_model');
		$data['resultadoanexo'] = $this->HistorialContrato_model->comboanexo();

		$this->load->view('admin/haad');
		$this->load->view('admin/navadmin');
		$this->load->view('admin/bannerCrud');
		$this->load->view('admin/seccionMenu');
		$this->load->view('admin/lateralMenu');
		$this->load->view('historial_TerrenoContrato',$data);
		$this->load->view('admin/footerAdmin');
	}
	public function detalle()
	{
		$this->load->View('admin/haad');
		$this->load->View('admin/navadmin');
		$this->load->View('admin/bannerCrud');
		$this->load->view('admin/seccionMenu');
		$this->load->View('detalle_ContratoTerreno');
		$this->load->View('admin/footerAdmin');
	}
	public function detalleconsulta()
	{
		$criterio = $this->input->get('criterio');
		$this->load->model('HistorialContrato_model');
			$data['resultadocontrato']=$this->HistorialContrato_model->buscacontrato($criterio);
			$data['criterio']=$criterio;
		$this->load->View('admin/haad');
		$this->load->View('admin/navadmin');
		$this->load->View('admin/bannerCrud');
		$this->load->view('admin/seccionMenu');
		$this->load->View('consultacontrato',$data);
		$this->load->View('admin/footerAdmin');
	}
	public function vistaHistorial()
	{
		
		$this->load->view('admin/haad');
		$this->load->view('admin/navadmin');
		$this->load->view('admin/bannerCrud');
		$this->load->view('admin/seccionMenu');
		$this->load->view('admin/lateral_menuModifica');
		$this->load->view('editaHistorial_terrenoContrato');
		$this->load->view('admin/footerAdmin');
	}
	public function registrohistorial()
	{
		$ic = $this->input->post('idcontrato');
		$nitrr = $this->input->post('idterreno');
		$idx = $this->input->post('idanexo');

		//$this->form_validation->set_rules('idcontrato','Contrato','required');
		$this->form_validation->set_rules('idterreno','Terreno','required');
		//$this->form_validation->set_rules('idanexo','Anexo','required');

		
		if ($this->form_validation->run()==FALSE) {

		$this->load->model('HistorialContrato_model');
		$data['resultadocomprador'] = $this->HistorialContrato_model->combocomprador();
		$this->load->model('HistorialContrato_model');
		$data['resultadoterreno'] = $this->HistorialContrato_model->comboterreno();
		$this->load->model('HistorialContrato_model');
		$data['resultadoanexo'] = $this->HistorialContrato_model->comboanexo();

		$this->load->view('admin/haad');
		$this->load->view('admin/navadmin');
		$this->load->view('admin/bannerCrud');
		$this->load->view('admin/seccionMenu');
		$this->load->view('admin/lateralMenu');
		$this->load->view('historial_TerrenoContrato',$data);
		$this->load->view('admin/footerAdmin');
			
		}else{
			$this->load->model('Contrato_model');
			$res = $this->Contrato_model->duplicadocontrato($ic,$nitrr,$idx);
			if ($res != null) {
				$this->load->model('HistorialContrato_model');
		$data['resultadocomprador'] = $this->HistorialContrato_model->combocomprador();
		$this->load->model('HistorialContrato_model');
		$data['resultadoterreno'] = $this->HistorialContrato_model->comboterreno();
		$this->load->model('HistorialContrato_model');
		$data['resultadoanexo'] = $this->HistorialContrato_model->comboanexo();
				print '<script language="JavaScript">';
                print 'alert("Registro duplicado");';
                print '</script>';
					$this->load->view('admin/haad');
		$this->load->view('admin/navadmin');
		$this->load->view('admin/bannerCrud');
		$this->load->view('admin/seccionMenu');
		$this->load->view('admin/lateralMenu');
		$this->load->view('historial_TerrenoContrato',$data);
		$this->load->view('admin/footerAdmin');
				
			}else{
				$this->load->model('HistorialContrato_model');
				$datot = $this->HistorialContrato_model->registrohistorial($ic,$nitrr,$idx);
				if ($datot == true) {
						$this->load->model('HistorialContrato_model');
		$data['resultadocomprador'] = $this->HistorialContrato_model->combocomprador();
		$this->load->model('HistorialContrato_model');
		$data['resultadoterreno'] = $this->HistorialContrato_model->comboterreno();
		$this->load->model('HistorialContrato_model');
		$data['resultadoanexo'] = $this->HistorialContrato_model->comboanexo();
						print '<script language="JavaScript">';
                		print 'alert("Registro guardado");';
                		print '</script>';
						$this->load->view('admin/haad');
		$this->load->view('admin/navadmin');
		$this->load->view('admin/bannerCrud');
		$this->load->view('admin/seccionMenu');
		$this->load->view('admin/lateralMenu');
		$this->load->view('historial_TerrenoContrato',$data);
		$this->load->view('admin/footerAdmin');
					
				}//fin del true condicional

			}//Segundoelse

		}//else principal



	}

	public function reportes()
	{
		$this->load->View('admin/haad');
		$this->load->View('admin/navadmin');
		$this->load->View('admin/bannerCrud');
		$this->load->view('admin/seccionMenu');
		$this->load->View('detalle_registro');
		$this->load->View('admin/footerAdmin');

	}
	public function registroconsulta()
	{
		$criterio = $this->input->get('criterio');
		$this->load->model('HistorialContrato_model');
			$data['resultadoregistro']=$this->HistorialContrato_model->buscafecha($criterio);
			$data['criterio']=$criterio;
		$this->load->View('admin/haad');
		$this->load->View('admin/navadmin');
		$this->load->View('admin/bannerCrud');
		$this->load->view('admin/seccionMenu');
		$this->load->View('consultaregistro',$data);
		$this->load->View('admin/footerAdmin');
	}
}