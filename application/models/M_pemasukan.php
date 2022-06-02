<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pemasukan extends CI_Model {

	public $table	= 'tb_pemasukan';

	public function get_data()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('tb_jenis_pemasukan', 'tb_jenis_pemasukan.id_jenis_pemasukan=tb_pemasukan.id_jenis_pemasukan');
		$this->db->order_by('tanggal', 'DESC');
    return $this->db->get();
	}

	public function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function get_by_id($id_pemasukan)
	{
		return $this->db->get_where($this->table, ['id_pemasukan' => $id_pemasukan])->row_array();
	}

	public function get_by_role($role)
	{
		return $this->db->get_where($this->table, ['role' => $role])->result_array();
	}

	public function update($data)
	{
		$this->db->where('id_pemasukan', $data['id_pemasukan']);
		$this->db->update($this->table, $data);
	}

	public function delete($id_pemasukan)
	{
		$this->db->delete($this->table, ['id_pemasukan' => $id_pemasukan]);
	}
}
