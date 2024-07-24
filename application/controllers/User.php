<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('user_m');
    }

	public function index()
	{	
		$this->db->select('*')->from('user');
		$this->db->order_by('nama', 'asc');
		$user = $this->db->get()->result_array();
		$data = array(
			'user' => $user
		);
		$this->load->view('user_index', $data);
	}
	public function tambah()
	{
		$this->load->view('user_tambah');
	}
	public function simpan()
	{	
		$username = $this->input->post('username');
		$cekusername = $this->db->where('username', $username)->count_all_results('user');
		if($cekusername==1){
			$this->session->set_flashdata('alert', 
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i> Username sudah digunakan!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect('user');
		}
		$data = array(
			'username' 	=> $this->input->post('username'),
			'nama' 		=> $this->input->post('nama'),
			'kelas' 	=> $this->input->post('kelas'),
			'alamat' 	=> $this->input->post('alamat'),
			'password' 	=> md5($this->input->post('password')),
			'level' 	=> $this->input->post('level'),
			'gambar' 	=> 'default.png',
		);
		$this->db->insert('user', $data);
		$this->session->set_flashdata('alert', 
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>Yeayyyy berhasil ditambahkan
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
		redirect('user');
	}
	public function hapus($id){
		$where = array('id_user' => $id);
		$this->db->delete('user', $where);
		$this->session->set_flashdata('alert', 
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>Yeayyyy berhasil dihapuss
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
		redirect('user');
	}
	public function edit($id){
		$this->db->select('*')->from('user');
		$this->db->where('id_user', $id);
		$user = $this->db->get()->result_array();
		$data = array('user' => $user);
		$this->load->view('form_edit', array_merge($data));
	}

	public function update(){
	$data = array(
		'nama' => $this->input->post('nama'),
		'kelas' => $this->input->post('kelas'),
		'alamat' => $this->input->post('alamat'),
		'level' => $this->input->post('level'),
	);
	$where = array('id_user' => $this->input->post('id_user'));
	$this->db->update('user', $data, $where);
	$this->session->set_flashdata('alert', 
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>Yeayyyy berhasil update
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
		redirect('user');
	}


	public function profil(){

		$this->load->view('profile');
	}
}
