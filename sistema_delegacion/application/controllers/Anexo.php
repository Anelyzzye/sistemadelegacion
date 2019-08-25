<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anexo extends CI_Controller 
{
	public function index()
	{
		$this->load->view('admin/haad');
		$this->load->view('admin/navadmin');
		$this->load->view('admin/bannerCrud');
		$this->load->view('admin/seccionMenu');
		$this->load->view('admin/lateralMenu');
		$this->load->view('altaAnexo');
		$this->load->view('admin/footerAdmin');
	}
	public function vistaAnexo()
	{
		$this->load->view('admin/haad');
		$this->load->view('admin/navadmin');
		$this->load->view('admin/bannerCrud');
		$this->load->view('admin/seccionMenu');
		$this->load->view('admin/lateral_menuModifica');
		$this->load->view('editaAnexo');
		$this->load->view('admin/footerAdmin');
	}
	public function registranexo() 
	{
		$doca = $this->input->post('documento_anexo');
	
		$this->form_validation->set_rules('documento_anexo','Descripcion','required');
		
		
		
		if ($this->form_validation->run()==FALSE) {

			$this->load->view('admin/haad');
			$this->load->view('admin/navadmin');
			$this->load->view('admin/bannerCrud');
			$this->load->view('admin/seccionMenu');
			$this->load->view('admin/lateralMenu');
			$this->load->view('altaAnexo');
			$this->load->view('admin/footerAdmin');
			
		}else{
			$this->load->model('Anexo_model');
			$res = $this->Anexo_model->duplicadoanexo($doca);
			if ($res != null) {

				print '<script language="JavaScript">';
                print 'alert("Registro duplicado");';
                print '</script>';
				$this->load->view('admin/haad');
				$this->load->view('admin/navadmin');
				$this->load->view('admin/bannerCrud');
				$this->load->view('admin/seccionMenu');
				$this->load->view('admin/lateralMenu');
				$this->load->view('altaAnexo');
				$this->load->view('admin/footerAdmin');
				
			}else{
				$this->load->model('Anexo_model');
				$datot = $this->Anexo_model->guardaranexo($doca);
				if ($datot == true) {
							print '<script language="JavaScript">';
                			print 'alert("Registro exitosamente guardado");';
                			print '</script>';
               				$this->load->view('admin/haad');
							$this->load->view('admin/navadmin');
							$this->load->view('admin/bannerCrud');
							$this->load->view('admin/seccionMenu');
							$this->load->view('admin/lateralMenu');
							$this->load->view('altaAnexo');
							$this->load->view('admin/footerAdmin');
					
				}//fin del true condicional

			}//Segundoelse

		}//else principal
	}//Fin registro

	public function detallemodifica()
	{
		$this->load->view('admin/haad');
        $this->load->view('admin/navadmin');
        $this->load->view('admin/bannerCrud');
        $this->load->view('admin/seccionMenu');
        $this->load->view('admin/lateral_menuModifica');
        $this->load->view('detatalle_anexomodifica');
        $this->load->view('admin/footerAdmin');
	}

	public function deconsultamodanex()
    {
        $criterio = $this->input->get('criterio');
        $this->load->model('Anexo_model');
        $data['resultadomodd']=$this->Anexo_model->buscamodifica($criterio);
        $data['criterio']=$criterio;
       $this->load->view('admin/haad');
        $this->load->view('admin/navadmin');
        $this->load->view('admin/bannerCrud');
        $this->load->view('admin/seccionMenu');
        $this->load->view('admin/lateral_menuModifica');
        $this->load->view('consultanexo_modifica',$data);
        $this->load->view('admin/footerAdmin');

    }

    public function modificanexo($dni)
    {
        $this->load->model('Anexo_model');
        $data['resultadomodd'] = $this->Anexo_model->buscaid($dni);
        $this->load->view('admin/haad');
        $this->load->view('admin/navadmin');
        $this->load->view('admin/bannerCrud');
        $this->load->view('admin/seccionMenu');
        $this->load->view('admin/lateral_menuModifica');
        $this->load->view('modifica_anexo',$data);
        $this->load->view('admin/footerAdmin');
    }

    public function cambiosanexo()
    {
    	$dni=$this->input->post('idanexo');
    	$docax=$this->input->post('documento_anexo');

    	$this->load->model('Anexo_model');
        $resultado=$this->Anexo_model->actualizanexo($dni,$docax);

        if($resultado==true){
            print '<script language="JavaScript">';
            print 'alert("Registro modificado");';
            print '</script>';
        $this->load->view('admin/haad');
        $this->load->view('admin/navadmin');
        $this->load->view('admin/bannerCrud');
        $this->load->view('admin/seccionMenu');
        $this->load->view('admin/lateral_menuModifica');
        $this->load->view('detatalle_anexomodifica');
        $this->load->view('admin/footerAdmin');
        }    
    }


}