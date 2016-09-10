<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 01/09/2016
 * Time: 2:56
 */
class Home extends My_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('user_model','level_model'));
        if(!$this->is_logged_in())
        {
            redirect('/');
        }
    }
    public function index()
    {
        $data['title'] = 'User';
        $data['sub_title'] = 'Tabel User';
        $data['user'] = $this->user_model->getAll();
        $content = "list";
        $this->template->output($data,$content);
    }

    public function add()
    {
        $data['title'] = 'User';
        $data['sub_title'] = 'Tambah User';
        $data['level'] = $this->level_model->getAll();
        $content = "add";
        $this->template->output($data,$content);
    }

    public function do_add()
    {
        $data = array(
            'name' => $this->input->post('name'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'level' => $this->input->post('level'),
            'active' => $this->input->post('active'),
        );

        $result = $this->user_model->create($data);
        if($result)
        {
            
        }
    }

}