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

	public function auto_number($table, $kolom, $lebar=0, $awalan=null)
	{
		$this->db->select($kolom)
				 ->from($table)
				 ->limit(1)
				 ->order_by($kolom, 'desc');
		$query = $this->db->get();

		$row = $query->result_array();
		$cek = $query->num_rows();
		
		if ($cek > 0) 
		{
			$nomor = 1;
		}
		else
		{
			$nomor = intval(substr($row[0][$kolom], strlen($awalan)))+1;
		}

		if ($lebar > 0) 
		{
			$result = $awalan.str_pad($nomor, $lebar, "0", STR_PAD_LEFT);
		}
		else
		{
			$result = $awalan.$nomor;
		}

		return $nomor;
	}
}

/* End of file  */
/* Location: ./application/models/ */