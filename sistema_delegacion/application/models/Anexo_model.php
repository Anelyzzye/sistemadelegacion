<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anexo_model extends CI_Model
{
	public function guardaranexo($doca)
	{
		$data = array(
			'documento_anexo' => $doca
		);	
		$consulta = $this->db->insert('anexo',$data) OR DIE ('ERROR DE CONSULTA');
		return $consulta;
	}
	public function duplicadoanexo($doca)
	{
		$this->db->where('documento_anexo',$doca);
		$result = $this->db->get('anexo');
		if ($result->num_rows()>0) {
			return $result->row();
		}else{
			return null;
		}
	}

	public function buscamodifica($criterio)
	{
		$sql = "SELECT idanexo AS elid,
	documento_anexo AS doc
	FROM anexo 
	WHERE documento_anexo LIKE '$criterio%'";
	$consulta=$this->db->query($sql);
	return $consulta->result();
	}

	public function buscaid($dni)
	{
		$sql = "SELECT idanexo AS elid,
	documento_anexo AS doc
	FROM anexo 
	WHERE idanexo LIKE '$dni'";
	$consulta=$this->db->query($sql);
	return $consulta->result();
	}

	public function actualizanexo($dni,$docax)
	{
		$sql="UPDATE anexo SET documento_anexo = '$docax'
				WHERE idanexo = $dni";
		$consulta=$this->db->query($sql);
		return $consulta;			
	}
}