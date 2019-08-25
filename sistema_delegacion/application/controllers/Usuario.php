<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {
    
    public function index()
    {   
        $this->load->model('User_model');
        $data['resultdelega'] = $this->User_model->combodelegado();
        $this->load->model('User_model');
        $data['resultfuncion'] = $this->User_model->combofuncion();
        $this->load->view('admin/haad');
        $this->load->view('admin/navadmin');
        $this->load->view('admin/user/bannerUser');
        $this->load->view('admin/user/seccionUser');
        $this->load->view('admin/user/lateralUser');
        $this->load->view('altaUser',$data);
        $this->load->view('admin/footerAdmin');
    }
    public function registrauser(){
        $cdelega = $this->input->post('idciudadano');
        $userdelega = $this->input->post('username');
        $passdelega = $this->input->post('pass_usuario');
        $funciondelega = $this->input->post('idfuncion');

        $this->form_validation->set_rules('idciudadano','Delegado','required');
        $this->form_validation->set_rules('username','Usuario','required');
        $this->form_validation->set_rules('pass_usuario','Contraseña','required');
        $this->form_validation->set_rules('idfuncion','Funcion','required');

        if ($this->form_validation->run()==FALSE) {

        $this->load->model('User_model');
        $data['resultdelega'] = $this->User_model->combodelegado();
        $this->load->model('User_model');
        $data['resultfuncion'] = $this->User_model->combofuncion();
        $this->load->view('admin/haad');
        $this->load->view('admin/navadmin');
        $this->load->view('admin/user/bannerUser');
        $this->load->view('admin/user/seccionUser');
        $this->load->view('admin/user/lateralUser');
        $this->load->view('altaUser',$data);
        $this->load->view('admin/footerAdmin');
        }else{
            $this->load->model('User_model');
            $res = $this->User_model->duplicadouser($cdelega);
            if ($res != null) {

                $this->load->model('User_model');
                $data['resultdelega'] = $this->User_model->combodelegado();
                $this->load->model('User_model');
                $data['resultfuncion'] = $this->User_model->combofuncion();
                print '<script language="JavaScript">';
                print 'alert("Registro duplicado");';
                print '</script>';
                $this->load->view('admin/haad');
                $this->load->view('admin/navadmin');
                $this->load->view('admin/user/bannerUser');
                $this->load->view('admin/user/seccionUser');
                $this->load->view('admin/user/lateralUser');
                $this->load->view('altaUser',$data);
                $this->load->view('admin/footerAdmin');
                
            }else{
                $this->load->model('User_model');
                $datot = $this->User_model->guardaruser($cdelega,$userdelega,$passdelega,$funciondelega);
                if ($datot == true) {
                        $this->load->model('User_model');
                        $data['resultdelega'] = $this->User_model->combodelegado();
                        $this->load->model('User_model');
                        $data['resultfuncion'] = $this->User_model->combofuncion();
                        print '<script language="JavaScript">';
                        print 'alert("Registro guardado");';
                        print '</script>';
                        $this->load->view('admin/haad');
                        $this->load->view('admin/navadmin');
                        $this->load->view('admin/user/bannerUser');
                        $this->load->view('admin/user/seccionUser');
                        $this->load->view('admin/user/lateralUser');
                        $this->load->view('altaUser',$data);
                        $this->load->view('admin/footerAdmin');
                    
                }//fin del true condicional

            }//Segundoelse

        }//else principal
    }

    public function detalle()
    { 
        $this->load->view('admin/haad');
        $this->load->view('admin/navadmin');
        $this->load->view('admin/user/bannerUser');
        $this->load->view('admin/user/seccionUser');
        $this->load->view('admin/user/modificauser');
        $this->load->view('detalle_usuario');
        $this->load->view('admin/footerAdmin');
    }
    public function consultausuarios()
    {
        $criterio = $this->input->get('criterio');
        $this->load->model('User_model');
        $data['resultuser']=$this->User_model->consultusuario($criterio);
        $data['criterio']=$criterio;
        $this->load->view('admin/haad');
        $this->load->view('admin/navadmin');
        $this->load->view('admin/user/bannerUser');
        $this->load->view('admin/user/seccionUser');
     
        $this->load->view('criteriosusuario',$data);
        $this->load->view('admin/footerAdmin');
    }
    public function modificauser($dni)
    {
        $this->load->model('User_model');
        $data['resultuser'] = $this->User_model->buscaidciudUser($dni);
        $this->load->model('User_model');
        $data['resultdelega'] = $this->User_model->combodelegado();
        $this->load->model('User_model');
        $data['resultfuncion'] = $this->User_model->combofuncion();
        $this->load->view('admin/haad');
        $this->load->view('admin/navadmin');
        $this->load->view('admin/user/bannerUser');
        $this->load->view('admin/user/seccionUser');
        $this->load->view('admin/user/lateralUser');
        $this->load->view('modificausuario',$data);
        $this->load->view('admin/footerAdmin');
    }

    public function cambiousuario()
    {
        $dni=$this->input->post('idusuario');
        $idciud=$this->input->post('idciudadano');
        $usern=$this->input->post('username');
        $pass=$this->input->post('pass_usuario');
        $idfun=$this->input->post('idfuncion');

        $this->load->model('User_model');
        $resultado=$this->User_model->usermodifica($dni,$idciud,$usern,$pass,$idfun);

        if($resultado==true){
            print '<script language="JavaScript">';
            print 'alert("Registro modificado");';
            print '</script>';
             $this->load->view('admin/haad');
        $this->load->view('admin/navadmin');
        $this->load->view('admin/user/bannerUser');
        $this->load->view('admin/user/seccionUser');
        $this->load->view('admin/user/lateralUser');
        $this->load->view('detalle_usuario');
        $this->load->view('admin/footerAdmin');

        }
    }
}