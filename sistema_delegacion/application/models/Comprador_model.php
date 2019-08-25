<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comprador_model extends CI_Model
{
	public function guardar($nombrec,$segundon,$apellidopatc,$apellidomatc,$callec,$numintc,$numextc,$cpc,$coloniac)
	{
		$data = array(
		'nombre_comprador' => $nombrec,
		'segundo_nombrecomprador' => $segundon,
		'apellidopat_comprador' => $apellidopatc,
		'apellidomat_comprador' => $apellidomatc,
		'calle_comprador' => $callec,
		'numint_comprador' => $numintc,
		'numext_comprador' => $numextc,
		'cp_comprador' => $cpc,
		'colonia_comprador' => $coloniac
		);

		$consulta = $this->db->insert('comprador',$data) OR DIE ('ERROR DE CONSULTA');
		return $consulta;
	}

	public function duplicadocomprador($nombrec,$segundon,$apellidopatc,$apellidomatc){

		$this->db->where('nombre_comprador',$nombrec);
		$this->db->where('segundo_nombrecomprador',$segundon);
		$this->db->where('apellidopat_comprador',$apellidopatc);
		$this->db->where('apellidomat_comprador',$apellidomatc);
		$result = $this->db->get('comprador');
		if($result->num_rows() > 0)
		{
			return $result->row();
		}else
		{
		return null;
		}
	}
}	