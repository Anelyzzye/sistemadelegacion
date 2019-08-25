<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solicitante_model extends CI_Model
{
	public function guardarsolicitante($nomsol,$nomseg,$apellps,$apellims,$calles,$nis,$nes,$cps,$tels)
	{
		$data = array(
			'nombre_solicitante' => $nomsol,
			'nombre_segundo' => $nomseg,
			'apellidopat_solicitante' => $apellps,
			'apellidomat_solicitante' => $apellims,
			'calle_solicitante' => $calles,
			'numint_solicitante' => $nis,
			'numext_solicitante' => $nes,
			'cp_solicitante' => $cps,
			'telefono_solicitante' => $tels
		);	
		$consulta = $this->db->insert('solicitante',$data) OR DIE ('ERROR DE CONSULTA');
		return $consulta;
	}
	public function duplicadosolicitante($nomsol,$nomseg,$apellps,$apellims)
	{
		$this->db->where('nombre_solicitante',$nomsol);
		$this->db->where('nombre_segundo',$nomseg);
		$this->db->where('apellidopat_solicitante',$apellps);
		$this->db->where('apellidomat_solicitante',$apellims);

		$result = $this->db->get('solicitante');
		if ($result->num_rows()>0) {
			return $result->row();
		}else{
			return null;
		}
	}
}