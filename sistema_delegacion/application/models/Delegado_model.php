<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delegado_model extends CI_Model
{	
	public function combopuesto()
	{
		$consulta = $this->db->get('puesto');
		return $consulta->result();
	}
	public function guardardelegado($nd,$snd,$apd,$amd,$ip)
	{
		$data = array(
			'nombre_delegado' => $nd,
			'segundonombre_delegado' => $snd,
			'apellidopat_delegado' => $apd,
			'apellidomat_delegado' => $amd,
			'idpuesto' => $ip
		);	
		$consulta = $this->db->insert('delegado',$data) OR DIE ('ERROR DE CONSULTA');
		return $consulta;
	}
	public function duplicadodelegado($nd,$snd,$apd,$amd)
	{
		$this->db->where('nombre_delegado',$nd);
		$this->db->where('segundonombre_delegado',$snd);
		$this->db->where('apellidopat_delegado',$apd);
		$this->db->where('apellidomat_delegado',$amd);
	

		$result = $this->db->get('delegado');
		if ($result->num_rows()>0) {
			return $result->row();
		}else{
			return null;
		}
	}
}