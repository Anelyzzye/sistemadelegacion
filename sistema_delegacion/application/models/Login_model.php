<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model 
{
	/**
	 * comparativa
	 * @param type $username 
	 * @param type $pass_usuario 
	 * @return string
	 */
	public function login($username,$pass_usuario)
	{
		$this->db->where('username',$username);
		$this->db->where('pass_usuario',$pass_usuario);
		$compara = $this->db->get('usuario');
		if ($compara->num_rows()>0) 
		{
			return true;
		}else
		{
			return false;
		}
		

	}

}	