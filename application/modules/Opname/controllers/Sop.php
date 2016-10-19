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
            'so' => $this->model->getAll()
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
        $item = $this->input->post('item');
        $stock = $this->input->post('stock');
        $real = $this->input->post('real');
        $minus = $this->input->post('minus');
        $note = $this->input->post('note');
        $date = sistem_date($this->input->post('date'));

        $data = array(
            'item'=>$item,
            'stock'=>$stock,
            'real'=>$real,
            'minus'=>$minus,
            'note'=>$note,
            'date'=>$date,
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
            'barang' => $this->model->getBarangAll(),
            'so' => $this->model->getId($id),
        );

        $content = "update";
        $this->template->output($data,$content);
    }

    public function do_update()
    {
        $item = $this->input->post('item');
        $stock = $this->input->post('stock');
        $real = $this->input->post('real');
        $minus = $this->input->post('minus');
        $note = $this->input->post('note');
        $date = sistem_date($this->input->post('date'));
        $id = $this->input->post('id');

        $data = array(
            'item'=>$item,
            'stock'=>$stock,
            'real'=>$real,
            'minus'=>$minus,
            'note'=>$note,
            'date'=>$date,
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

    public function form()
    {
        $data = array(
            'title' => 'Stock Opname',
            'sub_title' => 'Filter Stock Opname',
            'barang' => $this->model->getBarangAll(),
            'linkview' => site_url('opname/sop/view_filter')
        );

        $content = "form_filter";
        $this->template->output($data,$content);
    }

    public function view_filter()
    {
        $from = $this->input->post('from');
        $until = $this->input->post('until');

        $pagedata['result'] = $this->model->getBarangByFilter($from,$until);

//        return var_dump($pagedata);

        $this->load->view('view_filter',$pagedata);
    }
}