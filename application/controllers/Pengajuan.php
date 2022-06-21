<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {

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
    $data['title']		= 'Data Pengajuan';
		$data['pengajuan']		= $this->M_pengajuan->get_data()->result_array();
		$this->load->view('pengajuan/data', $data);
	}

	public function my()
	{
		$id_pegawai = $this->session->userdata('id_pegawai');
    $data['title']		= 'Pengajuanku';
		$data['pengajuan']		= $this->M_pengajuan->get_data()->result_array();
		$this->load->view('pengajuan/data', $data);
	}

	public function tambah()
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data Pengajuan';
			$data['jenis_pengeluaran'] = $this->db->get('tb_jenis_pengeluaran')->result_array();
			$this->load->view('pengajuan/tambah', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_user	= [
				'tanggal'			=> $data['tanggal'],
				'id_jenis_pengeluaran'			=> $data['id_jenis_pengeluaran'],
				'keterangan'			=> $data['keterangan'],
				'id_pegawai'			=> $this->session->userdata('id_pegawai'),
				'jumlah'			=> $data['jumlah'],
			];

			if ($this->M_pengajuan->insert($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('tambah-pengajuan');
			} else {
				$this->session->set_flashdata('msg', 'success');
				redirect('pengajuan');
			}
		}
	}

	public function edit($id_pengajuan)
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data Pengajuan';
			$data['jenis_pengeluaran'] = $this->db->get('tb_jenis_pengeluaran')->result_array();
			$data['p']	= $this->M_pengajuan->get_by_id($id_pengajuan);
			$this->load->view('pengajuan/edit', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_user	= [
				'id_pengajuan'		=> $id_pengajuan,
				'tanggal'			=> $data['tanggal'],
				'id_jenis_pengeluaran'			=> $data['id_jenis_pengeluaran'],
				'keterangan'			=> $data['keterangan'],
				'jumlah'			=> $data['jumlah'],
			];
			
			if ($this->M_pengajuan->update($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('edit-pengajuan/'.$id_pengajuan);
			} else {
				$this->session->set_flashdata('msg', 'edit');
				redirect('pengajuan');
			}
		}
	}

	private function validation()
	{
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');
		$this->form_validation->set_rules('id_jenis_pengeluaran', 'Jenis pengeluaran', 'required|trim');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim');
	}

	public function hapus($id_pengajuan)
	{
		$this->M_pengajuan->delete($id_pengajuan);
		$this->session->set_flashdata('msg', 'hapus');
		redirect('pengajuan');
	}

	public function approve($id_pengajuan)
	{
		$data_user	= [
			'id_pengajuan'		=> $id_pengajuan,
			'status'			=> 1,
		];

		$this->M_pengajuan->update($data_user);
		$this->session->set_flashdata('msg', 'verifikasi');
		redirect('pengajuan');
	}

	public function posting($id_pengajuan)
	{
		$gp = $this->M_pengajuan->get_by_id($id_pengajuan);
		$data = [
			'tanggal' => $gp['tanggal'],
			'id_jenis_pengeluaran' => $gp['id_jenis_pengeluaran'],
			'keterangan' => $gp['keterangan'],
			'referensi' => '-',
			'jumlah' => $gp['jumlah']
		];
		$this->M_pengeluaran->insert($data);
		$data = [
			'id_pengajuan' => $id_pengajuan,
			'status' => 2
		];
		$this->M_pengajuan->update($data);
		$this->session->set_flashdata('msg', 'posting');
		redirect('pengajuan');
	}
}
