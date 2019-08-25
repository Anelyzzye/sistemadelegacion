<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ciudadano extends CI_Controller {
	/**
	 * Description ista formulario registraciudadano
	 * @return String
	 * 			Arrys [Resultadociuda] - [resultgenero]
	 */
	
	public function index()
	{	
		$this->load->model('Ciudadano_model');
		$data['resultciuda'] = $this->Ciudadano_model->combotipociudadano();
		$this->load->model('Ciudadano_model');
		$data['resultgenero'] = $this->Ciudadano_model->combogenero();
		$this->load->view('admin/haad');
		$this->load->view('admin/navadmin');
		$this->load->view('admin/ciuda/bannerCiudadano');
		$this->load->view('admin/ciuda/seccionSuperiorCiudadano');
		$this->load->view('admin/ciuda/lateralCiudadano');
		$this->load->view('altaCiudadano',$data);
		$this->load->view('admin/footerAdmin');
	}
	/**
	 * Description Registra usuario
	 * @return String
	 * Variasbles $nombc string, $nombseg string, $appart string,
	 * 				$apmat string, $callec string, $numextc string,
	 * 				$codp int, $colciu String, $ng string, $tipc string
	 */
	public function registraciudadano(){
		$nombc = $this->input->post('nombre_ciudadano');
		$nombseg = $this->input->post('nombre_segundociudadano');
		$appat = $this->input->post('apellidopat_ciudadano');
		$apmat = $this->input->post('apellidomat_ciudadano');
		$callec = $this->input->post('calle_ciudadano');
		$numextc = $this->input->post('numext_ciudadano');
		$numintc = $this->input->post('numint_ciudadano');
		$codp = $this->input->post('codp');
		$colciu= $this->input->post('colonia');
		$ng = $this->input->post('idgenero');
		$tipc = $this->input->post('idtipo_ciudadano');


		$this->form_validation->set_rules('nombre_ciudadano','Nombre Ciudadano','required');
		$this->form_validation->set_rules('apellidopat_ciudadano','Apellido paterno','required');
		$this->form_validation->set_rules('idgenero','Genero','required');
		$this->form_validation->set_rules('idtipo_ciudadano','Tipo Ciudadano','required');

		if ($this->form_validation->run()==FALSE) {

		$this->load->model('Ciudadano_model');
		$data['resultciuda'] = $this->Ciudadano_model->combotipociudadano();
		$this->load->model('Ciudadano_model');
		$data['resultgenero'] = $this->Ciudadano_model->combogenero();
		$this->load->view('admin/haad');
		$this->load->view('admin/navadmin');
		$this->load->view('admin/ciuda/bannerCiudadano');
		$this->load->view('admin/ciuda/seccionSuperiorCiudadano');
		$this->load->view('admin/ciuda/lateralCiudadano');
		$this->load->view('altaCiudadano',$data);
		$this->load->view('admin/footerAdmin');
			
		}else{
			$this->load->model('Ciudadano_model');
			$res = $this->Ciudadano_model->duplicadociudadano($nombc,$nombseg,$appat,$apmat);
			if ($res != null) {

				$this->load->model('Ciudadano_model');
				$data['resultciuda'] = $this->Ciudadano_model->combotipociudadano();
				$this->load->model('Ciudadano_model');
				$data['resultgenero'] = $this->Ciudadano_model->combogenero();
				print '<script language="JavaScript">';
                print 'alert("Registro duplicado");';
                print '</script>';
				$this->load->view('admin/haad');
				$this->load->view('admin/navadmin');
				$this->load->view('admin/ciuda/bannerCiudadano');
				$this->load->view('admin/ciuda/seccionSuperiorCiudadano');
				$this->load->view('admin/ciuda/lateralCiudadano');
				$this->load->view('altaCiudadano',$data);
				$this->load->view('admin/footerAdmin');
				
			}else{
				$this->load->model('Ciudadano_model');
				$datot = $this->Ciudadano_model->guardarciudadano($nombc,$nombseg,$appat,$apmat,$callec,$numextc,$numintc,$codp,$colciu,$ng,$tipc);
				if ($datot == true) {
						$this->load->model('Ciudadano_model');
						$data['resultciuda'] = $this->Ciudadano_model->combotipociudadano();
						$this->load->model('Ciudadano_model');
						$data['resultgenero'] = $this->Ciudadano_model->combogenero();
						print '<script language="JavaScript">';
                		print 'alert("Registro guardado");';
                		print '</script>';
						$this->load->view('admin/haad');
						$this->load->view('admin/navadmin');
						$this->load->view('admin/ciuda/bannerCiudadano');
						$this->load->view('admin/ciuda/seccionSuperiorCiudadano');
						$this->load->view('admin/ciuda/lateralCiudadano');
						$this->load->view('altaCiudadano',$data);
						$this->load->view('admin/footerAdmin');
					
				}//fin del true condicional

			}//Segundoelse

		}//else principal



	}
	/**
	 * Description vista ciudadano
	 * @return void
	 */
	public function modifica()
	{
		$this->load->view('admin/haad');
		$this->load->view('admin/navadmin');
		$this->load->view('admin/ciuda/bannerCiudadano');
		$this->load->view('admin/ciuda/seccionSuperiorCiudadano');
		$this->load->view('admin/ciuda/modificalateral');
		$this->load->view('detalle_ciudadano');
		$this->load->view('admin/footerAdmin');

	}

	/**
	 * Description Consulta ciudadano
	 * @return String Arrays[Result] - [Criterio]
	 * 
	 */
	public function consultaciudadano()
	{
		$criterio = $this->input->get('criterio');
		$this->load->model('Ciudadano_model');
		$data['result']=$this->Ciudadano_model->consultaciudadano($criterio);
		$data['criterio']=$criterio;
		$this->load->view('admin/haad');
		$this->load->view('admin/navadmin');
		$this->load->view('admin/ciuda/bannerCiudadano');
		$this->load->view('admin/ciuda/seccionSuperiorCiudadano');
		
		$this->load->view('consultaciudadano',$data);
		$this->load->view('admin/footerAdmin');
	}

	/**
	 * Description Modifica Ciudadano
	 * @param type $dni 
	 * @return  String $data
	  Arrays[Result] - [resultciuda] - [resultgenero]
	 */
	public function modificaciudadano($dni){
		$this->load->model('Ciudadano_model');
		$data['result'] = $this->Ciudadano_model->buscaidciud($dni);
		$this->load->model('Ciudadano_model');
		$data['resultciuda'] = $this->Ciudadano_model->combotipociudadano();
		$this->load->model('Ciudadano_model');
		$data['resultgenero'] = $this->Ciudadano_model->combogenero();
		$this->load->view('admin/haad');
		$this->load->view('admin/navadmin');
		$this->load->view('admin/ciuda/bannerCiudadano');
		$this->load->view('admin/ciuda/seccionSuperiorCiudadano');
		$this->load->view('admin/ciuda/modificalateral');
		$this->load->view('modificaciudadano',$data);
		$this->load->view('admin/footerAdmin');
	}

	/**
	 * Description Guarda Cambios Ciudadano
	 * @return String
	 * Variables $dni int, $cid string, $segn string, $apellidop String
	 	$apellidom string
	 */
	public function cambiosciudadano()
	{
		$dni=$this->input->post('idciudadano');
		$cid=$this->input->post('nombre_ciudadano');
		$segn=$this->input->post('nombre_segundociudadano');
		$apellidop=$this->input->post('apellidopat_ciudadano');
		$apellidom=$this->input->post('apellidomat_ciudadano');
		$calleci=$this->input->post('calle_ciudadano');
		$numet=$this->input->post('numext_ciudadano');
		$numin=$this->input->post('numint_ciudadano');
		$codp=$this->input->post('codp');
		$col=$this->input->post('colonia');
		$gen=$this->input->post('idgenero');
		$tip=$this->input->post('idtipo_ciudadano');



		$this->load->model('Ciudadano_model');
		$resultado=$this->Ciudadano_model->ciudadanomodifica($dni,$cid,$segn,$apellidop,$apellidom,$calleci,$numet,$numin,$codp,$col,$gen,$tip);

		if($resultado==true){
			print '<script language="JavaScript">';
			print 'alert("Registro modificado");';
		    print '</script>';
		    $this->load->view('admin/haad');
		$this->load->view('admin/navadmin');
		$this->load->view('admin/ciuda/bannerCiudadano');
		$this->load->view('admin/ciuda/seccionSuperiorCiudadano');
		$this->load->view('admin/ciuda/modificalateral');
		$this->load->view('detalle_ciudadano');
		$this->load->view('admin/footerAdmin');

		}
	}
}