<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengeluaran extends CI_Model {

	public $table	= 'tb_pengeluaran';

	public function get_data()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('tb_jenis_pengeluaran', 'tb_jenis_pengeluaran.id_jenis_pengeluaran=tb_pengeluaran.id_jenis_pengeluaran');
		$this->db->order_by('tanggal', 'DESC');
    return $this->db->get();
	}

	public function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function get_by_id($id_pengeluaran)
	{
		return $this->db->get_where($this->table, ['id_pengeluaran' => $id_pengeluaran])->row_array();
	}

	public function get_by_role($role)
	{
		return $this->db->get_where($this->table, ['role' => $role])->result_array();
	}

	public function update($data)
	{
		$this->db->where('id_pengeluaran', $data['id_pengeluaran']);
		$this->db->update($this->table, $data);
	}

	public function delete($id_pengeluaran)
	{
		$this->db->delete($this->table, ['id_pengeluaran' => $id_pengeluaran]);
	}
}
