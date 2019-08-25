<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HistorialContrato_model extends CI_Model
{
	public function combocontrato()
	{
		$this->db->select('c.idcontrato,c.nombre_comprador, c.segundo_nombrecomprador, c.apellidopat_comprador,c.apellidomat_comprador');
		$this->db->from('comprador a'); 
		$this->db->join('contrato c', 'a.idcomprador = c.idcomprador');
		$aResult = $this->db->get();

    if(!$aResult->num_rows() == 1)
    {
        return false;
    }

    return $aResult->result_array();
	}

	public function comboterreno()
	{
		$consulta = $this->db->get('terreno') OR DIE("ERROR DE CONSULTA");
		return $consulta->result();
	}
	
	public function comboanexo()
	{
		$consulta = $this->db->get('anexo') OR DIE("ERROR DE CONSULTA");
		return $consulta->result();
	}

	public function registrohistorial($ic,$nitrr,$idx)
	{
		$data = array(
			'idcontrato' => $ic,
			'idterreno' => $nitrr,
			'idanexo' => $idx
		);	
		$consulta = $this->db->insert('terreno_historial_contrato',$data) OR DIE ('ERROR DE CONSULTA');
		return $consulta;
	}
	public function duplicadocontrato($ic,$nitrr,$idx)
	{
		$this->db->where('idcontrato',$ic);
		$this->db->where('idterreno',$nitrr);
		$this->db->where('idanexo',$idx);

		$result = $this->db->get('terreno_historial_contrato');
		if ($result->num_rows()>0) {
			return $result->row();
		}else{
			return null;
		}
	}
	public function buscacontrato($criterio)
	{
		$sql = "SELECT CONCAT(ciud.nombre_ciudadano,'' ,ciud.segundo_nombreciudadano,' ',ciud.`apellidopat_ciudadano`,' ',ciud.`apellidomat_ciudadano`) AS comprador,
		CONCAT(ciuda.nombre_ciudadano,' ',ciuda.`segundo_nombreciudadano`,' ',ciuda.`apellidopat_ciudadano`,' ',ciuda.`apellidomat_ciudadano`) AS vendedor, 
		DATE_FORMAT(fecha_contrato,'%d-%m-%Y') AS fecha, 
		CONCAT(terre.calle_terreno, ' ' ,terre.numext_terreno, ' ', terre.numint_terreno, ' ',terre.`colonia_terreno`) AS principal, contrato.cantidad_precio AS precio
		FROM contrato AS contrato
		JOIN ciudadano AS ciud ON ciud.`idciudadano` = contrato.`idciudadano` 
		JOIN ciudadano AS ciuda ON ciuda.`idciudadano` = contrato.`idvendedor`
		JOIN terreno AS terre ON terre.`idterreno` = contrato.`idterreno`
		WHERE ciud.nombre_ciudadano LIKE '$criterio%' OR ciuda.nombre_ciudadano LIKE '$criterio%'";
		$consulta=$this->db->query($sql);
		return $consulta->result();
	}
	public function buscafecha($criterio)
	{
		$sql = "SELECT CONCAT(ciud.nombre_ciudadano,'' ,ciud.segundo_nombreciudadano,' ',ciud.`apellidopat_ciudadano`,' ',ciud.`apellidomat_ciudadano`) AS comprador,
		CONCAT(ciuda.nombre_ciudadano,' ',ciuda.`segundo_nombreciudadano`,' ',ciuda.`apellidopat_ciudadano`,' ',ciuda.`apellidomat_ciudadano`) AS vendedor, 
		DATE_FORMAT(fecha_contrato,'%d-%m-%Y') AS fecha, 
		CONCAT(terre.calle_terreno, ' ' ,terre.numext_terreno, ' ', terre.numint_terreno, ' ',terre.`colonia_terreno`) AS principal, contrato.cantidad_precio AS precio
		FROM contrato AS contrato
		JOIN ciudadano AS ciud ON ciud.`idciudadano` = contrato.`idciudadano` 
		JOIN ciudadano AS ciuda ON ciuda.`idciudadano` = contrato.`idvendedor`
		JOIN terreno AS terre ON terre.`idterreno` = contrato.`idterreno`
		WHERE contrato.fecha_contrato LIKE '$criterio%'";
		$consulta=$this->db->query($sql);
		return $consulta->result();
	}
}