<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permiso_model extends CI_Model
{	
	/**
	 * Menu desplegabale permiso
	 * @return string
	 */
	public function combopermiso()
	{
		$sql ="SELECT ciudadano.idciudadano AS idciud, CONCAT(ciudadano.nombre_ciudadano,' ',
				   ciudadano.segundo_nombreciudadano,' ',
				  ciudadano.apellidopat_ciudadano,' ',
				  ciudadano.apellidomat_ciudadano) AS Ciudadano
				  FROM tipo_ciudadano
				  JOIN ciudadano ON ciudadano
				  .idtipo_ciudadano = tipo_ciudadano.`idtipo_ciudadano`
				  WHERE tipo_ciudadano.`idtipo_ciudadano` = 204";
		$consulta = $this->db->query($sql);

		return $consulta->result();
	}
	/**
	 * Desplegable acta
	 * @return string
	 */
	public function comboacta()
	{
		$sql = "SELECT ciudadano.idciudadano AS idciud, CONCAT(ciudadano.nombre_ciudadano,' ',
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
	/**
	 * Desplegable sepultura
	 * @return string
	 */
	public function combosepultada()
	{
		$sql = "SELECT ciudadano.idciudadano AS idciud, CONCAT(ciudadano.nombre_ciudadano,' ',
				   ciudadano.segundo_nombreciudadano,' ',
				  ciudadano.apellidopat_ciudadano,' ',
				  ciudadano.apellidomat_ciudadano) AS Ciudadano
				  FROM tipo_ciudadano
				  JOIN ciudadano ON ciudadano
				  .idtipo_ciudadano = tipo_ciudadano.`idtipo_ciudadano`
				  WHERE tipo_ciudadano.`idtipo_ciudadano` = 200";
		$consulta = $this->db->query($sql);
		return $consulta->result();			  
	}
	/**
	 * Registro Permiso
	 * @param type $idci 
	 * @param type $tel 
	 * @param type $datexp 
	 * @param type $dateselp 
	 * @param type $idac 
	 * @param type $obra 
	 * @param type $idt 
	 * @return type
	 */
	public function guardapermiso($idci,$tel,$datexp,$dateselp,$idac,$obra,$idt)
	{
		$data = array(
			'idciudadano' => $idci,
			'telefono_permiso' => $tel,
			'fechaexpide_permiso' => $datexp,
			'fecha_sepultura' => $dateselp,
			'idfinado' => $idac,
			'obra_autorizada' => $obra,
			'idcadaver' => $idt
		);	
		$consulta = $this->db->insert('permiso',$data);
		return $consulta;
	}
	public function duplicadopermiso($idci,$idac,$idt)
	{
		$this->db->where('idciudadano',$idci);
		$this->db->where('idfinado',$idac);
		$this->db->where('idcadaver',$idt);
		$result = $this->db->get('permiso');
		if ($result->num_rows()>0) {
			return $result->row();
		}else{
			return null;
		}
	}
	/**
	 * busqueda por criterio
	 * @param type $criterio 
	 * @return string
	 */
	public function buscapermiso($criterio)
	{
		$sql = "SELECT CONCAT(ciud.nombre_ciudadano,' ' ,ciud.segundo_nombreciudadano,' ',ciud.`apellidopat_ciudadano`,' ',ciud.`apellidomat_ciudadano`) AS solicitante,
		telefono_permiso AS tel,
		CONCAT(finado.nombre_ciudadano,' ' ,finado.segundo_nombreciudadano,' ',finado.`apellidopat_ciudadano`,' ',finado.`apellidomat_ciudadano`) AS finado,
		DATE_FORMAT(fechaexpide_permiso,'%d-%m-%Y') AS expide,
		CONCAT(cadaver.nombre_ciudadano,' ' ,cadaver.segundo_nombreciudadano,' ',cadaver.`apellidopat_ciudadano`,' ',cadaver.`apellidomat_ciudadano`) AS cadaver
		FROM permiso AS perm
		JOIN ciudadano AS ciud ON ciud.`idciudadano` = perm.`idciudadano`
		JOIN ciudadano AS finado ON finado.`idciudadano` = perm.`idfinado`
		JOIN ciudadano AS cadaver ON cadaver.`idciudadano` = perm.`idcadaver`
		WHERE ciud.nombre_ciudadano LIKE '$criterio%' OR finado.`nombre_ciudadano` LIKE '$criterio%'";
		$consulta=$this->db->query($sql);
			return $consulta->result();
	}

	/**
	 * Realiza modificaciones
	 * @param type $criterio 
	 * @return string
	 */
	public function buscamodifica($criterio)
	{
		$sql="SELECT per.`idpermiso` AS dni,
	cid.`idciudadano` AS idciu,
	cid.nombre_ciudadano AS nombre,
	cid.segundo_nombreciudadano AS segundo,
	cid.apellidopat_ciudadano AS pat,
	cid.`apellidomat_ciudadano` AS mat,
	per.`telefono_permiso` AS tel,
	per.`fechaexpide_permiso` AS expide,
	per.`fecha_sepultura` AS fsepul,
	finado.`idciudadano` AS idciuf,
	finado.nombre_ciudadano AS nombref,
	finado.segundo_nombreciudadano AS segundof,
	finado.apellidopat_ciudadano AS patf,
	finado.`apellidomat_ciudadano` AS matf,
	per.`obra_autorizada` AS obra,
	cadaver.`idciudadano` AS idciucv,
	cadaver.nombre_ciudadano AS nombrecv,
	cadaver.segundo_nombreciudadano AS segundocv,
	cadaver.apellidopat_ciudadano AS patcv,
	cadaver.`apellidomat_ciudadano` AS matcv	
	FROM permiso AS per
	JOIN ciudadano AS cid ON cid.`idciudadano` = per.`idciudadano`
	JOIN ciudadano AS finado ON finado.`idciudadano` = per.`idfinado`
	JOIN ciudadano AS cadaver ON cadaver.`idciudadano` = per.`idcadaver`
	WHERE cid.`nombre_ciudadano` LIKE '$criterio%'";
	$consulta=$this->db->query($sql);
	return $consulta->result();

	}
	public function buscaidciud($dni)
	{
		$sql="SELECT per.`idpermiso` AS dni,
	cid.`idciudadano` AS idciu,
	cid.nombre_ciudadano AS nombre,
	cid.segundo_nombreciudadano AS segundo,
	cid.apellidopat_ciudadano AS pat,
	cid.`apellidomat_ciudadano` AS mat,
	per.`telefono_permiso` AS tel,
	per.`fechaexpide_permiso` AS expide,
	per.`fecha_sepultura` AS fsepul,
	finado.`idciudadano` AS idciuf,
	finado.nombre_ciudadano AS nombref,
	finado.segundo_nombreciudadano AS segundof,
	finado.apellidopat_ciudadano AS patf,
	finado.`apellidomat_ciudadano` AS matf,
	per.`obra_autorizada` AS obra,
	cadaver.`idciudadano` AS idciucv,
	cadaver.nombre_ciudadano AS nombrecv,
	cadaver.segundo_nombreciudadano AS segundocv,
	cadaver.apellidopat_ciudadano AS patcv,
	cadaver.`apellidomat_ciudadano` AS matcv	
	FROM permiso AS per
	JOIN ciudadano AS cid ON cid.`idciudadano` = per.`idciudadano`
	JOIN ciudadano AS finado ON finado.`idciudadano` = per.`idfinado`
	JOIN ciudadano AS cadaver ON cadaver.`idciudadano` = per.`idcadaver`
	WHERE per.`idpermiso` LIKE $dni";
	$consulta=$this->db->query($sql);
	return $consulta->result();
	}

	public function actualizapermiso($dni,$idciu,$telc,$fexpide,$fsepul,$idact,$obra,$idtum)
	{
		$sql = "UPDATE permiso SET idciudadano = $idciu,
		telefono_permiso = '$telc',
		fechaexpide_permiso = '$fexpide',
		fecha_sepultura = '$fsepul',
		idfinado = $idact,
		obra_autorizada = '$obra',
		idcadaver = $idtum
		WHERE idpermiso = $dni";
		$consulta=$this->db->query($sql);
		return $consulta;
	}




}	

