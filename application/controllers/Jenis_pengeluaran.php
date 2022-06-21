<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_pengeluaran extends CI_Controller {

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
    $data['title']		= 'Data Jenis Pemasukan';
		$data['jenis_pengeluaran']		= $this->M_jenis_pengeluaran->get_data()->result_array();
		$this->load->view('jenis_pengeluaran/data', $data);
	}

	public function tambah()
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data Jenis Pemasukan';
			$this->load->view('jenis_pengeluaran/tambah', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_user	= [
				'jenis_pengeluaran'			=> $data['jenis_pengeluaran'],
			];

			if ($this->M_jenis_pengeluaran->insert($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('tambah-jenis-pengeluaran');
			} else {
				$this->session->set_flashdata('msg', 'success');
				redirect('jenis-pengeluaran');
			}
		}
	}

	public function edit($id_jenis_pengeluaran)
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data Jenis Pemasukan';
			$data['jp']	= $this->M_jenis_pengeluaran->get_by_id($id_jenis_pengeluaran);
			$this->load->view('jenis_pengeluaran/edit', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_user	= [
				'id_jenis_pengeluaran'		=> $id_jenis_pengeluaran,
				'jenis_pengeluaran'			=> $data['jenis_pengeluaran']
			];
			
			if ($this->M_jenis_pengeluaran->update($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('edit-jenis-pengeluaran/'.$id_jenis_pengeluaran);
			} else {
				$this->session->set_flashdata('msg', 'edit');
				redirect('jenis-pengeluaran');
			}
		}
	}

	private function validation()
	{
		$this->form_validation->set_rules('jenis_pengeluaran', 'Jenis Pemasukan', 'required|trim');
		
	}

	public function hapus($id_jenis_pengeluaran)
	{
		$this->M_jenis_pengeluaran->delete($id_jenis_pengeluaran);
		$this->session->set_flashdata('msg', 'hapus');
		redirect('jenis-pengeluaran');
	}
}
