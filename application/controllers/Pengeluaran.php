<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengeluaran extends CI_Controller {

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
    $data['title']		= 'Data Pengeluaran';
		$data['pengeluaran']		= $this->M_pengeluaran->get_data()->result_array();
		$this->load->view('pengeluaran/data', $data);
	}

	public function tambah()
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data Pengeluaran';
			$data['jenis_pengeluaran'] = $this->db->get('tb_jenis_pengeluaran')->result_array();
			$this->load->view('pengeluaran/tambah', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_user	= [
				'tanggal'			=> $data['tanggal'],
				'id_jenis_pengeluaran'			=> $data['id_jenis_pengeluaran'],
				'keterangan'			=> $data['keterangan'],
				'referensi'			=> $data['referensi'],
				'jumlah'			=> $data['jumlah'],
			];

			if ($this->M_pengeluaran->insert($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('tambah-pengeluaran');
			} else {
				$this->session->set_flashdata('msg', 'success');
				redirect('pengeluaran');
			}
		}
	}

	public function edit($id_pengeluaran)
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data Pengeluaran';
			$data['jenis_pengeluaran'] = $this->db->get('tb_jenis_pengeluaran')->result_array();
			$data['pengeluaran']	= $this->M_pengeluaran->get_by_id($id_pengeluaran);
			$this->load->view('pengeluaran/edit', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_user	= [
				'id_pengeluaran' => $id_pengeluaran,
				'tanggal'			=> $data['tanggal'],
				'id_jenis_pengeluaran'			=> $data['id_jenis_pengeluaran'],
				'keterangan'			=> $data['keterangan'],
				'referensi'			=> $data['referensi'],
				'jumlah'			=> $data['jumlah'],
			];
			
			if ($this->M_pengeluaran->update($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('edit-pengeluaran/'.$id_pengeluaran);
			} else {
				$this->session->set_flashdata('msg', 'edit');
				redirect('pengeluaran');
			}
		}
	}

	private function validation()
	{
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');
		$this->form_validation->set_rules('id_jenis_pengeluaran', 'Jenis pengeluaran', 'required|trim');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
		$this->form_validation->set_rules('referensi', 'Ref', 'required|trim');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim');
		
	}

	public function hapus($id_pengeluaran)
	{
		$this->M_pengeluaran->delete($id_pengeluaran);
		$this->session->set_flashdata('msg', 'hapus');
		redirect('pengeluaran');
	}
}
