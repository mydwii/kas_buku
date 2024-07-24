<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
	function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('transaksi_m');
    }
    public function index()
	{
		$username = $this->fungsi->user_login()->username;
		$level = $this->fungsi->user_login()->level;
		$this->db->select('*')->from('transaksi');
		$this->db->order_by('tanggal', 'DESC');
		$user = $this->db->get()->result_array();
		if($level == 'User'){
			$this->db->where('username', $username);
		}
		$data ['transaksi'] = $this->transaksi_m->getTransaksi();
		$this->load->view('transaksi', $data);
		
	}

	public function tambah(){
		$data = array(
			'username' 	=> $this->input->post('username'),
			'jenis_transaksi' 	=> $this->input->post('jenis_transaksi'),
			'keterangan' 	=> $this->input->post('keterangan'),
			'nominal' 	=> $this->input->post('nominal'),
			'tanggal' 	=> $this->input->post('tanggal'),
		);
		$this->db->insert('transaksi', $data);
		$this->session->set_flashdata('alert', 
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>Yeayyyy berhasil ditambahkan
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
		
		redirect('transaksi');
	}
	public function hapus($id){
		$where = array('id_transaksi' => $id);
		$this->db->delete('transaksi', $where);
		$this->session->set_flashdata('alert', 
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>Yeayyyy berhasil dihapuss
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
		redirect('transaksi');
	}
	public function laporan()
	{
		$tanggal1 = $this->input->post('tanggal1');
		$tanggal2 = $this->input->post('tanggal2');

		$data['title'] = 'laporan';
		$data['tanggal1'] = $tanggal1;
		$data['tMasuk'] = $this->transaksi_m->filterTotalPemasukkan($tanggal1, $tanggal2);
		$data['tKeluar'] = $this->transaksi_m->filterTotalPengeluaran($tanggal1, $tanggal2);
		$data['filter'] = $this->transaksi_m->filterByTanggal($tanggal1, $tanggal2);
		$data['judul'] = "Laporan dari Tanggal $tanggal1 sampai $tanggal2";
		// var_dump($data['filter']);
		// die;

		$this->load->view('laporan', $data);


		$paper_size = 'A4';
		$orientation = 'portrait';
		$html = $this->output->get_output();

		$this->load->library('pdf');

		$this->pdf->generate(
			$html,
			"Laporan_transaksi",
			$paper_size,
			$orientation
		);
	
	}
	// public function laporan_masuk()
	// {
	// 	$tanggal1 = $this->input->post('tanggal1');
	// 	$tanggal2 = $this->input->post('tanggal2');

	// 	$data['title'] = 'laporan'; 
	// 	// $laporan = "SELECT * FROM transaksi WHERE tanggal BETWEEN '$tanggal1' AND '$tanggal2'";
	// 	// $data['laporan'] = $this->db->query($laporan);
	// 	$data['filter'] = $this->transaksi_m->filterByTanggal($tanggal1, $tanggal2);

	// 	$this->load->view('laporan_pemasukan', $data);

	// 	$paper_size = 'A4';
	// 	$orientation = 'portrait';
	// 	$html = $this->output->get_output();

	// 	$this->load->library('pdf');

	// 	$this->pdf->generate(
	// 		$html,
	// 		"Laporan_transaksi",
	// 		$paper_size,
	// 		$orientation
	// 	);
	
	// }
	
}

