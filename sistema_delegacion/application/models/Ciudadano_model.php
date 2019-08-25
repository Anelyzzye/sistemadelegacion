<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ciudadano_model extends CI_Model
{	
	/**
	 *Menu desplegable Ciudadano
	 * @return string
	 */
	public function combotipociudadano()
	{
		$consulta = $this->db->get('tipo_ciudadano');
		return $consulta->result();
	}
	/**
	 * Menu desplegable Generoo
	 * @return string
	 */
	public function combogenero(){
		$consulta = $this->db->get('genero');
		return $consulta->result();
	}
	/**
	 * Inserta registros a la base
	 * @param type $nombc 
	 * @param type $nombseg 
	 * @param type $appat 
	 * @param type $apmat 
	 * @param type $callec 
	 * @param type $numextc 
	 * @param type $numintc 
	 * @param type $codp 
	 * @param type $colciu 
	 * @param type $ng 
	 * @param type $tipc 
	 * @return void
	 */
	public function guardarciudadano($nombc,$nombseg,$appat,$apmat,$callec,$numextc,$numintc,$codp,$colciu,$ng,$tipc)
	{
		$data = array(
			'nombre_ciudadano' => $nombc,
			'segundo_nombreciudadano' => $nombseg,
			'apellidopat_ciudadano' => $appat,
			'apellidomat_ciudadano' => $apmat,
			'calle_ciudadano' => $callec,
			'numext_ciudadano' => $numextc,
			'numint_ciudadano' => $numintc,
			'codp' => $codp,
			'colonia_ciudadano' => $colciu,
			'idgenero' => $ng,
			'idtipo_ciudadano' => $tipc,

		);	
		$consulta = $this->db->insert('ciudadano',$data);
		return $consulta;
	}
	/**
	 * Consulta validaciones 
	 * @param type $nombc 
	 * @param type $nombseg 
	 * @param type $appat 
	 * @param type $apmat 
	 * @return String
	 */
	public function duplicadociudadano($nombc,$nombseg,$appat,$apmat)
	{
		$this->db->where('nombre_ciudadano',$nombc);
		$this->db->where('segundo_nombreciudadano',$nombseg);
		$this->db->where('apellidopat_ciudadano',$appat);
		$this->db->where('apellidomat_ciudadano',$apmat);
	

		$result = $this->db->get('ciudadano');
		if ($result->num_rows()>0) {
			return $result->row();
		}else{
			return null;
		}
	}
	/**
	 * Funcion busqueda
	 * @param type $criterio 
	 * @return string
	 */
	public function consultaciudadano($criterio)
	{
		$sql="SELECT 	cid.`idciudadano` AS id,
			cid.nombre_ciudadano AS nombre,
			cid.`segundo_nombreciudadano` AS segundo,
			cid.`apellidopat_ciudadano` AS pat,
			cid.`apellidomat_ciudadano` AS mat,
			cid.calle_ciudadano AS calle,
			cid.numext_ciudadano AS ext,
			cid.numint_ciudadano AS inte,
			cid.codp AS cp,
			cid.colonia_ciudadano AS col,
			gen.idgenero AS idg,
			gen.`nombre_genero` AS genero,
			tipo.idtipo_ciudadano AS idt,
			tipo.`nombretipo` AS tipo
		FROM tipo_ciudadano AS tipo
		JOIN ciudadano AS cid ON cid.`idtipo_ciudadano` = tipo.`idtipo_ciudadano`
		JOIN genero AS gen ON gen.`idgenero` = cid.`idgenero`
		WHERE cid.`nombre_ciudadano` LIKE '$criterio%'";
		$consulta=$this->db->query($sql);
		return $consulta->result();
	}
	/**
	 * Busquedas por id
	 * @param type $dni 
	 * @return string
	 */
	public function buscaidciud($dni)
	{
		$sql="SELECT 	cid.`idciudadano` AS id,
			cid.nombre_ciudadano AS nombre,
			cid.`segundo_nombreciudadano` AS segundo,
			cid.`apellidopat_ciudadano` AS pat,
			cid.`apellidomat_ciudadano` AS mat,
			cid.calle_ciudadano AS calle,
			cid.numext_ciudadano AS ext,
			cid.numint_ciudadano AS inte,
			cid.codp AS cp,
			cid.colonia_ciudadano AS col,
			gen.idgenero AS idg,
			gen.`nombre_genero` AS genero,
			tipo.idtipo_ciudadano AS idt,
			tipo.`nombretipo` AS tipo
		FROM tipo_ciudadano AS tipo
		JOIN ciudadano AS cid ON cid.`idtipo_ciudadano` = tipo.`idtipo_ciudadano`
		JOIN genero AS gen ON gen.`idgenero` = cid.`idgenero`
		WHERE cid.`idciudadano` LIKE $dni";
		$consulta=$this->db->query($sql);
		return $consulta->result();
	}
	/**
	 * Modifica Cidadano
	 * @param type $dni 
	 * @param type $cid 
	 * @param type $segn 
	 * @param type $apellidop 
	 * @param type $apellidom 
	 * @param type $calleci 
	 * @param type $numet 
	 * @param type $numin 
	 * @param type $codp 
	 * @param type $col 
	 * @param type $gen 
	 * @param type $tip 
	 * @return string
	 */
	public function ciudadanomodifica($dni,$cid,$segn,$apellidop,$apellidom,$calleci,$numet,$numin,$codp,$col,$gen,$tip)
	{
		$sql="UPDATE ciudadano SET	nombre_ciudadano = '$cid',
					segundo_nombreciudadano='$segn',
					apellidopat_ciudadano='$apellidop',
					apellidomat_ciudadano='$apellidom',
					calle_ciudadano='$calleci',
					numext_ciudadano='$numet',
					numint_ciudadano='$numin',
					codp='$codp',
					colonia_ciudadano='$col',
					idgenero=$gen,
					idtipo_ciudadano=$tip
					WHERE idciudadano = $dni";
		$consulta=$this->db->query($sql);
		return $consulta;			

	}
}