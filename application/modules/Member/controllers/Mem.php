<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 12/09/2016
 * Time: 23:09
 */
class Mem extends My_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('member_model'=>'model'));
    }

    public function index()
    {
        $data = array(
            'title' => 'Member',
            'sub_title' => 'Tabel Member',
            'link_add' => site_url('member/mem/add'),
            'link_edit' => site_url('member/mem/update/'),
            'link_delete' => site_url('member/mem/delete'),
            'member' => $this->model->getAll()
        );

        $content = "list";
        $this->template->output($data,$content);
    }

    public function add()
    {
        $data = array(
            'title' => 'Member',
            'sub_title' => 'Tambah Member',
            'link_back' => site_url('member/mem'),
            'action_link' => site_url('member/mem/do_add'),
            'kode' => $this->model->getkode()
        );

        $content = "add";
        $this->template->output($data,$content);
    }

    public function do_add()
    {
        $kode = $this->input->post('kode');
        $name = $this->input->post('name');
        $address = $this->input->post('address');
        $telepon = $this->input->post('telepon');
        $phone = $this->input->post('phone');

        $data = array(
            'name'=>$name,
            'kode'=>$kode,
            'address'=>$address,
            'phone'=>$phone,
            'telepon'=>$telepon,
            'poin'=>0,
        );

        $result = $this->model->create($data);
        if($result)
        {
            alert();
            redirect('member/mem');
        }
    }

    public function update($id)
    {
        $data = array(
            'title' => 'Member',
            'sub_title' => 'Update Member',
            'link_back' => site_url('member/mem'),
            'action_link' => site_url('member/mem/do_update'),
            'supplier' => $this->model->getId($id)
        );

        $content = "update";
        $this->template->output($data,$content);
    }

    public function do_update()
    {
        $kode = $this->input->post('kode');
        $name = $this->input->post('name');
        $address = $this->input->post('address');
        $telepon = $this->input->post('telepon');
        $phone = $this->input->post('phone');
        $id = $this->input->post('id');

        $data = array(
            'kode'=>$kode,
            'name'=>$name,
            'phone'=>$phone,
            'address'=>$address,
            'telepon'=>$telepon,
        );
        $condition['id']= $id;
        $result = $this->model->update($id,$data);
        if($result)
        {
            alert(2);
            redirect('member/mem');
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