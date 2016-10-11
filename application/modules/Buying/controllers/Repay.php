<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 10/10/2016
 * Time: 13:46
 */
class Repay extends My_controller
{
    protected $linkback = 'buying/repay';

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('return_model'=>'model'));
    }

    public function index()
    {
        $data = array(
            'title' => 'Return Products',
            'sub_title' => 'Tabel Return Products',
            'link_add' => site_url('buying/repay/add'),
            'link_edit' => site_url('buying/repay/update/'),
            'link_delete' => site_url('buying/repay/delete'),
            'data' => $this->model->getAll()
        );

        $content = "repay/list";
        $this->template->output($data,$content);
    }

    public function add()
    {
        $data = array(
            'title' => 'Return Products',
            'sub_title' => 'Tambah Return Products',
            'link_back' => site_url('buying/repay/'),
            'action_link' => site_url('buying/repay/do_add'),
            'kode' => $this->model->getkode(),
            'supplier' => $this->model->getSupplier()
        );

        $content = "repay/add";
        $this->template->output($data,$content);
    }

    public function do_add()
    {
        $number = $this->input->post('number');
        $supplier = $this->input->post('supplier');
        $note = $this->input->post('note');
        $date = sistem_date($this->input->post('date'));
        $employee = $this->user_name();

        $data = array(
            'number'=>$number,
            'supplier'=>$supplier,
            'note'=>$note,
            'date'=>$date,
            'employee'=>$employee,
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
            'title' => 'Return Products',
            'sub_title' => 'Update Return Products',
            'link_back' => site_url('buying/repay'),
            'action_link' => site_url('buying/repay/do_update'),
            'return' => $this->model->getId($id),
            'supplier' => $this->model->getSupplier()
        );

        $content = "repay/update";
        $this->template->output($data,$content);
    }

    public function do_update()
    {
        $number = $this->input->post('number');
        $supplier = $this->input->post('supplier');
        $note = $this->input->post('note');
        $date = sistem_date($this->input->post('date'));
        $id = $this->input->post('id');

        $data = array(
            'number'=>$number,
            'supplier'=>$supplier,
            'note'=>$note,
            'date'=>$date,
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

//        return var_dump($data);

        $content = "repay/form";
        $this->template->output($data,$content);
    }

    public function addCart()
    {
        $tr = $this->input->post('tr');
        $item = $this->input->post('item');
        $qty = $this->input->post('qty');
        $unit = $this->input->post('unit');
        $piece = $this->input->post('piece');

        $data = array(
            'tr'=>$tr,
            'item'=>$item,
            'qty'=>$qty,
            'unit'=>$unit,
            'piece'=>$piece,
        );

        //Deincrase stock
        savebarang($item,array('stock'=>$qty),0);


        $this->model->createDTr($data);
    }

    public function deleteCart($id)
    {
        $row = $this->model->getIdDTr($id);
        $data['stock'] = $row->qty;
        $item = $row->item;

        //update stock
        savebarang($item,$data);

        $this->model->deleteDTr($id);
    }

    public function listCart($id)
    {
        $data['DTr'] = $this->model->getByTr($id);
        foreach($data['DTr'] as $key=>$d)
        {
            $data['DTr'][$key]->barang = $this->model->getBarangById($d->item);
        }
//        return var_dump($data);
        $this->load->view('repay/cart',$data);
    }

    public function print_tr($id)
    {
        $data['tr'] = $this->model->getId($id);

//        return var_dump($data);
        $this->load->view('repay/cetak',$data);
    }

    public function notsent()
    {
        $data = array(
            'title' => 'Status Purchase Order',
            'sub_title' => 'Daftar Status PO',
            'data' => $this->model->getStatusSent()
        );
        foreach($data['data'] as $key=>$row)
        {
            $data['data'][$key]->sup = $this->model->getIdSupplier($row->supplier);
        }

//        return var_dump($data);

        $content = "notsent";
        $this->template->output($data,$content);
    }

    public function detail($id)
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

//        return var_dump($data);

        $content = "detail";
        $this->template->output($data,$content);
    }


    public function ceklist($id)
    {
        $data['DPo'] = $this->model->getByPo($id);
        foreach($data['DPo'] as $key=>$d)
        {
            $data['DPo'][$key]->barang = $this->model->getBarangById($d->item);
        }
        $data['id']=$id;
//        return var_dump($data);
        $this->load->view('ceklist',$data);
    }

    public function ceklist_act()
    {
        $come = $this->input->post('come');
        $ids = $this->input->post('id');

//        return var_dump($ids);
        foreach($ids as $val)
        {
            if(in_array($val,$come))
            {
                $this->model->updateDPo($val,array('come'=>'1'));
//                echo $come[$val];
            }
            else
            {
                $this->model->updateDPo($val,array('come'=>'0'));
            }
//            echo $val;
        }

    }
}