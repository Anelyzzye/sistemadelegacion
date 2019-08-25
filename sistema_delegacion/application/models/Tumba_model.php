<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tumba_model extends CI_Model
{
	public function guardartumba($idct,$timedef,$large,$anchmed,$centsep)
	{
		$data = array(
			'idciudadano' => $idct,
			'tiempo_defunsion' => $timedef,
			'largo_metros' => $large,
			'ancho_medida' => $anchmed,
			'centimetros_separacion' => $centsep
		);	
		$consulta = $this->db->insert('tumba',$data) OR DIE ('ERROR DE CONSULTA');
		return $consulta;
	}
	public function duplicadotumba($idct)
	{
		$this->db->where('idciudadano',$idct);

		$result = $this->db->get('tumba');
		if ($result->num_rows()>0) {
			return $result->row();
		}else{
			return null;
		}
	}

	public function combosepultado()
	{
		$sql ="SELECT ciudadano.idciudadano AS idciud, CONCAT(ciudadano.nombre_ciudadano,' ',
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

    public function buscaporfecha($criterio)
    {
    	$sql="SELECT CONCAT(ciud.nombre_ciudadano,' ' ,ciud.segundo_nombreciudadano,' ',ciud.`apellidopat_ciudadano`,' ',ciud.`apellidomat_ciudadano`) AS solicitante,
		telefono_permiso AS tel,
		CONCAT(finado.nombre_ciudadano,' ' ,finado.segundo_nombreciudadano,' ',finado.`apellidopat_ciudadano`,' ',finado.`apellidomat_ciudadano`) AS finado,
		DATE_FORMAT(fechaexpide_permiso,'%d-%m-%Y') AS expide,
		CONCAT(cadaver.nombre_ciudadano,' ' ,cadaver.segundo_nombreciudadano,' ',cadaver.`apellidopat_ciudadano`,' ',cadaver.`apellidomat_ciudadano`) AS cadaver
		FROM permiso AS perm
		JOIN ciudadano AS ciud ON ciud.`idciudadano` = perm.`idciudadano`
		JOIN ciudadano AS finado ON finado.`idciudadano` = perm.`idfinado`
		JOIN ciudadano AS cadaver ON cadaver.`idciudadano` = perm.`idcadaver`
		WHERE perm.fechaexpide_permiso LIKE '$criterio%'";
		$consulta = $this->db->query($sql);
		return $consulta->result();
    }
    public function buscatumba($criterio)
    {
    	$sql="SELECT 	CONCAT(finado.nombre_ciudadano,' ' ,finado.segundo_nombreciudadano,' ',finado.`apellidopat_ciudadano`,' ',finado.`apellidomat_ciudadano`) AS actual,
	CONCAT(cadaver.nombre_ciudadano,' ' ,cadaver.segundo_nombreciudadano,' ',cadaver.`apellidopat_ciudadano`,' ',cadaver.`apellidomat_ciudadano`) AS tumba,
	tba.`tiempo_defunsion` AS tiempo,
	tba.`largo_metros` AS largo,
	tba.`ancho_medida` AS ancho,
	tba.`centimetros_separacion` AS separacion 
	FROM permiso AS perm
	JOIN ciudadano AS ciud ON ciud.`idciudadano` = perm.`idciudadano`
	JOIN ciudadano AS finado ON finado.`idciudadano` = perm.`idfinado`
	JOIN ciudadano AS cadaver ON cadaver.`idciudadano` = perm.`idcadaver`
	JOIN tumba AS tba ON tba.`idciudadano` = perm.`idcadaver`
	WHERE finado.nombre_ciudadano LIKE '$criterio%' OR cadaver.nombre_ciudadano LIKE '$criterio%'";
	$consulta = $this->db->query($sql);
	return $consulta->result();
    }

    public function buscamodifica($criterio)
	{
		$sql="SELECT tmb.idtumba AS dni,
		cdn.idciudadano AS idc,
		cdn.nombre_ciudadano AS nombre,
		cdn.segundo_nombreciudadano AS segundo,
		cdn.apellidopat_ciudadano AS pater,
		cdn.apellidomat_ciudadano AS mater,
		tmb.tiempo_defunsion AS tiemp,
		tmb.largo_metros AS mts,
		tmb.ancho_medida AS med,
		tmb.centimetros_separacion AS sep
	FROM tumba AS tmb 
	JOIN ciudadano AS cdn ON cdn.idciudadano = tmb.idciudadano
	WHERE cdn.nombre_ciudadano LIKE '$criterio%'";
	$consulta=$this->db->query($sql);
	return $consulta->result();
	}

	public function buscaid($dni)
	{
		$sql="SELECT tmb.idtumba AS dni,
		cdn.idciudadano AS idc,
		cdn.nombre_ciudadano AS nombre,
		cdn.segundo_nombreciudadano AS segundo,
		cdn.apellidopat_ciudadano AS pater,
		cdn.apellidomat_ciudadano AS mater,
		tmb.tiempo_defunsion AS tiemp,
		tmb.largo_metros AS mts,
		tmb.ancho_medida AS med,
		tmb.centimetros_separacion AS sep
	FROM tumba AS tmb 
	JOIN ciudadano AS cdn ON cdn.idciudadano = tmb.idciudadano
	WHERE tmb.idtumba LIKE $dni";
	$consulta=$this->db->query($sql);
	return $consulta->result();
	}

	public function actualizatumba($dni,$ddn,$tdf,$lmts,$amdd,$csep)
	{
		$sql="UPDATE tumba SET idciudadano = $ddn,
				tiempo_defunsion = '$tdf',
				largo_metros = '$lmts',
				ancho_medida = '$amdd',
				centimetros_separacion = '$csep'
				WHERE idtumba = $dni";
		$consulta=$this->db->query($sql);
		return $consulta;			
	}

	public function buscamodificatumba($criterio)
	{
		$sql="SELECT idterreno AS idnt,
	superficie AS superficie,
	calle_terreno AS calle,
	numext_terreno AS nterr,
	numint_terreno AS niterr,
	cp_terreno AS cp,
	colonia_terreno AS colonia,
	norte_medida AS nortem,
	norte_colinda AS nortec,
	sur_medida AS surm,
	sur_colinda AS surc,
	oriente_medida AS orientem,
	oriente_colinda AS orientec,
	poniente_medida AS ponientem,
	poniente_colinda AS ponientec
	FROM terreno
	WHERE calle_terreno LIKE '$criterio%'";
	$consulta=$this->db->query($sql);
	return $consulta->result();
	}
}