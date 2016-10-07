<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_apps extends CI_Model {

	public function get_all($table)
	{
		return $this->db->get($table);
	}

	public function get_id($table, $key, $id)
	{
		$this->db->where($key, $id);
		return $this->db->get($table);
	}

	public function insert_data($table, $record)
	{
		$this->db->insert($table, $record);
	}

	public function update_data($table, $record, $key, $value)
	{
		$this->db->where($key, $value);
		$this->db->update($table, $record);
	}

	public function delete_data($table, $key, $value)
	{
		$this->db->where($key, $value);
		$this->db->delete($table);
	}

}

/* End of file  */
/* Location: ./application/models/ */