<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 18/10/2016
 * Time: 9:23
 */
class Sop extends My_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('opname_model'=>'model'));
    }

    public function index()
    {
        $data = array(
            'title' => 'Stock Opname',
            'sub_title' => 'Tabel Stock Opname',
            'link_add' => site_url('opname/sop/add'),
            'link_edit' => site_url('opname/sop/update/'),
            'link_delete' => site_url('opname/sop/delete'),
            'member' => $this->model->getAll()
        );

        $content = "list";
        $this->template->output($data,$content);
    }

    public function add()
    {
        $data = array(
            'title' => 'Stock Opname',
            'sub_title' => 'Tambah Stock Opname',
            'link_back' => site_url('opname/sop'),
            'action_link' => site_url('opname/sop/do_add'),
            'barang' => $this->model->getBarangAll(),
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
            redirect('opname/sop');
        }
    }

    public function update($id)
    {
        $data = array(
            'title' => 'Stock Opname',
            'sub_title' => 'Update Stock Opname',
            'link_back' => site_url('opname/sop'),
            'action_link' => site_url('opname/sop/do_update'),
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
            redirect('opname/sop');
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

    public function detail_barang($id)
    {
        $pagedata['item'] = $this->model->getBarangById($id);
        $pagedata['opname'] = $this->model->getByItem($id);
        $this->load->view('detail',$pagedata);
    }
}