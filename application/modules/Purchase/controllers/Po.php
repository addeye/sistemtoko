<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 12/09/2016
 * Time: 23:09
 */
class Po extends My_controller
{
    protected $linkback = 'purchase/po';

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('purchase_model'=>'model'));
    }

    public function index()
    {
        $data = array(
            'title' => 'Purchase Order',
            'sub_title' => 'Tabel Purchase Order',
            'link_add' => site_url('purchase/po/add'),
            'link_edit' => site_url('purchase/po/update/'),
            'link_delete' => site_url('purchase/po/delete'),
            'data' => $this->model->getAll()
        );
        foreach($data['data'] as $key=>$row)
        {
            $data['data'][$key]->sup = $this->model->getIdSupplier($row->supplier);
        }

        $content = "list";
        $this->template->output($data,$content);
    }

    public function add()
    {
        $data = array(
            'title' => 'Purchase Order',
            'sub_title' => 'Tambah Purchase Order',
            'link_back' => site_url('purchase/po/'),
            'action_link' => site_url('purchase/po/do_add'),
            'kode' => $this->model->getkode(),
            'supplier' => $this->model->getSupplier()
        );

        $content = "add";
        $this->template->output($data,$content);
    }

    public function do_add()
    {
        $number = $this->input->post('number');
        $supplier = $this->input->post('supplier');
        $disc = $this->input->post('disc');
        $ppn = $this->input->post('ppn');
        $note = $this->input->post('note');
        $date = sistem_date($this->input->post('date'));
        $term = $this->input->post('term');
        $due_date = sistem_date($this->input->post('due_date'));

        $data = array(
            'number'=>$number,
            'supplier'=>$supplier,
            'disc'=>$disc,
            'ppn'=>$ppn,
            'note'=>$note,
            'date'=>$date,
            'term'=>$term,
            'due_date'=>$due_date,
        );

        $result = $this->model->create($data);
        if($result)
        {
            alert();
            $this->back();
        }
    }

    public function update($id)
    {
        $data = array(
            'title' => 'Purchase Order',
            'sub_title' => 'Update Purchase Order',
            'link_back' => site_url('purchase/po'),
            'action_link' => site_url('purchase/po/do_update'),
            'po' => $this->model->getId($id),
            'supplier' => $this->model->getSupplier()
        );

        $content = "update";
        $this->template->output($data,$content);
    }

    public function do_update()
    {
        $number = $this->input->post('number');
        $supplier = $this->input->post('supplier');
        $disc = $this->input->post('disc');
        $ppn = $this->input->post('ppn');
        $note = $this->input->post('note');
        $date = sistem_date($this->input->post('date'));
        $term = $this->input->post('term');
        $due_date = sistem_date($this->input->post('due_date'));
        $id = $this->input->post('id');

        $data = array(
            'number'=>$number,
            'supplier'=>$supplier,
            'disc'=>$disc,
            'ppn'=>$ppn,
            'note'=>$note,
            'date'=>$date,
            'term'=>$term,
            'due_date'=>$due_date,
        );

        $condition['id']= $id;
        $result = $this->model->update($id,$data);
        if($result)
        {
            alert(2);
            $this->back();
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

    public function back()
    {
        redirect($this->linkback);
    }

    public function cart($id)
    {
        $data = array(
            'title' => 'Purchase Order',
            'sub_title' => 'Item Purchase Order',
            'link_add' => site_url('purchase/po/add'),
            'link_edit' => site_url('purchase/po/update/'),
            'link_delete' => site_url('purchase/po/delete'),
            'data' => $this->model->getId($id),
            'barang' => $this->model->getBarang(),
            'unit' => $this->model->getUnit(),
        );

        $content = "form";
        $this->template->output($data,$content);
    }

    public function addCart()
    {
        $po = $this->input->post('po');
        $item = $this->input->post('item');
        $qty = $this->input->post('qty');
        $unit = $this->input->post('unit');
        $piece = $this->input->post('piece');

        $data = array(
            'po'=>$po,
            'item'=>$item,
            'qty'=>$qty,
            'unit'=>$unit,
            'piece'=>$piece,
        );

        $this->model->createDPo($data);
    }

    public function deleteCart($id)
    {
        $this->model->deleteDPo($id);
    }

    public function listCart($id)
    {
        $data['DPo'] = $this->model->getByPo($id);
        foreach($data['DPo'] as $key=>$d)
        {
            $data['DPo'][$key]->barang = $this->model->getBarangById($d->item);
        }
//        return var_dump($data);
        $this->load->view('cart',$data);
    }
}