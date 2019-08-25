<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reaperturas extends CI_Controller {
	
	public function index()
	{	
		$this->load->model('Reaperturas_model');
        $data['resultfinado'] = $this->Reaperturas_model->combofinado();
        $this->load->model('Reaperturas_model');
        $data['resultorden'] = $this->Reaperturas_model->comboorden();
		$this->load->view('admin/haad');
		$this->load->view('admin/navadmin');
		$this->load->view('admin/reaperturas/bannerTumbas');
		$this->load->view('admin/reaperturas/seccionSuperior');
		$this->load->view('admin/reaperturas/lateralTumbas');
		$this->load->view('altaActa',$data);
		$this->load->view('admin/footerAdmin');
	}
	public function registracta(){
        $cfinado = $this->input->post('idciudadano');
        $fechare = $this->input->post('fecha_registro');
        $curp = $this->input->post('curp');
        $fechadef = $this->input->post('fecha_defun');
        $horadef = $this->input->post('hora_defun');
        $causasmu = $this->input->post('causas_muerte');
        $foliocer = $this->input->post('folio_certificado');
        $feinhuma = $this->input->post('fecha_inhumacion');
        $foinhuma = $this->input->post('folio_inhumacion');

        $torden = $this->input->post('idtipo_orden');

        

        $this->form_validation->set_rules('idciudadano','Persona finada','required');
        $this->form_validation->set_rules('fecha_registro','Fecha Registro','required');
        $this->form_validation->set_rules('curp','Curp','required');
        $this->form_validation->set_rules('fecha_defun','Fecha Defuncion','required');
        $this->form_validation->set_rules('hora_defun','Hora Defuncion','required');
        $this->form_validation->set_rules('causas_muerte','Causas Muerte','required');
        $this->form_validation->set_rules('folio_certificado','Folio Certificado','required');
        $this->form_validation->set_rules('fecha_inhumacion','Fecha inhumacion','required');
        $this->form_validation->set_rules('folio_inhumacion','Folio inhumacion','required');
        $this->form_validation->set_rules('idtipo_orden','Tipo orden','required');

        if ($this->form_validation->run()==FALSE) {

      	$this->load->model('Reaperturas_model');
        $data['resultfinado'] = $this->Reaperturas_model->combofinado();
        $this->load->model('Reaperturas_model');
        $data['resultorden'] = $this->Reaperturas_model->comboorden();
        $this->load->view('admin/haad');
		$this->load->view('admin/navadmin');
		$this->load->view('admin/reaperturas/bannerTumbas');
		$this->load->view('admin/reaperturas/seccionSuperior');
		$this->load->view('admin/reaperturas/lateralTumbas');
		$this->load->view('altaActa',$data);
		$this->load->view('admin/footerAdmin');
        }else{
            $this->load->model('Reaperturas_model');
            $res = $this->Reaperturas_model->duplicadoacta($cfinado);
            if ($res != null) {

                $this->load->model('Reaperturas_model');
        		$data['resultfinado'] = $this->Reaperturas_model->combofinado();
        		$this->load->model('Reaperturas_model');
        		$data['resultorden'] = $this->Reaperturas_model->comboorden();
                print '<script language="JavaScript">';
                print 'alert("Registro duplicado");';
                print '</script>';
                $this->load->view('admin/haad');
				$this->load->view('admin/navadmin');
				$this->load->view('admin/reaperturas/bannerTumbas');
				$this->load->view('admin/reaperturas/seccionSuperior');
				$this->load->view('admin/reaperturas/lateralTumbas');
				$this->load->view('altaActa',$data);
				$this->load->view('admin/footerAdmin');
                
            }else{
                $this->load->model('Reaperturas_model');
                $datot = $this->Reaperturas_model->guardaracta($cfinado,$fechare,$curp,$fechadef,$horadef,$causasmu,$foliocer,$feinhuma,$foinhuma,$torden);
                if ($datot == true) {
                         $this->load->model('Reaperturas_model');
        		$data['resultfinado'] = $this->Reaperturas_model->combofinado();
        		$this->load->model('Reaperturas_model');
        		$data['resultorden'] = $this->Reaperturas_model->comboorden();
                        print '<script language="JavaScript">';
                        print 'alert("Registro guardado");';
                        print '</script>';
                        $this->load->view('admin/haad');
						$this->load->view('admin/navadmin');
						$this->load->view('admin/reaperturas/bannerTumbas');
						$this->load->view('admin/reaperturas/seccionSuperior');
						$this->load->view('admin/reaperturas/lateralTumbas');
						$this->load->view('altaActa',$data);
						$this->load->view('admin/footerAdmin');
                    
                }//fin del true condicional

            }//Segundoelse

        }//else principal
    }

    public function detalle()
    {
        $this->load->view('admin/haad');
        $this->load->view('admin/navadmin');
        $this->load->view('admin/reaperturas/bannerTumbas');
        $this->load->view('admin/reaperturas/seccionSuperior');
        $this->load->view('admin/reaperturas/modificalateral');
        $this->load->view('detalle_acta');
        $this->load->view('admin/footerAdmin');
    }

    public function consultafinado()
    {
        $criterio = $this->input->get('criterio');
        $this->load->model('Reaperturas_model');
        $data['resultfinados']=$this->Reaperturas_model->consultafinado($criterio);
        $data['criterio']=$criterio;
        $this->load->view('admin/haad');
        $this->load->view('admin/navadmin');
        $this->load->view('admin/reaperturas/bannerTumbas');
        $this->load->view('admin/reaperturas/seccionSuperior');
        $this->load->view('consulta_finado',$data);
        $this->load->view('admin/footerAdmin');
    }

    public function modificafinado($dni)
    {   
        $this->load->model('Reaperturas_model');
        $data['resultfinados'] = $this->Reaperturas_model->buscaporidacta($dni);
        $this->load->model('Reaperturas_model');
        $data['resultfinado'] = $this->Reaperturas_model->combofinado();
        $this->load->model('Reaperturas_model');
        $data['resultorden'] = $this->Reaperturas_model->comboorden();
        $this->load->view('admin/haad');
        $this->load->view('admin/navadmin');
        $this->load->view('admin/reaperturas/bannerTumbas');
        $this->load->view('admin/reaperturas/seccionSuperior');
        $this->load->view('admin/reaperturas/lateralTumbas');
        $this->load->view('modifica_acta',$data);
        $this->load->view('admin/footerAdmin');  
    }

    public function cambiosacta()
    {
        $dni=$this->input->post('idacta');
        $iddc=$this->input->post('idciudadano');
        $fech=$this->input->post('fecha_registro');
        $curp=$this->input->post('curp');
        $fdefun=$this->input->post('fecha_defun');
        $hdefun=$this->input->post('hora_defun');
        $cmuerte=$this->input->post('causas_muerte');
        $fcert=$this->input->post('folio_certificado');
        $finhu=$this->input->post('fecha_inhumacion');
        $flinhu=$this->input->post('folio_inhumacion');
        $ttor=$this->input->post('idtipo_orden');
         

         $this->load->model('Reaperturas_model');
        $resultado=$this->Reaperturas_model->finadomodifica($dni,$iddc,$fech,$curp,$fdefun,$hdefun,$cmuerte,$fcert,$finhu,$flinhu,$ttor);

        if($resultado==true){
            print '<script language="JavaScript">';
            print 'alert("Registro modificado");';
            print '</script>';
            $this->load->view('admin/haad');
        $this->load->view('admin/navadmin');
        $this->load->view('admin/reaperturas/bannerTumbas');
        $this->load->view('admin/reaperturas/seccionSuperior');
        $this->load->view('admin/reaperturas/modificalateral');
        $this->load->view('detalle_acta');
        $this->load->view('admin/footerAdmin');
    }
    }
}