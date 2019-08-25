<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tumba extends CI_Controller {
	
	public function index()
	{	
		$this->load->model('Tumba_model');
        $data['resultsepultado'] = $this->Tumba_model->combosepultado();
		$this->load->view('admin/haad');
		$this->load->view('admin/navadmin');
		$this->load->view('admin/reaperturas/bannerTumbas');
		$this->load->view('admin/reaperturas/seccionSuperior');
		$this->load->view('admin/reaperturas/lateralTumbas');
		$this->load->view('altaTumba',$data);
		$this->load->view('admin/footerAdmin');
	}
	public function registrotumba() 
	{
		$idct = $this->input->post('idciudadano');
		$timedef = $this->input->post('tiempo_defunsion');
		$large = $this->input->post('largo_metros');
		$anchmed = $this->input->post('ancho_medida');
		$centsep = $this->input->post('centimetros_separacion');
		
		$this->form_validation->set_rules('idciudadano','Persona Sepultada','required');
		$this->form_validation->set_rules('tiempo_defunsion','Tiempo Defunsion','required');
		$this->form_validation->set_rules('largo_metros','Medida en metros','required');
		$this->form_validation->set_rules('ancho_medida','Ancho en medida','required');
		$this->form_validation->set_rules('centimetros_separacion','Centrimetros separacíon','required');
		
		
		if ($this->form_validation->run()==FALSE) {

			$this->load->model('Tumba_model');
        	$data['resultsepultado'] = $this->Tumba_model->combosepultado();
			$this->load->view('admin/haad');
			$this->load->view('admin/navadmin');
			$this->load->view('admin/reaperturas/bannerTumbas');
			$this->load->view('admin/reaperturas/seccionSuperior');
			$this->load->view('admin/reaperturas/lateralTumbas');
			$this->load->view('altaTumba',$data);
			$this->load->view('admin/footerAdmin');
			
		}else{
			$this->load->model('Tumba_model');
			$res = $this->Tumba_model->duplicadotumba($idct);
			if ($res != null) {
				$this->load->model('Tumba_model');
        		$data['resultsepultado'] = $this->Tumba_model->combosepultado();
				print '<script language="JavaScript">';
                print 'alert("Registro duplicado");';
                print '</script>';
				$this->load->view('admin/haad');
				$this->load->view('admin/navadmin');
				$this->load->view('admin/reaperturas/bannerTumbas');
				$this->load->view('admin/reaperturas/seccionSuperior');
				$this->load->view('admin/reaperturas/lateralTumbas');
				$this->load->view('altaTumba',$data);
				$this->load->view('admin/footerAdmin');
				
			}else{
				$this->load->model('Tumba_model');
				$datos = $this->Tumba_model->guardartumba($idct,$timedef,$large,$anchmed,$centsep);
				if ($datos == true) {
							$this->load->model('Tumba_model');
        					$data['resultsepultado'] = $this->Tumba_model->combosepultado();
							print '<script language="JavaScript">';
                			print 'alert("Registro exitosamente guardado");';
                			print '</script>';
               				$this->load->view('admin/haad');
							$this->load->view('admin/navadmin');
							$this->load->view('admin/reaperturas/bannerTumbas');
							$this->load->view('admin/reaperturas/seccionSuperior');
							$this->load->view('admin/reaperturas/lateralTumbas');
							$this->load->view('altaTumba',$data);
							$this->load->view('admin/footerAdmin');
				
					
				}//fin del true condicional

			}//Segundoelse

		}//else principal



	}//Fin registro

	public function detalleporfecha()
	{
		$this->load->view('admin/haad');
        $this->load->view('admin/navadmin');
        $this->load->view('admin/reaperturas/bannerTumbas');
        $this->load->view('admin/reaperturas/seccionSuperior');
        $this->load->view('detalle_fechapermiso');
        $this->load->view('admin/footerAdmin');
	}
	public function porfecha()
	{
		$criterio = $this->input->get('criterio');
        $this->load->model('Tumba_model');
        $data['resultadofecha']=$this->Tumba_model->buscaporfecha($criterio);
        $data['criterio']=$criterio;
		$this->load->view('admin/haad');
        $this->load->view('admin/navadmin');
        $this->load->view('admin/reaperturas/bannerTumbas');
        $this->load->view('admin/reaperturas/seccionSuperior');
        $this->load->view('porfechapermiso',$data);
        $this->load->view('admin/footerAdmin');
	}
	public function detalletumba()
	{
		$this->load->view('admin/haad');
        $this->load->view('admin/navadmin');
        $this->load->view('admin/reaperturas/bannerTumbas');
        $this->load->view('admin/reaperturas/seccionSuperior');
        $this->load->view('detalle_tumba');
        $this->load->view('admin/footerAdmin');
	}
	public function existenciatumba()
	{
		$criterio = $this->input->get('criterio');
        $this->load->model('Tumba_model');
        $data['resultadotumba']=$this->Tumba_model->buscatumba($criterio);
        $data['criterio']=$criterio;
		$this->load->view('admin/haad');
        $this->load->view('admin/navadmin');
        $this->load->view('admin/reaperturas/bannerTumbas');
        $this->load->view('admin/reaperturas/seccionSuperior');
        $this->load->view('consultartumba',$data);
        $this->load->view('admin/footerAdmin');

	}

	public function detallemodifica()
	{
		$this->load->view('admin/haad');
        $this->load->view('admin/navadmin');
        $this->load->view('admin/reaperturas/bannerTumbas');
        $this->load->view('admin/reaperturas/seccionSuperior');
         $this->load->view('admin/reaperturas/modificalateral');
        $this->load->view('detalle_tumbamodifica');
        $this->load->view('admin/footerAdmin');
	}

	public function deconsultamodifica()
    {
        $criterio = $this->input->get('criterio');
        $this->load->model('Tumba_model');
        $data['resultadomodific']=$this->Tumba_model->buscamodifica($criterio);
        $data['criterio']=$criterio;
        $this->load->view('admin/haad');
        $this->load->view('admin/navadmin');
        $this->load->view('admin/reaperturas/bannerTumbas');
        $this->load->view('admin/reaperturas/seccionSuperior');
        $this->load->view('consultatumba_modifica',$data);
        $this->load->view('admin/footerAdmin');
    }   

     public function modificatumba($dni)
    {
        $this->load->model('Tumba_model');
        $data['resultadomodific'] = $this->Tumba_model->buscaid($dni); 
        $this->load->model('Tumba_model');
        $data['resultsepultado'] = $this->Tumba_model->combosepultado();
		$this->load->view('admin/haad');
		$this->load->view('admin/navadmin');
		$this->load->view('admin/reaperturas/bannerTumbas');
		$this->load->view('admin/reaperturas/seccionSuperior');
		$this->load->view('admin/reaperturas/lateralTumbas');
		$this->load->view('modifica_tumba',$data);
		$this->load->view('admin/footerAdmin');
	}
	public function cambiostumba()
	{
		$dni=$this->input->post('idtumba');
		$ddn=$this->input->post('idciudadano');
		$tdf=$this->input->post('tiempo_defunsion');
		$lmts=$this->input->post('largo_metros');
		$amdd=$this->input->post('ancho_medida');
		$csep=$this->input->post('centimetros_separacion');

		$this->load->model('Tumba_model');
        $resultado=$this->Tumba_model->actualizatumba($dni,$ddn,$tdf,$lmts,$amdd,$csep);

        if($resultado==true){
            print '<script language="JavaScript">';
            print 'alert("Registro modificado");';
            print '</script>';
            $this->load->view('admin/haad');
        	$this->load->view('admin/navadmin');
        	$this->load->view('admin/reaperturas/bannerTumbas');
        	$this->load->view('admin/reaperturas/seccionSuperior');
        	$this->load->view('admin/reaperturas/modificalateral');
        	$this->load->view('detalle_tumba');
        	$this->load->view('admin/footerAdmin');
    }

	}

}