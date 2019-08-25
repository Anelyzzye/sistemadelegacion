<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reaperturas_model extends CI_Model
{	
	public function combofinado()
	{
		$sql ="SELECT ciudadano.idciudadano AS idciud, CONCAT(ciudadano.nombre_ciudadano,' ',
				   ciudadano.segundo_nombreciudadano,' ',
				  ciudadano.apellidopat_ciudadano,' ',
				  ciudadano.apellidomat_ciudadano) AS Ciudadano
				  FROM tipo_ciudadano
				  JOIN ciudadano ON ciudadano
				  .idtipo_ciudadano = tipo_ciudadano.`idtipo_ciudadano`
				  WHERE tipo_ciudadano.`idtipo_ciudadano` = 203";
		$consulta = $this->db->query($sql);

		return $consulta->result();
	}
	public function comboorden(){
		$consulta = $this->db->get('tipo_orden');
		return $consulta->result();
	}
	public function guardaracta($cfinado,$fechare,$curp,$fechadef,$horadef,$causasmu,$foliocer,$feinhuma,$foinhuma,$torden)
	{
		$data = array(
			'idciudadano' => $cfinado,
			'fecha_registro' => $fechare,
			'curp' => $curp,
			'fecha_defun' => $fechadef,
			'hora_defun' => $horadef,
			'causas_muerte' => $causasmu,
			'folio_certificado' => $foliocer,
			'fecha_inhumacion' => $feinhuma,
			'folio_inhumacion' => $foinhuma,
			'idtipo_orden' => $torden,
		);	
		$consulta = $this->db->insert('acta_inhumacion',$data);
		return $consulta;
	}
	public function duplicadoacta($cfinado)
	{
		$this->db->where('idciudadano',$cfinado);
		$result = $this->db->get('acta_inhumacion');
		if ($result->num_rows()>0) {
			return $result->row();
		}else{
			return null;
		}
	}

	public function consultafinado($criterio)
	{
		$sql="SELECT acta.idacta AS dni,
		cn.idciudadano AS cnid,
		cn.nombre_ciudadano AS nom,
		cn.segundo_nombreciudadano AS sgciu,
		cn.apellidopat_ciudadano AS pat,
		cn.apellidomat_ciudadano AS mat,
		acta.fecha_registro AS fecha,
		acta.curp AS curp,
		acta.fecha_defun AS defun,
		acta.hora_defun AS hora,
		acta.causas_muerte AS causas,
		acta.folio_certificado AS certi,
		acta.fecha_inhumacion AS inhu,
		acta.folio_inhumacion AS finhu,
		tipo.idtipo_orden AS tporden,
		tipo.nombre_orden AS orden
			FROM acta_inhumacion AS acta
			JOIN ciudadano AS cn ON cn.idciudadano = acta.idciudadano
			JOIN tipo_orden AS tipo ON tipo.idtipo_orden = acta.idtipo_orden
			WHERE cn.nombre_ciudadano LIKE '$criterio%'";
		$consulta=$this->db->query($sql);
		return $consulta->result();
	}

	public function buscaporidacta($dni)
	{
		$sql="SELECT acta.idacta AS dni,
		cn.idciudadano AS cnid,
		cn.nombre_ciudadano AS nom,
		cn.segundo_nombreciudadano AS sgciu,
		cn.apellidopat_ciudadano AS pat,
		cn.apellidomat_ciudadano AS mat,
		acta.fecha_registro AS fecha,
		acta.curp AS curp,
		acta.fecha_defun AS defun,
		acta.hora_defun AS hora,
		acta.causas_muerte AS causas,
		acta.folio_certificado AS certi,
		acta.fecha_inhumacion AS inhu,
		acta.folio_inhumacion AS finhu,
		tipo.idtipo_orden AS tporden,
		tipo.nombre_orden AS orden
			FROM acta_inhumacion AS acta
			JOIN ciudadano AS cn ON cn.idciudadano = acta.idciudadano
			JOIN tipo_orden AS tipo ON tipo.idtipo_orden = acta.idtipo_orden
			WHERE acta.idacta LIKE $dni";
		$consulta=$this->db->query($sql);
		return $consulta->result();
	}

	public function finadomodifica($dni,$iddc,$fech,$curp,$fdefun,$hdefun,$cmuerte,$fcert,$finhu,$flinhu,$ttor)
	{
		$sql = "UPDATE acta_inhumacion SET idciudadano = $iddc,
			fecha_registro = '$fech',
			curp = '$curp',
			fecha_defun = '$fdefun',
			hora_defun = '$hdefun',
			causas_muerte = '$cmuerte',
			folio_certificado = '$fcert' , 
			fecha_inhumacion = '$finhu',
			folio_inhumacion = '$flinhu',
			idtipo_orden = $ttor 
			where idacta = $dni";
		$consulta=$this->db->query($sql);
		return $consulta;
	}

}	
