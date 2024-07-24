<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function login()
    {
        $this->load->view('login');
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($post['login'])) {
            $this->load->model('user_m');
            $query = $this->user_m->login($post);

            if ($query->num_rows() > 0) {
                $row = $query->row();
                $params = array(
                    'id_user'   => $row->id_user,
                    'level'     => $row->level,
                    'username'  => $row->username,

                );
                $this->session->set_userdata($params);
                echo "<script>
                    alert('selamat, login berhasil');
                    window.location='" . site_url('home') . "';
                </script>";
            } else {
                $this->session->set_flashdata(
                    'alert',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle"></i> Username/Password Salah!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>'
                );
                redirect('auth/login');
            }
        }
    }
    public function logout()
    {
        $params = array('id_user', 'level');
        $this->session->unset_userdata($params);
        redirect('auth/login');
    }
}
