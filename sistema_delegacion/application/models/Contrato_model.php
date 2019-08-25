<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contrato_model extends CI_Model
{
	/**
	 * Muestra datos vendedor
	 * @return string
	 */
	public function combovendedor()
	{
	
	$sql ="SELECT ciudadano.idciudadano AS idciud, CONCAT(ciudadano.nombre_ciudadano,' ',
				   ciudadano.segundo_nombreciudadano,' ',
				  ciudadano.apellidopat_ciudadano,' ',
				  ciudadano.apellidomat_ciudadano) AS Ciudadano
				  FROM tipo_ciudadano
				  JOIN ciudadano ON ciudadano
				  .idtipo_ciudadano = tipo_ciudadano.`idtipo_ciudadano`
				  WHERE tipo_ciudadano.`idtipo_ciudadano` = 207";
		$consulta = $this->db->query($sql);

		return $consulta->result();	
	}
	/**
	 * Muestra datos del comprador
	 * @return string
	 */
	public function combocomprador()
	{
		$sql ="SELECT ciudadano.idciudadano AS idciud, CONCAT(ciudadano.nombre_ciudadano,' ',
				   ciudadano.segundo_nombreciudadano,' ',
				  ciudadano.apellidopat_ciudadano,' ',
				  ciudadano.apellidomat_ciudadano) AS Ciudadano
				  FROM tipo_ciudadano
				  JOIN ciudadano ON ciudadano
				  .idtipo_ciudadano = tipo_ciudadano.`idtipo_ciudadano`
				  WHERE tipo_ciudadano.`idtipo_ciudadano` = 201";
		$consulta = $this->db->query($sql);

		return $consulta->result();
	}
	
	/**
	 * Muestra datos del terreno
	 * @return string
	 */
	public function comboterreno()
	{
		$sql ="SELECT idterreno AS dni, CONCAT(calle_terreno, ' ', numext_terreno,' ',numint_terreno,' ',cp_terreno,' ',colonia_terreno) AS domicilio FROM terreno";
		$consulta = $this->db->query($sql);

		return $consulta->result();
		
	}
	public function comboanexo()
	{
		$consulta = $this->db->get('anexo');
		return $consulta->result();
	}
		public function combotescomprador()
	{
		$sql ="SELECT ciudadano.idciudadano AS idciud, CONCAT(ciudadano.nombre_ciudadano,' ',
				   ciudadano.segundo_nombreciudadano,' ',
				  ciudadano.apellidopat_ciudadano,' ',
				  ciudadano.apellidomat_ciudadano) AS Ciudadano
				  FROM tipo_ciudadano
				  JOIN ciudadano ON ciudadano
				  .idtipo_ciudadano = tipo_ciudadano.`idtipo_ciudadano`
				  WHERE tipo_ciudadano.`idtipo_ciudadano` = 205";
		$consulta = $this->db->query($sql);

		return $consulta->result();
	}
		public function combotesvendedor()
	{
		$sql ="SELECT ciudadano.idciudadano AS idciud, CONCAT(ciudadano.nombre_ciudadano,' ',
				   ciudadano.segundo_nombreciudadano,' ',
				  ciudadano.apellidopat_ciudadano,' ',
				  ciudadano.apellidomat_ciudadano) AS Ciudadano
				  FROM tipo_ciudadano
				  JOIN ciudadano ON ciudadano
				  .idtipo_ciudadano = tipo_ciudadano.`idtipo_ciudadano`
				  WHERE tipo_ciudadano.`idtipo_ciudadano` = 206";
		$consulta = $this->db->query($sql);

		return $consulta->result();
	}

/**
 * Registro
 * @param type $iddc 
 * @param type $idvende 
 * @param type $datec 
 * @param type $iddt 
 * @param type $cantp 
 * @param type $cantv 
 * @param type $testc 
 * @param type $testv 
 * @param type $idda 
 * @return void
 */
	public function guardarcontrato($iddc,$idvende,$datec,$iddt,$cantp,$cantv,$testc,$testv,$idda
)
	{
		$data = array(
			'idciudadano' => $iddc,
			'idvendedor' => $idvende,
			'fecha_contrato' => $datec,
			'idterreno' => $iddt, 
			'cantidad_precio' => $cantp,
			'cantidad_letra' => $cantv,
			'testigocompra' => $testc,
			'testigpvende' => $testv,
			'idanexo' => $idda,
		);	
		$consulta = $this->db->insert('contrato',$data) OR DIE ('ERROR DE CONSULTA');
		return $consulta;
	}
	public function duplicadocontrato($idvende,$iddt)
	{
		$this->db->where('idvendedor',$idvende);
		$this->db->where('idterreno',$iddt);

		$result = $this->db->get('contrato');
		if ($result->num_rows()>0) {
			return $result->row();
		}else{
			return null;
		}
	}
	/**
	 * Busqueda por criterio
	 * @param type $criterio 
	 * @return string
	 */

	public function buscamodificacontrato($criterio)
	{
		$sql="SELECT  con.`idcontrato` AS dni,
	comp.`idciudadano` AS compid,
	comp.`nombre_ciudadano` AS nomcomp,
	comp.segundo_nombreciudadano AS segcomp,
	comp.`apellidopat_ciudadano` AS patcomp,
	comp.`apellidomat_ciudadano` AS matcomp,
	ven.idciudadano AS venid,
	ven.nombre_ciudadano AS nomven,
	ven.segundo_nombreciudadano AS segven,
	ven.apellidopat_ciudadano AS patven,
	ven.apellidomat_ciudadano AS matven,
	con.`fecha_contrato` AS fechc,
	trn.idterreno AS teid,
	trn.calle_terreno AS calle,
	trn.numext_terreno AS net,
	trn.numint_terreno AS nit,
	trn.cp_terreno AS cp,
	trn.colonia_terreno AS col,
	con.cantidad_precio AS cant,
	con.`cantidad_letra` AS letra,
	tesc.`idciudadano` AS testid,
	tesc.nombre_ciudadano AS nomtest,
	tesc.segundo_nombreciudadano AS segtest,
	tesc.apellidopat_ciudadano AS pattest,
	tesc.apellidomat_ciudadano AS mattest,
	dos.idciudadano AS dosid,
	dos.nombre_ciudadano AS dosnom,
	dos.segundo_nombreciudadano AS dosseg,
	dos.apellidopat_ciudadano AS dospat,
	dos.apellidomat_ciudadano AS dosmat,
	xn.idanexo AS xnid,
	xn.documento_anexo AS docxn
FROM contrato AS con
JOIN ciudadano AS comp ON comp.`idciudadano` = con.`idciudadano`
JOIN ciudadano AS ven ON ven.idciudadano = con.`idvendedor`
JOIN terreno AS trn ON trn.idterreno = con.`idterreno`
JOIN ciudadano AS tesc ON tesc.idciudadano = con.`testigocompra`
JOIN ciudadano AS dos ON dos.idciudadano = con.testigpvende
JOIN anexo AS xn ON xn.idanexo = con.idanexo
WHERE comp.nombre_ciudadano LIKE '$criterio%'";
$consulta=$this->db->query($sql);
			return $consulta->result();

	}
	public function buscaid($dni)
	{
		$sql= "SELECT  con.`idcontrato` AS dni,
	comp.`idciudadano` AS compid,
	comp.`nombre_ciudadano` AS nomcomp,
	comp.segundo_nombreciudadano AS segcomp,
	comp.`apellidopat_ciudadano` AS patcomp,
	comp.`apellidomat_ciudadano` AS matcomp,
	ven.idciudadano AS venid,
	ven.nombre_ciudadano AS nomven,
	ven.segundo_nombreciudadano AS segven,
	ven.apellidopat_ciudadano AS patven,
	ven.apellidomat_ciudadano AS matven,
	con.`fecha_contrato` AS fechc,
	trn.idterreno AS teid,
	trn.calle_terreno AS calle,
	trn.numext_terreno AS net,
	trn.numint_terreno AS nit,
	trn.cp_terreno AS cp,
	trn.colonia_terreno AS col,
	con.cantidad_precio AS cant,
	con.`cantidad_letra` AS letra,
	tesc.`idciudadano` AS testid,
	tesc.nombre_ciudadano AS nomtest,
	tesc.segundo_nombreciudadano AS segtest,
	tesc.apellidopat_ciudadano AS pattest,
	tesc.apellidomat_ciudadano AS mattest,
	dos.idciudadano AS dosid,
	dos.nombre_ciudadano AS dosnom,
	dos.segundo_nombreciudadano AS dosseg,
	dos.apellidopat_ciudadano AS dospat,
	dos.apellidomat_ciudadano AS dosmat,
	xn.idanexo AS xnid,
	xn.documento_anexo AS docxn
FROM contrato AS con
JOIN ciudadano AS comp ON comp.`idciudadano` = con.`idciudadano`
JOIN ciudadano AS ven ON ven.idciudadano = con.`idvendedor`
JOIN terreno AS trn ON trn.idterreno = con.`idterreno`
JOIN ciudadano AS tesc ON tesc.idciudadano = con.`testigocompra`
JOIN ciudadano AS dos ON dos.idciudadano = con.testigpvende
JOIN anexo AS xn ON xn.idanexo = con.idanexo
WHERE con.idcontrato LIKE '$dni' ";
$consulta=$this->db->query($sql);
	return $consulta->result();
	}

	/**
	 * Modifica
	 * @param type $dni 
	 * @param type $idciuu 
	 * @param type $idvv 
	 * @param type $fechh 
	 * @param type $idte 
	 * @param type $cantp 
	 * @param type $cantl 
	 * @param type $testc 
	 * @param type $testv 
	 * @param type $idnx 
	 * @return string
	 */
	public function actualizacontrato($dni,$idciuu,$idvv,$fechh,$idte,$cantp,$cantl,$testc,$testv,$idnx)
	{
		$sql= "UPDATE contrato SET idciudadano = $idciuu,
	idvendedor= $idvv,
	fecha_contrato = '$fechh',
	idterreno = $idte,
	cantidad_precio = '$cantp',
	cantidad_letra = '$cantl',
	testigocompra = $testc,
	testigpvende = $testv,
	idanexo = $idnx
	WHERE idcontrato = $dni";
	$consulta=$this->db->query($sql);
	return $consulta;
	}
}