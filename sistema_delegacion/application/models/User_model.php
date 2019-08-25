<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{	
	public function combodelegado()
	{
		$sql ="SELECT ciudadano.idciudadano AS idciud, CONCAT(ciudadano.nombre_ciudadano,' ',
				   ciudadano.segundo_nombreciudadano,' ',
				  ciudadano.apellidopat_ciudadano,' ',
				  ciudadano.apellidomat_ciudadano) AS Ciudadano
				  FROM tipo_ciudadano
				  JOIN ciudadano ON ciudadano
				  .idtipo_ciudadano = tipo_ciudadano.`idtipo_ciudadano`
				  WHERE tipo_ciudadano.`idtipo_ciudadano` = 202";
		$consulta = $this->db->query($sql);

		return $consulta->result();
	}
	public function combofuncion(){
		$consulta = $this->db->get('funcion');
		return $consulta->result();
	}
	public function guardaruser($cdelega,$userdelega,$passdelega,$funciondelega)
	{
		$data = array(
			'idciudadano' => $cdelega,
			'username' => $userdelega,
			'pass_usuario' => $passdelega,
			'idfuncion' => $funciondelega

		);	
		$consulta = $this->db->insert('usuario',$data);
		return $consulta;
	}
	public function duplicadouser($cdelega)
	{
		$this->db->where('idciudadano',$cdelega);
		$result = $this->db->get('usuario');
		if ($result->num_rows()>0) {
			return $result->row();
		}else{
			return null;
		}
	}

	public function consultusuario($criterio)
	{
	$sql= "SELECT 	us.idusuario AS iduser,
	cd.idciudadano AS dnic,
	cd.`nombre_ciudadano` AS nomcid,
	cd.`segundo_nombreciudadano` AS segundo,
	cd.apellidopat_ciudadano AS patciud,
	cd.apellidomat_ciudadano AS matciud,
	us.username AS usr,
	us.`pass_usuario` AS pass,
	fn.idfuncion AS idfunc,
	fn.nombre_funcion AS namefun
	FROM usuario AS us
	JOIN ciudadano AS cd ON cd.idciudadano = us.`idciudadano`
	JOIN funcion AS fn ON us.idfuncion = fn.idfuncion
	WHERE cd.`nombre_ciudadano` LIKE '$criterio%'";
	$consulta=$this->db->query($sql);
	return $consulta->result();
	}

	public function buscaidciudUser($dni)
	{
		$sql= "SELECT 	us.idusuario AS iduser,
	cd.idciudadano AS dnic,
	cd.`nombre_ciudadano` AS nomcid,
	cd.`segundo_nombreciudadano` AS segundo,
	cd.apellidopat_ciudadano AS patciud,
	cd.apellidomat_ciudadano AS matciud,
	us.username AS usr,
	us.`pass_usuario` AS pass,
	fn.idfuncion AS idfunc,
	fn.nombre_funcion AS namefun
	FROM usuario AS us
	JOIN ciudadano AS cd ON cd.idciudadano = us.`idciudadano`
	JOIN funcion AS fn ON us.idfuncion = fn.idfuncion
	WHERE us.`idusuario` LIKE '$dni'";
	$consulta=$this->db->query($sql);
	return $consulta->result();
		
	}
	public function usermodifica($dni,$idciud,$usern,$pass,$idfun)
	{
		$sql="UPDATE usuario SET idciudadano= $idciud,
					username='$usern',
					pass_usuario='$pass',
					idfuncion=$idfun
					WHERE idusuario = $dni";
		$consulta=$this->db->query($sql);
		return $consulta;			

	}
}