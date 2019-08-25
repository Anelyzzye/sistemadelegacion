<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendedor_model extends CI_Model
{
	public function guardarvendedor($nomv,$segnom,$apellipv,$apellimv,$callev,$numintv,$numextv,$cpv,$coloniav)
	{
		$data = array(
			'nombre_vendedor' => $nomv,
			'segundo_nombrevendedor' => $segnom,
			'apellidopat_vendedor' => $apellipv,
			'apellidomat_vendedor' => $apellimv,
			'calle_vendedor' => $callev,
			'numint_vendedor' => $numintv,
			'numext_vendedor' => $numextv,
			'cp_vendedor' => $cpv,
			'colonia_vendedor' => $coloniav
		);	
		$consulta = $this->db->insert('vendedor',$data) OR DIE ('ERROR DE CONSULTA');
		return $consulta;
	}
	public function duplicadovendedor($nomv,$segnom,$apellipv,$apellimv)
	{
		$this->db->where('nombre_vendedor',$nomv);
		$this->db->where('segundo_nombrevendedor',$segnom);
		$this->db->where('apellidopat_vendedor',$apellipv);
		$this->db->where('apellidomat_vendedor',$apellimv);
		$result = $this->db->get('vendedor');
		if ($result->num_rows()>0) {
			return $result->row();
		}else{
			return null;
		}
	}
}	