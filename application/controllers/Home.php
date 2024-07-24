<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata() == NULL) {
			redirect('auth');
		}
	}

	public function index()
	{
		check_not_login();

		$this->load->model('home_m');
		$data['tMasuk']  = $this->home_m->getTotalPemasukan();
		$data['tKeluar']  = $this->home_m->getTotalPengeluaran();
		$this->load->view('dashboard', $data);
	}
	public function laporan()
	{
		$tanggal1 = $this->input->get('tanggal1');
		$tanggal2 = $this->input->get('tanggal2');
		$this->db->from('transaksi');
		$this->db->where("tanggal >=", $tanggal1);
		$this->db->where("tanggal <=", $tanggal2);
		$laporan = $this->db->get()->result_array();
		$data = array(
			'tanggal1' => $tanggal1,
			'tanggal2' => $tanggal2,
			'laporan' => $laporan,
		);
		$this->load->view('report', $data);
	}
}
