<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_pemasukan extends CI_Controller {

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
		$data['jenis_pemasukan']		= $this->M_jenis_pemasukan->get_data()->result_array();
		$this->load->view('jenis_pemasukan/data', $data);
	}

	public function tambah()
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data Jenis Pemasukan';
			$this->load->view('jenis_pemasukan/tambah', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_user	= [
				'jenis_pemasukan'			=> $data['jenis_pemasukan'],
			];

			if ($this->M_jenis_pemasukan->insert($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('tambah-jenis-pemasukan');
			} else {
				$this->session->set_flashdata('msg', 'success');
				redirect('jenis-pemasukan');
			}
		}
	}

	public function edit($id_jenis_pemasukan)
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data Jenis Pemasukan';
			$data['jp']	= $this->M_jenis_pemasukan->get_by_id($id_jenis_pemasukan);
			$this->load->view('jenis_pemasukan/edit', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_user	= [
				'id_jenis_pemasukan'		=> $id_jenis_pemasukan,
				'jenis_pemasukan'			=> $data['jenis_pemasukan']
			];
			
			if ($this->M_jenis_pemasukan->update($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('edit-jenis-pemasukan/'.$id_jenis_pemasukan);
			} else {
				$this->session->set_flashdata('msg', 'edit');
				redirect('jenis-pemasukan');
			}
		}
	}

	private function validation()
	{
		$this->form_validation->set_rules('jenis_pemasukan', 'Jenis Pemasukan', 'required|trim');
		
	}

	public function hapus($id_jenis_pemasukan)
	{
		$this->M_jenis_pemasukan->delete($id_jenis_pemasukan);
		$this->session->set_flashdata('msg', 'hapus');
		redirect('jenis-pemasukan');
	}
}
