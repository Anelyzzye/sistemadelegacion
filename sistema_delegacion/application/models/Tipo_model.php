<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipo_model extends CI_Model
{
	public function guardartipo($torden,$desc)
	{
		$data = array(
			'tipo_orden' => $torden,
			'descripcion' => $desc
		);	
		$consulta = $this->db->insert('tipo',$data) OR DIE ('ERROR DE CONSULTA');
		return $consulta;
	}
	public function duplicadotipo($torden)
	{
		$this->db->where('tipo_orden',$torden);
	

		$result = $this->db->get('tipo');
		if ($result->num_rows()>0) {
			return $result->row();
		}else{
			return null;
		}
	}
}