<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pendapatan_order extends CI_Model {

	public $table	= 'tb_pendapatan_order';

	public function get_data()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('tb_order', 'tb_order.id_order=tb_pendapatan_order.id_order');
		$this->db->join('tb_pegawai', 'tb_pegawai.id_pegawai=tb_pendapatan_order.id_pegawai');
		$this->db->order_by('tanggal', 'DESC');
    return $this->db->get();
	}

	public function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function get_by_id($id_pendapatan_order)
	{
		return $this->db->get_where($this->table, ['id_pendapatan_order' => $id_pendapatan_order])->row_array();
	}

	public function get_by_role($role)
	{
		return $this->db->get_where($this->table, ['role' => $role])->result_array();
	}

	public function update($data)
	{
		$this->db->where('id_pendapatan_order', $data['id_pendapatan_order']);
		$this->db->update($this->table, $data);
	}

	public function delete($id_pendapatan_order)
	{
		$this->db->delete($this->table, ['id_pendapatan_order' => $id_pendapatan_order]);
	}
}
