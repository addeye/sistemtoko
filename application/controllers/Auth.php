<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 01/09/2016
 * Time: 3:22
 */
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
    }

    public function login()
    {
        $this->load->view('admin/login');
    }

    public function do_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $result = $this->auth_model->check($username,$password);
        if($result->num_rows())
        {
            $row = $result->row();
            $data = [
                'user_id' => $row->id,
                'name' => $row->name,
                'level' => $row->level,
                'islogin' => TRUE
            ];
            $this->session->set_userdata($data);

            $this->auth_model->time_log($row->id);

            helper_log("login", "melakukan login");
            if($this->session->level==3)
            {
                redirect('teller/cart');
            }
            redirect('/');
        }
        else
        {
            $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Username dan Password Salah !!</div></div>");
            redirect('auth/login');
        }
    }

    public function logout()
    {
        helper_log("logout", "melakukan logout");
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}