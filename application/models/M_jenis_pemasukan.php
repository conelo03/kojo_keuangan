<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jenis_pemasukan extends CI_Model {

	public $table	= 'tb_jenis_pemasukan';

	public function get_data()
	{
		$this->db->select('*');
		$this->db->from($this->table);
        return $this->db->get();
	}

	public function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function get_by_id($id_jenis_pemasukan)
	{
		return $this->db->get_where($this->table, ['id_jenis_pemasukan' => $id_jenis_pemasukan])->row_array();
	}

	public function get_by_role($role)
	{
		return $this->db->get_where($this->table, ['role' => $role])->result_array();
	}

	public function update($data)
	{
		$this->db->where('id_jenis_pemasukan', $data['id_jenis_pemasukan']);
		$this->db->update($this->table, $data);
	}

	public function delete($id_jenis_pemasukan)
	{
		$this->db->delete($this->table, ['id_jenis_pemasukan' => $id_jenis_pemasukan]);
	}
}
