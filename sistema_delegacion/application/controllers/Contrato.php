<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contrato extends CI_Controller 
{
	public function index()
	{	
		$this->load->model('Contrato_model');
		$data['resultcomprador']=$this->Contrato_model->combocomprador();
		$this->load->model('Contrato_model');
		$data['resultvendedor'] = $this->Contrato_model->combovendedor();
		$this->load->model('Contrato_model');
		$data['resulterreno'] = $this->Contrato_model->comboterreno();
		$this->load->model('Contrato_model');
		$data['resulttestigo'] = $this->Contrato_model->combotescomprador();
		$this->load->model('Contrato_model');
		$data['resulttesdos'] = $this->Contrato_model->combotesvendedor();
		$this->load->model('Contrato_model');
		$data['resultanexo'] = $this->Contrato_model->comboanexo();
		$this->load->view('admin/haad');
		$this->load->view('admin/navadmin');
		$this->load->view('admin/bannerCrud');
		$this->load->view('admin/seccionMenu');
		$this->load->view('admin/lateralMenu');
		$this->load->view('altaContrato',$data);
		$this->load->view('admin/footerAdmin');
	}

	public function vistaContrato()
	{
		$this->load->view('admin/haad');
		$this->load->view('admin/navadmin');
		$this->load->view('admin/bannerCrud');
		$this->load->view('admin/seccionMenu');
		$this->load->view('admin/lateral_menuModifica');
		$this->load->view('editaContrato');
		$this->load->view('admin/footerAdmin');
	}
	/**
	 * Registro de contartro
	 * @return type void 
	 */
	public function registrocontrato()
	{
		$iddc = $this->input->post('idciudadano');
		$idvende = $this->input->post('idvendedor');
		$datec = $this->input->post('fecha_contrato');
		$iddt = $this->input->post('idterreno');
		$cantp = $this->input->post('cantidad_precio'); 
		$cantv = $this->input->post('cantidad_letra');
		$testc = $this->input->post('testigocompra');
		$testv = $this->input->post('testigovende');
		$idda = $this->input->post('idanexo');
		
		
		$this->form_validation->set_rules('idciudadano','Comprador','required');
		$this->form_validation->set_rules('idvendedor','Vendedor','required');
		$this->form_validation->set_rules('fecha_contrato','Fecha del contrato','required');
		$this->form_validation->set_rules('idterreno','Direccion del terreno','required');
		$this->form_validation->set_rules('cantidad_precio','Precio','required');
		$this->form_validation->set_rules('cantidad_letra','Cantidad en letra','required');
		$this->form_validation->set_rules('testigocompra','Testigo comprador','required');
		$this->form_validation->set_rules('testigovende','Testigo Vendedor','required');
		$this->form_validation->set_rules('idanexo','Anexo','required');


		
		if ($this->form_validation->run()==FALSE) {

			$this->load->model('Contrato_model');
		$data['resultcomprador']=$this->Contrato_model->combocomprador();
		$this->load->model('Contrato_model');
		$data['resultvendedor'] = $this->Contrato_model->combovendedor();
		$this->load->model('Contrato_model');
		$data['resulterreno'] = $this->Contrato_model->comboterreno();
		$this->load->model('Contrato_model');
		$data['resulttestigo'] = $this->Contrato_model->combotescomprador();
		$this->load->model('Contrato_model');
		$data['resulttesdos'] = $this->Contrato_model->combotesvendedor();
		$this->load->model('Contrato_model');
		$data['resultanexo'] = $this->Contrato_model->comboanexo();
		$this->load->view('admin/haad');
		$this->load->view('admin/navadmin');
		$this->load->view('admin/bannerCrud');
		$this->load->view('admin/seccionMenu');
		$this->load->view('admin/lateralMenu');
		$this->load->view('altaContrato',$data);
		$this->load->view('admin/footerAdmin');
			
		}else{
			$this->load->model('Contrato_model');
			$res = $this->Contrato_model->duplicadocontrato($idvende,$iddt);
			if ($res != null) {
				$this->load->model('Contrato_model');
		$data['resultcomprador']=$this->Contrato_model->combocomprador();
		$this->load->model('Contrato_model');
		$data['resultvendedor'] = $this->Contrato_model->combovendedor();
		$this->load->model('Contrato_model');
		$data['resulterreno'] = $this->Contrato_model->comboterreno();
		$this->load->model('Contrato_model');
		$data['resulttestigo'] = $this->Contrato_model->combotescomprador();
		$this->load->model('Contrato_model');
		$data['resulttesdos'] = $this->Contrato_model->combotesvendedor();
		$this->load->model('Contrato_model');
		$data['resultanexo'] = $this->Contrato_model->comboanexo();
				print '<script language="JavaScript">';
                print 'alert("Registro duplicado");';
                print '</script>';
				$this->load->view('admin/haad');
		$this->load->view('admin/navadmin');
		$this->load->view('admin/bannerCrud');
		$this->load->view('admin/seccionMenu');
		$this->load->view('admin/lateralMenu');
		$this->load->view('altaContrato',$data);
		$this->load->view('admin/footerAdmin');
				
			}else{
				$this->load->model('Contrato_model');
				$datot = $this->Contrato_model->guardarcontrato($iddc,$idvende,$datec,$iddt,$cantp,$cantv,$testc,$testv,$idda);
				if ($datot == true) {
						$this->load->model('Contrato_model');
		$data['resultcomprador']=$this->Contrato_model->combocomprador();
		$this->load->model('Contrato_model');
		$data['resultvendedor'] = $this->Contrato_model->combovendedor();
		$this->load->model('Contrato_model');
		$data['resulterreno'] = $this->Contrato_model->comboterreno();
		$this->load->model('Contrato_model');
		$data['resulttestigo'] = $this->Contrato_model->combotescomprador();
		$this->load->model('Contrato_model');
		$data['resulttesdos'] = $this->Contrato_model->combotesvendedor();
		$this->load->model('Contrato_model');
		$data['resultanexo'] = $this->Contrato_model->comboanexo();
						print '<script language="JavaScript">';
                		print 'alert("Registro guardado");';
                		print '</script>';
						$this->load->view('admin/haad');
		$this->load->view('admin/navadmin');
		$this->load->view('admin/bannerCrud');
		$this->load->view('admin/seccionMenu');
		$this->load->view('admin/lateralMenu');
		$this->load->view('altaContrato',$data);
		$this->load->view('admin/footerAdmin');
					
				}//fin del true condicional

			}//Segundoelse

		}//else principal
	}

	public function detallemodifica()
	{
		$this->load->view('admin/haad');
		$this->load->view('admin/navadmin');
		$this->load->view('admin/bannerCrud');
		$this->load->view('admin/seccionMenu');
		$this->load->view('admin/lateral_MenuModifica');
		$this->load->view('detalle_contratomodifica');
		$this->load->view('admin/footerAdmin');
	}

	public function deconsultacontrato()
    {
        $criterio = $this->input->get('criterio');
        $this->load->model('Contrato_model');
        $data['resultmod']=$this->Contrato_model->buscamodificacontrato($criterio);
        $data['criterio']=$criterio;
        $this->load->view('admin/haad');
		$this->load->view('admin/navadmin');
		$this->load->view('admin/bannerCrud');
		$this->load->view('admin/seccionMenu');
		$this->load->view('consulta_contratomodifica',$data);
		$this->load->view('admin/footerAdmin');
	}

 /**
  * Description
  * @param int $dni 
  * @return string
  */
	 public function modificacontrato($dni)
    {
        $this->load->model('Contrato_model');
        $data['resultmod'] = $this->Contrato_model->buscaid($dni);
        $this->load->view('admin/haad');
		$this->load->view('admin/navadmin');
		$this->load->view('admin/bannerCrud');
		$this->load->view('admin/seccionMenu');
		$this->load->view('admin/lateral_MenuModifica');
		$this->load->view('modifica_contrato',$data);
		$this->load->view('admin/footerAdmin');
	}

	public function cambioscontrato()
	{
		 $dni=$this->input->post('idcontrato');
		 $idciuu=$this->input->post('idciudadano');
		 $idvv=$this->input->post('idvendedor');
		 $fechh=$this->input->post('fecha_contrato');
		 $idte=$this->input->post('idterreno');
		 $cantp=$this->input->post('cantidad_precio');
		 $cantl=$this->input->post('cantidad_letra');
		 $testc=$this->input->post('testigocompra');
		 $testv=$this->input->post('testigovende');
		 $idnx=$this->input->post('idanexo');

		 $this->load->model('Contrato_model');
        $resultado=$this->Contrato_model->actualizacontrato($dni,$idciuu,$idvv,$fechh,$idte,$cantp,$cantl,$testc,$testv,$idnx);

        if($resultado==true){
            print '<script language="JavaScript">';
            print 'alert("Registro modificado");';
            print '</script>';
            $this->load->view('admin/haad');
		$this->load->view('admin/navadmin');
		$this->load->view('admin/bannerCrud');
		$this->load->view('admin/seccionMenu');
		$this->load->view('admin/lateral_MenuModifica');
		$this->load->view('detalle_contratomodifica');
		$this->load->view('admin/footerAdmin');
	}
}

}