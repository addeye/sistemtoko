<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 12/09/2016
 * Time: 23:09
 */
class Ban extends My_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('bank_model'=>'model'));
    }

    public function index()
    {
        $data = array(
            'title' => 'Bank',
            'sub_title' => 'Tabel Bank',
            'link_add' => site_url('bank/ban/add'),
            'link_edit' => site_url('bank/ban/update/'),
            'link_delete' => site_url('bank/ban/delete'),
            'member' => $this->model->getAll()
        );

        $content = "list";
        $this->template->output($data,$content);
    }

    public function add()
    {
        $data = array(
            'title' => 'Bank',
            'sub_title' => 'Tambah Bank',
            'link_back' => site_url('bank/ban'),
            'action_link' => site_url('bank/ban/do_add'),
            'kode' => $this->model->getkode()
        );

        $content = "add";
        $this->template->output($data,$content);
    }

    public function do_add()
    {
        $name = $this->input->post('name');
        $personal = $this->input->post('personal');
        $rekening = $this->input->post('rekening');

        $data = array(
            'name'=>$name,
            'personal'=>$personal,
            'rekening'=>$rekening,
        );

        $result = $this->model->create($data);
        if($result)
        {
            alert();
            redirect('bank/ban');
        }
    }

    public function update($id)
    {
        $data = array(
            'title' => 'Bank',
            'sub_title' => 'Update Bank',
            'link_back' => site_url('bank/ban'),
            'action_link' => site_url('bank/ban/do_update'),
            'bank' => $this->model->getId($id)
        );

        $content = "update";
        $this->template->output($data,$content);
    }

    public function do_update()
    {
        $name = $this->input->post('name');
        $personal = $this->input->post('personal');
        $rekening = $this->input->post('rekening');
        $id = $this->input->post('id');

        $data = array(
            'name'=>$name,
            'personal'=>$personal,
            'rekening'=>$rekening,
        );
        $condition['id']= $id;
        $result = $this->model->update($id,$data);
        if($result)
        {
            alert(2);
            redirect('bank/ban');
        }
    }

    public function delete($id)
    {
        $result = $this->model->delete($id);
        if($result)
        {
            alert(3);
        }
    }
}