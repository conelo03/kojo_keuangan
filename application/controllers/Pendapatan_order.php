<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendapatan_order extends CI_Controller {

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
    $data['title']		= 'Data Pendapatan Order';
		$data['pendapatan_order']		= $this->M_pendapatan_order->get_data()->result_array();
		$this->load->view('pendapatan_order/data', $data);
	}

	public function tambah()
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data Pendapatan Order';
			$id_pegawai = $this->session->userdata('id_pegawai');
			$data['order'] = $this->M_order->get_data($id_pegawai, null, true)->result_array();
			$this->load->view('pendapatan_order/tambah', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_user	= [
				'tanggal'			=> $data['tanggal'],
				'id_order'			=> $data['id_order'],
				'keterangan'			=> $data['keterangan'],
				'id_pegawai'			=> $this->session->userdata('id_pegawai'),
				'jumlah'			=> $data['jumlah'],
			];

			if ($this->M_pendapatan_order->insert($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('tambah-pendapatan-order');
			} else {
				$this->session->set_flashdata('msg', 'success');
				redirect('pendapatan-order');
			}
		}
	}

	public function edit($id_pendapatan_order)
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data Pendapatan Order';
			$id_pegawai = $this->session->userdata('id_pegawai');
			$data['order'] = $this->M_order->get_data($id_pegawai, null, true)->result_array();
			$data['p']	= $this->M_pendapatan_order->get_by_id($id_pendapatan_order);
			$this->load->view('pendapatan_order/edit', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_user	= [
				'id_pendapatan_order'		=> $id_pendapatan_order,
				'tanggal'			=> $data['tanggal'],
				'id_order'			=> $data['id_order'],
				'keterangan'			=> $data['keterangan'],
				'jumlah'			=> $data['jumlah'],
			];
			
			if ($this->M_pendapatan_order->update($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('edit-pendapatan-order/'.$id_pendapatan_order);
			} else {
				$this->session->set_flashdata('msg', 'edit');
				redirect('pendapatan-order');
			}
		}
	}

	private function validation()
	{
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');
		$this->form_validation->set_rules('id_order', 'Order', 'required|trim');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim');
	}

	public function hapus($id_pendapatan_order)
	{
		$this->M_pendapatan_order->delete($id_pendapatan_order);
		$this->session->set_flashdata('msg', 'hapus');
		redirect('pendapatan-order');
	}

	public function posting($id_pendapatan_order)
	{
		$gp = $this->M_pendapatan_order->get_by_id($id_pendapatan_order);
		$data = [
			'tanggal' => $gp['tanggal'],
			'id_jenis_pemasukan' => 1,
			'keterangan' => $gp['keterangan'],
			'referensi' => '-',
			'jumlah' => $gp['jumlah']
		];
		$this->M_pemasukan->insert($data);

		$data = [
			'id_pendapatan_order' => $id_pendapatan_order,
			'status' => 1
		];
		$this->M_pendapatan_order->update($data);
		$this->session->set_flashdata('msg', 'posting');
		redirect('pendapatan-order');
	}

	public function get_order()
	{
		$id_order = $this->input->post('id_order');
		$order = $this->M_order->get_by_id($id_order);

		$data = [
			'keterangan' => 'Pembayaran Order '.$order['nama_produk'].' - '.$order['instansi'],
		];
		
		$response = [
			'response' => true,
			'data'	=> $data

		]; 
		echo json_encode($response);
	}
}
