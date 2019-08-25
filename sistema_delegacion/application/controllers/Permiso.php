<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permiso extends CI_Controller {
	
	public function index()
	{	
		$this->load->model('Permiso_model');
        $data['resultsolicitante'] = $this->Permiso_model->combopermiso();
        $this->load->model('Permiso_model');
        $data['resultacta'] = $this->Permiso_model->comboacta();
        $this->load->model('Permiso_model');
        $data['resultsepultada'] = $this->Permiso_model->combosepultada();
		$this->load->view('admin/haad');
		$this->load->view('admin/navadmin');
		$this->load->view('admin/reaperturas/bannerTumbas');
		$this->load->view('admin/reaperturas/seccionSuperior');
		$this->load->view('admin/reaperturas/lateralTumbas');
		$this->load->view('altaPermiso',$data);
		$this->load->view('admin/footerAdmin');
	}
		public function registrapermiso(){

		$idci = $this->input->post('idciudadano');
        $tel = $this->input->post('telefono');
        $datexp = $this->input->post('fecha_expide');
        $dateselp = $this->input->post('fecha_sepultura');
        $idac = $this->input->post('idacta');
        $obra = $this->input->post('obra_autorizada');
        $idt = $this->input->post('idtumba');

        

        $this->form_validation->set_rules('idciudadano','Persona solicitante','required');
        $this->form_validation->set_rules('telefono','Telefono','required');
        $this->form_validation->set_rules('fecha_expide','Fecha expedicion permiso','required');
        $this->form_validation->set_rules('fecha_sepultura','Fecha Sepultura','required');
        $this->form_validation->set_rules('idacta','Nombre finado','required');
        $this->form_validation->set_rules('obra_autorizada','Obra obra_autorizada','required');
        $this->form_validation->set_rules('idtumba','Persona sepultada','required');
       
        if ($this->form_validation->run()==FALSE) {

      	$this->load->model('Permiso_model');
        $data['resultsolicitante'] = $this->Permiso_model->combopermiso();
        $this->load->model('Permiso_model');
        $data['resultacta'] = $this->Permiso_model->comboacta();
        $this->load->model('Permiso_model');
        $data['resultsepultada'] = $this->Permiso_model->combosepultada();
        $this->load->view('admin/haad');
		$this->load->view('admin/navadmin');
		$this->load->view('admin/reaperturas/bannerTumbas');
		$this->load->view('admin/reaperturas/seccionSuperior');
		$this->load->view('admin/reaperturas/lateralTumbas');
		$this->load->view('altaPermiso',$data);
		$this->load->view('admin/footerAdmin');
        }else{
            $this->load->model('Permiso_model');
            $res = $this->Permiso_model->duplicadopermiso($idci,$idac,$idt);
            if ($res != null) {

            	$this->load->model('Permiso_model');
        		$data['resultsolicitante'] = $this->Permiso_model->combopermiso();
        		$this->load->model('Permiso_model');
        		$data['resultacta'] = $this->Permiso_model->comboacta();
        		$this->load->model('Permiso_model');
        		$data['resultsepultada'] = $this->Permiso_model->combosepultada();
                print '<script language="JavaScript">';
                print 'alert("Registro duplicado");';
                print '</script>';
               	$this->load->view('admin/haad');
				$this->load->view('admin/navadmin');
				$this->load->view('admin/reaperturas/bannerTumbas');
				$this->load->view('admin/reaperturas/seccionSuperior');
				$this->load->view('admin/reaperturas/lateralTumbas');
				$this->load->view('altaPermiso',$data);
				$this->load->view('admin/footerAdmin');
            }else{
                $this->load->model('Permiso_model');
                $datot = $this->Permiso_model->guardapermiso($idci,$tel,$datexp,$dateselp,$idac,$obra,$idt);
                if ($datot == true) {
                        $this->load->model('Permiso_model');
        				$data['resultsolicitante'] = $this->Permiso_model->combopermiso();
        				$this->load->model('Permiso_model');
        				$data['resultacta'] = $this->Permiso_model->comboacta();
        				$this->load->model('Permiso_model');
        				$data['resultsepultada'] = $this->Permiso_model->combosepultada();
                        print '<script language="JavaScript">';
                        print 'alert("Registro guardado");';
                        print '</script>';
                        $this->load->view('admin/haad');
						$this->load->view('admin/navadmin');
						$this->load->view('admin/reaperturas/bannerTumbas');
						$this->load->view('admin/reaperturas/seccionSuperior');
						$this->load->view('admin/reaperturas/lateralTumbas');
						$this->load->view('altaPermiso',$data);
						$this->load->view('admin/footerAdmin');
                    
                }//fin del true condicional

            }//Segundoelse

        }//else principal



    }
    public function detallepermiso()
    {
        $this->load->view('admin/haad');
        $this->load->view('admin/navadmin');
        $this->load->view('admin/reaperturas/bannerTumbas');
        $this->load->view('admin/reaperturas/seccionSuperior');
        $this->load->view('detalle_permiso');
        $this->load->view('admin/footerAdmin');
    }
    public function deconsultapermiso()
    {
        $criterio = $this->input->get('criterio');
        $this->load->model('Permiso_model');
        $data['resultadopermiso']=$this->Permiso_model->buscapermiso($criterio);
        $data['criterio']=$criterio;
        $this->load->view('admin/haad');
        $this->load->view('admin/navadmin');
        $this->load->view('admin/reaperturas/bannerTumbas');
        $this->load->view('admin/reaperturas/seccionSuperior');
        $this->load->view('consultapermiso',$data);
        $this->load->view('admin/footerAdmin');
    }

    public function detallemodifica()
    {
        $this->load->view('admin/haad');
        $this->load->view('admin/navadmin');
        $this->load->view('admin/reaperturas/bannerTumbas');
        $this->load->view('admin/reaperturas/seccionSuperior');
        $this->load->view('admin/reaperturas/modificalateral');
        $this->load->view('detalle_permisomodifica');
        $this->load->view('admin/footerAdmin');
    }
    public function deconsultamodifica()
    {
        $criterio = $this->input->get('criterio');
        $this->load->model('Permiso_model');
        $data['resultadomodifica']=$this->Permiso_model->buscamodifica($criterio);
        $data['criterio']=$criterio;
        $this->load->view('admin/haad');
        $this->load->view('admin/navadmin');
        $this->load->view('admin/reaperturas/bannerTumbas');
        $this->load->view('admin/reaperturas/seccionSuperior');
        $this->load->view('consultapermiso_modifica',$data);
        $this->load->view('admin/footerAdmin');

    }

    public function modificapermiso($dni)
    {
        $this->load->model('Permiso_model');
        $data['resultadomodifica'] = $this->Permiso_model->buscaidciud($dni);
        $this->load->model('Permiso_model');
        $data['resultsolicitante'] = $this->Permiso_model->combopermiso();
        $this->load->model('Permiso_model');
        $data['resultacta'] = $this->Permiso_model->comboacta();
        $this->load->model('Permiso_model');
        $data['resultsepultada'] = $this->Permiso_model->combosepultada();
        $this->load->view('admin/haad');
        $this->load->view('admin/navadmin');
        $this->load->view('admin/reaperturas/bannerTumbas');
        $this->load->view('admin/reaperturas/seccionSuperior');
        $this->load->view('admin/reaperturas/lateralTumbas');
        $this->load->view('modifica_permiso',$data);
        $this->load->view('admin/footerAdmin');   
    }

    public function cambiospermiso()
    {
        $dni=$this->input->post('idpermiso');
        $idciu=$this->input->post('idciudadano');
        $telc=$this->input->post('telefono');
        $fexpide=$this->input->post('fecha_expide');
        $fsepul=$this->input->post('fecha_sepultura');
        $idact=$this->input->post('idacta');
        $obra=$this->input->post('obra_autorizada');
        $idtum=$this->input->post('idtumba');
        
        
        $this->load->model('Permiso_model');
        $resultado=$this->Permiso_model->actualizapermiso($dni,$idciu,$telc,$fexpide,$fsepul,$idact,$obra,$idtum);

        if($resultado==true){
            print '<script language="JavaScript">';
            print 'alert("Registro modificado");';
            print '</script>';
            $this->load->view('admin/haad');
            $this->load->view('admin/navadmin');
            $this->load->view('admin/reaperturas/bannerTumbas');
            $this->load->view('admin/reaperturas/seccionSuperior');
            $this->load->view('admin/reaperturas/modificalateral');
            $this->load->view('detalle_permisomodifica');
            $this->load->view('admin/footerAdmin');
        }

    }
}