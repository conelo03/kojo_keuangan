<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cashflow extends CI_Controller {

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
		$post_m = $this->input->post('month');
    $data['title']		= 'Cash Flow';
		if(empty($post_m)){
			$month = date('Y-m');
		} else {
			$month = $post_m;
		}
		$data['month_c'] = $month;
		$data['month']		= $this->db->query("SELECT DATE_FORMAT(tanggal, '%Y-%m') as tgl1, DATE_FORMAT(tanggal, '%M %Y') as tgl FROM tb_pemasukan UNION SELECT DATE_FORMAT(tanggal, '%Y-%m') as tgl1, DATE_FORMAT(tanggal, '%M %Y') as tgl FROM tb_pengeluaran GROUP BY DATE_FORMAT(tgl1, '%M %Y') order by tgl1 ASC")->result_array();
		$data['cash']		= $this->db->query("SELECT tanggal as tgl, keterangan as ket, referensi as ref, jumlah as pemasukan, '' as pengeluaran 
		FROM tb_pemasukan 
		WHERE tanggal like '$month%'
		UNION 
		SELECT tanggal as tgl, keterangan as ket, referensi as ref, '' as pemasukan, jumlah as pengeluaran 
		FROM tb_pengeluaran 
		WHERE tanggal like '$month%'
		order by tgl ASC")->result_array();
		$this->load->view('cashflow/data', $data);
	}
}
