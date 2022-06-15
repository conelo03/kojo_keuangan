<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gaji extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login') != TRUE)
		{
			set_pesan('Silahkan login terlebih dahulu', false);
			redirect('');
		}
		date_default_timezone_set("Asia/Jakarta");
		$this->load->library('upload');
	}

	public function index()
	{
    $data['title']		= 'Data Gaji';
		$data['gaji']		= $this->M_gaji->get_data()->result_array();
		$this->load->view('gaji/data', $data);
	}

	public function tambah()
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data Gaji';
			$this->load->view('gaji/tambah', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_user	= [
				'tanggal'			=> $data['tanggal'],
				'keterangan'			=> $data['keterangan'],
			];

			if ($this->M_gaji->insert($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('tambah-gaji');
			} else {
				$this->session->set_flashdata('msg', 'success');
				redirect('gaji');
			}
		}
	}

	public function edit($id_gaji)
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data Gaji';
			$data['gaji']	= $this->M_gaji->get_by_id($id_gaji);
			$this->load->view('gaji/edit', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_user	= [
				'id_gaji' => $id_gaji,
				'tanggal'			=> $data['tanggal'],
				'keterangan'			=> $data['keterangan'],
			];
			
			if ($this->M_gaji->update($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('edit-gaji/'.$id_gaji);
			} else {
				$this->session->set_flashdata('msg', 'edit');
				redirect('gaji');
			}
		}
	}

	private function validation()
	{
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
		
	}

	public function hapus($id_gaji)
	{
		$this->M_gaji->delete($id_gaji);
		$this->db->where('id_gaji', $id_gaji);
		$this->db->delete('tb_detail_gaji');
		$this->session->set_flashdata('msg', 'hapus');
		redirect('gaji');
	}

	public function posting($id_gaji)
	{
		$gp = $this->M_gaji->get_by_id($id_gaji);
		$data = [
			'tanggal' => $gp['tanggal'],
			'id_jenis_pengeluaran' => '2',
			'keterangan' => $gp['keterangan'],
			'referensi' => '-',
			'jumlah' => $gp['jumlah']
		];
		$this->M_pengeluaran->insert($data);
		$data = [
			'id_gaji' => $id_gaji,
			'status' => 1
		];
		$this->M_gaji->update($data);
		$this->session->set_flashdata('msg', 'posting');
		redirect('gaji');
	}

	public function detail($id_gaji)
	{
    $data['title']		= 'Data Gaji';
		$data['gp'] = $this->M_gaji->get_by_id($id_gaji);
		$data['gaji']		= $this->db->select('*')
		->from('tb_detail_gaji')
		->join('tb_pegawai', 'tb_pegawai.id_pegawai=tb_detail_gaji.id_pegawai')
		->where('tb_detail_gaji.id_gaji', $id_gaji)
		->get()->result_array();
		$data['id_gaji'] = $id_gaji;
		$this->load->view('gaji/detail', $data);
	}

	public function tambah_detail($id_gaji)
	{
		$this->validation_detail();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data Gaji';
			$data['id_gaji'] = $id_gaji;
			$data['pegawai'] = $this->M_pegawai->get_data()->result_array();
			$this->load->view('gaji/tambah_detail', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_user	= [
				'id_gaji' => $id_gaji,
				'id_pegawai'			=> $data['id_pegawai'],
				'gaji_pokok'			=> $data['gaji_pokok'],
				'bonus'			=> $data['bonus'],
				'kasbon'			=> $data['kasbon'],
				'total'			=> $data['gaji_pokok']+$data['bonus']-$data['kasbon'],
				'keterangan'			=> $data['keterangan'],
			];
			$query = $this->db->insert('tb_detail_gaji', $data_user);
			if (!$query) {
				$this->session->set_flashdata('msg', 'error');
				redirect('tambah-detail-gaji/'.$id_gaji);
			} else {
				$this->session->set_flashdata('msg', 'success');
				$this->sum_gaji($id_gaji);
				redirect('detail-gaji/'.$id_gaji);
			}
		}
	}

	public function edit_detail($id_gaji, $id_detail_gaji)
	{
		$this->validation_detail();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data Gaji';
			$data['id_gaji'] = $id_gaji;
			$data['pegawai'] = $this->M_pegawai->get_data()->result_array();
			$data['dg']	= $this->db->get_where('tb_detail_gaji', ['id_detail_gaji' => $id_detail_gaji])->row_array();
			$this->load->view('gaji/edit_detail', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_user	= [
				'id_gaji' => $id_gaji,
				'id_pegawai'			=> $data['id_pegawai'],
				'gaji_pokok'			=> $data['gaji_pokok'],
				'bonus'			=> $data['bonus'],
				'kasbon'			=> $data['kasbon'],
				'total'			=> $data['gaji_pokok']+$data['bonus']-$data['kasbon'],
				'keterangan'			=> $data['keterangan'],
			];

			$this->db->where('id_detail_gaji', $id_detail_gaji);
			$query = $this->db->update('tb_detail_gaji', $data_user);
			if (!$query) {
				$this->session->set_flashdata('msg', 'error');
				redirect('edit-detail-gaji/'.$id_gaji.'/'.$id_detail_gaji);
			} else {
				$this->session->set_flashdata('msg', 'edit');
				$this->sum_gaji($id_gaji);
				redirect('detail-gaji/'.$id_gaji);
			}
		}
	}

	private function validation_detail()
	{
		$this->form_validation->set_rules('id_pegawai', 'Pegawai', 'required|trim');
		$this->form_validation->set_rules('gaji_pokok', 'Gaji Pokok', 'required');
		$this->form_validation->set_rules('kasbon', 'Kasbon', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
		
	}

	public function hapus_detail($id_gaji, $id_detail_gaji)
	{
		$this->db->where('id_detail_gaji', $id_detail_gaji);
		$this->db->delete('tb_detail_gaji');
		$this->sum_gaji($id_gaji);
		$this->session->set_flashdata('msg', 'hapus');
		redirect('detail-gaji/'.$id_gaji);
	}

	public function cetak_slip($id_detail_gaji)
	{
		$data['title'] = 'Slip Gaji';
		$data['dg'] = $this->db->select('*')->from('tb_detail_gaji')->join('tb_pegawai', 'tb_pegawai.id_pegawai=tb_detail_gaji.id_pegawai')->where('tb_detail_gaji.id_detail_gaji', $id_detail_gaji)->get()->row_array();
		//var_dump($dg);
		$this->load->view('gaji/cetak_slip', $data);
	}

	private function sum_gaji($id_gaji)
	{
		$sum_gaji = $this->db->query("SELECT SUM(total) as total FROM tb_detail_gaji WHERE id_gaji='$id_gaji'")->row_array();
		$data = [
			'id_gaji' => $id_gaji,
			'jumlah' => $sum_gaji['total']
		];
		$this->M_gaji->update($data);

		return true;
	}
}
