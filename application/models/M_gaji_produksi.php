<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_gaji_produksi extends CI_Model {

	public $table	= 'tb_gaji_produksi';

	public function get_data()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->order_by('tanggal_pencairan', 'DESC');
    return $this->db->get();
	}

	public function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function get_by_id($id_gaji_produksi)
	{
		return $this->db->get_where($this->table, ['id_gaji_produksi' => $id_gaji_produksi])->row_array();
	}

	public function get_by_role($role)
	{
		return $this->db->get_where($this->table, ['role' => $role])->result_array();
	}

	public function update($data)
	{
		$this->db->where('id_gaji_produksi', $data['id_gaji_produksi']);
		$this->db->update($this->table, $data);
	}

	public function delete($id_gaji_produksi)
	{
		$this->db->delete($this->table, ['id_gaji_produksi' => $id_gaji_produksi]);
	}
}
