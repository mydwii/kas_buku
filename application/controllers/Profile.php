<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('user_m');
    }
    public function edit(){
	
		$this->load->view('edit_profil');
	}
	public function update()
	{
		$id_user = $this->input->post('id_user'); 
		$nama = $this->input->post('nama'); 
		$kelas = $this->input->post('kelas'); 
		$alamat = $this->input->post('alamat'); 

		$upload_image = $_FILES['gambar']['name'];

       

        if($upload_image){
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/sbadmin/upload/';
            
            $this->load->library('upload', $config);

            if($this->upload->do_upload('gambar')){
                $old_image = $data['user']['gambar'];
                if($old_image != 'default.jpg'){
                    unlink (FCPATH . 'assets/sbadmin/upload/' . $old_image);
                }

                $new_image = $this->upload->data('file_name');
                $this->db->set('gambar', $new_image);
            }else {
                echo $this->upload->display_errors();
            }
        }

        $this->db->set('nama', $nama);
        $this->db->set('kelas', $kelas);
        $this->db->set('alamat', $alamat);
        $this->db->where('id_user', $id_user);

        $this->db->update('user');

        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        congrats your proflie has been editing
    </div>');
        redirect('user/profil');
	}
}
