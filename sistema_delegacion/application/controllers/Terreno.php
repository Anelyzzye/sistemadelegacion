<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Terreno extends CI_Controller 
{
	/**
	 * Vista del formulario terreno
	 * @return type
	 */
	public function index()
	{
		$this->load->view('admin/haad');
		$this->load->view('admin/navadmin');
		$this->load->view('admin/bannerCrud');
		$this->load->view('admin/seccionMenu');
		$this->load->view('admin/lateralMenu');
		$this->load->view('altaTerreno');
		$this->load->view('admin/footerAdmin');
	}
	
	public function vistaTerreno()
	{
		$this->load->view('admin/haad');
		$this->load->view('admin/navadmin');
		$this->load->view('admin/bannerCrud');
		$this->load->view('admin/seccionMenu');
		$this->load->view('admin/lateral_menuModifica');
		$this->load->view('editaTerreno');
		$this->load->view('admin/footerAdmin');
	}
		public function detalle()
	{
		$this->load->View('admin/haad');
		$this->load->View('admin/navadmin');
		$this->load->View('admin/bannerCrud');
		$this->load->view('admin/seccionMenu');
		$this->load->View('detalle_Terreno');
		$this->load->View('admin/footerAdmin');
	}

		public function seleccioncriterio()
		{
			$criterio=$this->input->post('criterio');
			$this->load->model('Terreno_model');
			$data['resultadoterreno']=$this->Terreno_model->buscaterreno($criterio);
			$data['criterio']=$criterio;
			$this->load->View('admin/haad');
			$this->load->View('admin/navadmin');
			$this->load->View('admin/bannerCrud');
			$this->load->view('admin/seccionMenu');
			$this->load->View('consultaterreno',$data);
			$this->load->View('admin/footerAdmin');
		}
		/**
		 * Registro de un terreno
		 * @return void
		 */
	public function registraterreno()
	{
		$super = $this->input->post('superficie');
		$callet = $this->input->post('calle_terreno');
		$numext = $this->input->post('numext_terreno');
		$numint = $this->input->post('numint_terreno');
		$cpter = $this->input->post('cp_terreno');
		$coloniat = $this->input->post('colonia_terreno');
		$nortem = $this->input->post('norte_medida');
		$nortc = $this->input->post('norte_colinda');
		$surm = $this->input->post('sur_medida');
		$surc = $this->input->post('sur_colinda');
		$orientem = $this->input->post('oriente_medida');
		$orientec = $this->input->post('oriente_colinda');
		$ponientem = $this->input->post('poniente_medida');
		$ponientec = $this->input->post('poniente_colinda');

		


		$this->form_validation->set_rules('superficie','Superficie','required');
		$this->form_validation->set_rules('calle_terreno','Direccion principal','required');
		$this->form_validation->set_rules('numext_terreno','Numero interior','required');
		$this->form_validation->set_rules('cp_terreno','Codigo postal','required');
		$this->form_validation->set_rules('colonia_terreno','Colonia','required');
		$this->form_validation->set_rules('norte_medida','Medida al norte','required');
		$this->form_validation->set_rules('norte_colinda','colinda al norte','required');
		$this->form_validation->set_rules('sur_medida','Medida al sur','required');
		$this->form_validation->set_rules('sur_colinda','Colinda al sur','required');
		$this->form_validation->set_rules('oriente_medida','Medida al Oriente','required');
		$this->form_validation->set_rules('oriente_colinda','colinda al Oriente','required');
		

		
		if ($this->form_validation->run()==FALSE) {

			$this->load->view('admin/haad');
			$this->load->view('admin/navadmin');
			$this->load->view('admin/bannerCrud');
			$this->load->view('admin/seccionMenu');
			$this->load->view('admin/lateralMenu');
			$this->load->view('altaTerreno');
			$this->load->view('admin/footerAdmin');
			
		}else{
			$this->load->model('Terreno_model');
			$res = $this->Terreno_model->duplicadoterreno($super,$callet,$numext,$numint,$cpter,$coloniat);
			if ($res != null) {

				print '<script language="JavaScript">';
                print 'alert("Registro duplicado");';
                print '</script>';
				$this->load->view('admin/haad');
				$this->load->view('admin/navadmin');
				$this->load->view('admin/bannerCrud');
				$this->load->view('admin/seccionMenu');
				$this->load->view('admin/lateralMenu');
				$this->load->view('altaTerreno');
				$this->load->view('admin/footerAdmin');
				
			}else{
				$this->load->model('Terreno_model');
				$datot = $this->Terreno_model->guardarterreno($super,$callet,$numext,$numint,$cpter,$coloniat,$nortem,$nortc,$surm,$surc,$orientem,$orientec,$ponientem,$ponientec);
				if ($datot == true) {
							print '<script language="JavaScript">';
                			print 'alert("Registro exitosamente guardado");';
                			print '</script>';
               				$this->load->view('admin/haad');
							$this->load->view('admin/navadmin');
							$this->load->view('admin/bannerCrud');
							$this->load->view('admin/seccionMenu');
							$this->load->view('admin/lateralMenu');
							$this->load->view('altaTerreno');
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
		$this->load->view('detalle_terrenomodifica');
		$this->load->view('admin/footerAdmin');
	}
	/**
	 * Funcion busqueda por criterio
	 * @return string
	 */
	public function deconsultaterreno()
    {
        $criterio = $this->input->get('criterio');
        $this->load->model('Tumba_model');
        $data['resultadomod']=$this->Tumba_model->buscamodificatumba($criterio);
        $data['criterio']=$criterio;
        $this->load->view('admin/haad');
		$this->load->view('admin/navadmin');
		$this->load->view('admin/bannerCrud');
		$this->load->view('admin/seccionMenu');
		$this->load->view('consulta_terrenomodifica',$data);
		$this->load->view('admin/footerAdmin');
	}	
	/**
	 * Modifica registro terreno
	 * @param type $dni 
	 * @return type
	 */

	   public function modificaterreno($dni)
    {
        $this->load->model('Terreno_model');
        $data['resultadomod'] = $this->Terreno_model->buscaid($dni);
        $this->load->view('admin/haad');
		$this->load->view('admin/navadmin');
		$this->load->view('admin/bannerCrud');
		$this->load->view('admin/seccionMenu');
		$this->load->view('admin/lateral_MenuModifica');
		$this->load->view('modifica_terreno',$data);
		$this->load->view('admin/footerAdmin');
	}	

	public function cambiosterreno()
	{
		 $dni=$this->input->post('idtumba');
		 $super=$this->input->post('superficie');
		 $calle=$this->input->post('calle_terreno');
		 $next=$this->input->post('numext_terreno');
		 $nixt=$this->input->post('numint_terreno');
		 $cp=$this->input->post('cp_terreno');
		 $col=$this->input->post('colonia_terreno');
		 $ntm=$this->input->post('norte_medida');
		 $ntc=$this->input->post('norte_colinda');
		 $srm=$this->input->post('sur_medida');
		 $src=$this->input->post('sur_colinda');
		 $ortm=$this->input->post('oriente_medida');
		 $ortc=$this->input->post('oriente_colinda');
		 $ptm=$this->input->post('poniente_medida');
		 $ptc=$this->input->post('poniente_colinda');
		 
		 

        $this->load->model('Terreno_model');
        $resultado=$this->Terreno_model->actualizaterreno($dni,$super,$calle,$next,$nixt,$cp,$col,$ntm,$ntc,$srm,$src,$ortm,$ortc,$ptm,$ptc);

        if($resultado==true){
            print '<script language="JavaScript">';
            print 'alert("Registro modificado");';
            print '</script>';
            $this->load->view('admin/haad');
		$this->load->view('admin/navadmin');
		$this->load->view('admin/bannerCrud');
		$this->load->view('admin/seccionMenu');
		$this->load->view('admin/lateral_MenuModifica');
		$this->load->view('detalle_terrenomodifica');
		$this->load->view('admin/footerAdmin');
	}
	}




}