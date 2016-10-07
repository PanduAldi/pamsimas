<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_user extends CI_Model {

	private $table = "user";
	private $id    = "id_user";


	public function __construct()
	{
		parent::__construct();
		
	}

	public function get_user()
	{
		$this->db->get($this->table);
	}

	public function login($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		return $this->db->get($this->table);

	}

	public function ganti_pass($id_user, $record)
	{
		$this->db->where('id_user', $this->id_user);
		$this->db->update($this->table, $record);
	}




}

/* End of file  */
/* Location: ./application/models/ */