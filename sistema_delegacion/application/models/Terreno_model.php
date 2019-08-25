<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Terreno_model extends CI_Model
{
	public function guardarterreno($super,$callet,$numext,$numint,$cpter,$coloniat,$nortem,$nortc,$surm,$surc,$orientem,$orientec,$ponientem,$ponientec)
	{
		$data = array(
			'superficie' => $super,
			'calle_terreno' => $callet,
			'numext_terreno' => $numext,
			'numint_terreno' => $numint,
			'cp_terreno' => $cpter,
			'colonia_terreno' => $coloniat,
			'norte_medida' => $nortem,
			'norte_colinda' => $nortc,
			'sur_medida' => $surm,
			'sur_colinda' => $surc,
			'oriente_medida' => $orientem,
			'oriente_colinda' => $orientec,
			'poniente_medida' => $ponientem,
			'poniente_colinda' => $ponientec,

		);	
		$consulta = $this->db->insert('terreno',$data) OR DIE ('ERROR DE CONSULTA');
		return $consulta;
	}
	public function duplicadoterreno($super,$callet,$numext,$numint,$cpter,$coloniat)
	{
		$this->db->where('superficie',$super);
		$this->db->where('calle_terreno',$callet);
		$this->db->where('numext_terreno',$numext);
		$this->db->where('numint_terreno',$numint);
		$this->db->where('cp_terreno',$cpter);
		$this->db->where('colonia_terreno',$coloniat);

		$result = $this->db->get('terreno');
		if ($result->num_rows()>0) {
			return $result->row();
		}else{
			return null;
		}
	}
	public function buscaterreno($criterio)
	{
		$sql= "SELECT superficie AS superficie, CONCAT(ciud.nombre_ciudadano,' ' ,ciud.segundo_nombreciudadano,' ',ciud.`apellidopat_ciudadano`,' ',ciud.`apellidomat_ciudadano`) AS comprador, 
		CONCAT(terre.calle_terreno, ' ' ,terre.numext_terreno, ' ', terre.numint_terreno, ' ',terre.`colonia_terreno`) AS principal,
		CONCAT(norte_colinda, ' ',norte_medida) AS norte,
CONCAT(sur_colinda,' ',norte_medida) AS sur,
CONCAT(oriente_colinda,' ',oriente_medida) AS oriente,
CONCAT(poniente_colinda,' ',poniente_medida) AS poniente
		FROM contrato AS contrato
		JOIN ciudadano AS ciud ON ciud.`idciudadano` = contrato.`idciudadano`
		JOIN terreno AS terre ON terre.`idterreno` = contrato.`idterreno`
		WHERE terre.calle_terreno LIKE '$criterio%'";
			$consulta=$this->db->query($sql);
			return $consulta->result();
	}

	public function buscaid($dni)
	{
		$sql="SELECT idterreno AS dni,
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
	WHERE idterreno LIKE $dni";
	$consulta=$this->db->query($sql);
	return $consulta->result();
	}

	public function actualizaterreno($dni,$super,$calle,$next,$nixt,$cp,$col,$ntm,$ntc,$srm,$src,$ortm,$ortc,$ptm,$ptc)
	{
		$sql = "UPDATE terreno SET superficie = '$super',
	calle_terreno = '$calle',
	numext_terreno = '$next',
	numint_terreno = '$nixt',
	cp_terreno = '$cp',
	colonia_terreno = '$col',
	norte_medida = '$ntm',
	norte_colinda = '$ntc',
	sur_medida = '$srm',
	sur_colinda = '$src',
	oriente_medida = '$ortm',
	oriente_colinda = '$ortc',
	poniente_medida = '$ptm',
	poniente_colinda = '$ptc'
	WHERE idterreno = $dni";
	$consulta=$this->db->query($sql);
		return $consulta;
	}
	
	

}