<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 12/09/2016
 * Time: 23:09
 */
class Supp extends My_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('supplier_model'=>'model'));
    }

    public function index()
    {
        $data = array(
            'title' => 'Supplier',
            'sub_title' => 'Tabel Supplier',
            'link_add' => site_url('supplier/supp/add'),
            'link_edit' => site_url('supplier/supp/update/'),
            'link_delete' => site_url('supplier/supp/delete'),
            'supplier' => $this->model->getAll()
        );

        $content = "list";
        $this->template->output($data,$content);
    }

    public function add()
    {
        $data = array(
            'title' => 'Supplier',
            'sub_title' => 'Tambah Supplier',
            'link_back' => site_url('supplier/supp'),
            'action_link' => site_url('supplier/supp/do_add'),
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
        $phone = $this->input->post('phone');
        $fax = $this->input->post('fax');
        $email = $this->input->post('email');
        $personal = $this->input->post('personal');

        $data = array(
            'name'=>$name,
            'kode'=>$kode,
            'address'=>$address,
            'phone'=>$phone,
            'fax'=>$fax,
            'email'=>$email,
            'personal'=>$personal,
        );

        $result = $this->model->create($data);
        if($result)
        {
            alert();
            redirect('supplier/supp');
        }
    }

    public function update($id)
    {
        $data = array(
            'title' => 'Supplier',
            'sub_title' => 'Update Supplier',
            'link_back' => site_url('supplier/supp'),
            'action_link' => site_url('supplier/supp/do_update'),
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
        $phone = $this->input->post('phone');
        $fax = $this->input->post('fax');
        $email = $this->input->post('email');
        $personal = $this->input->post('personal');
        $id = $this->input->post('id');

        $data = array(
            'kode'=>$kode,
            'name'=>$name,
            'phone'=>$phone,
            'address'=>$address,
            'fax'=>$fax,
            'email'=>$email,
            'personal'=>$personal,
        );
        $condition['id']= $id;
        $result = $this->model->update($id,$data);
        if($result)
        {
            alert(2);
            redirect('supplier/supp');
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