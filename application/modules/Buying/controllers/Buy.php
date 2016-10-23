<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 12/09/2016
 * Time: 23:09
 */
class Buy extends My_controller
{
    protected $linkback = 'buying/buy';

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('buying_model'=>'model'));
    }

    public function index()
    {
        $data = array(
            'title' => 'Pembelian Barang',
            'sub_title' => 'Tabel Pembelian',
            'link_add' => site_url('buying/buy/add'),
            'link_edit' => site_url('buying/buy/update/'),
            'link_delete' => site_url('buying/buy/delete'),
            'link_open' => site_url('buying/buy/cart/'),
            'data' => $this->model->getAll()
        );

        $content = "list";
        $this->template->output($data,$content);
    }

    public function add()
    {
        $data = array(
            'title' => 'Pembelian Order',
            'sub_title' => 'Tambah Pembelian',
            'link_back' => site_url('buying/buy/'),
            'action_link' => site_url('buying/buy/do_add'),
            'kode' => $this->model->getkode(),
            'supplier' => $this->model->getSupplier(),
            'listpo'=>$this->model->getListPO()
        );

        $content = "add";
        $this->template->output($data,$content);
    }

    public function do_add()
    {
        $number = $this->input->post('number');
        $po = $this->input->post('po');
        $supplier = $this->input->post('supplier');
        $disc = $this->input->post('disc');
        $ppn = $this->input->post('ppn');
        $note = $this->input->post('note');
        $date = sistem_date($this->input->post('date'));
        $term = $this->input->post('term');
        $employee = $this->user_name();
        $due_date = sistem_date($this->input->post('due_date'));

        $data = array(
            'number'=>$number,
            'po'=>$po,
            'supplier'=>$supplier,
            'disc'=>$disc,
            'ppn'=>$ppn,
            'note'=>$note,
            'date'=>$date,
            'term'=>$term,
            'employee'=>$employee,
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
            'title' => 'Pembelian Barang',
            'sub_title' => 'Update Pembelian',
            'link_back' => site_url('buying/buy'),
            'action_link' => site_url('buying/buy/do_update'),
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
            'title' => 'Pembelian Barang',
            'sub_title' => 'Detail Pembelian',
            'link_add' => site_url('buying/buy/add'),
            'link_edit' => site_url('buying/buy/update/'),
            'link_delete' => site_url('buying/buy/delete'),
            'data' => $this->model->getId($id),
            'barang' => $this->model->getBarang(),
            'unit' => $this->model->getUnit(),
        );

//        return var_dump($data['data']);

        $content = "form";
        $this->template->output($data,$content);
    }

    public function addCart()
    {
        $buy = $this->input->post('buy');
        $item = $this->input->post('item');
        $qty = $this->input->post('qty');
        $unit = $this->input->post('unit');
        $piece = $this->input->post('piece');
        $price = $this->input->post('price');
        $total = $qty*$piece*$price;

        $data = array(
            'buy'=>$buy,
            'item'=>$item,
            'qty'=>$qty,
            'residue'=>$qty,
            'unit'=>$unit,
            'piece'=>$piece,
            'price'=>$price,
            'total'=>$total,
        );

        update_trans_buy($buy,array('grand_total'=>$total));
        //update stock
        savebarang($item,array('stock'=>$qty));

        $this->model->createDetail($data);
    }

    public function deleteCart($id)
    {
        $row = $this->model->getIdDetail($id);
        $data['stock'] = $row->qty;
        $item = $row->item;

        $idbuy = $row->buy;
        $grandtotal = $row->total;

//        return var_dump($row->total);

        //update trans buy
        update_trans_buy($idbuy,array('grand_total'=>$grandtotal),0);
        //update stock
        savebarang($item,$data,0);

        $this->model->deleteDetail($id);
    }

    public function listCart($id)
    {
        $data['idtransbuy'] = $id;
        $data['DPo'] = $this->model->getByBuy($id);
        foreach($data['DPo'] as $key=>$d)
        {
            $data['DPo'][$key]->barang = $this->model->getBarangById($d->item);
        }
        $data['buy'] = $this->model->getId($id);
        $data['unit'] = $this->model->getUnit();
//        return var_dump($data);
        $this->load->view('cart',$data);
    }

    public function print_po($id)
    {
        $data['po'] = $this->model->getId($id);

//        return var_dump($data);
        $this->load->view('cetak',$data);
    }

    public function notsent()
    {
        $data = array(
            'title' => 'Status Purchase Order',
            'sub_title' => 'Daftar Status PO',
            'link_accepted' => site_url('purchase/po/accepted/'),
            'link_disaccepted' => site_url('purchase/po/disaccepted/'),
            'data' => $this->model->getNotSent()
        );
        foreach($data['data'] as $key=>$row)
        {
            $data['data'][$key]->sup = $this->model->getIdSupplier($row->supplier);
            $data['data'][$key]->status = $row->accepted?'Terkirim':'Belum';
            $data['data'][$key]->disable = $row->accepted?'disabled':'';
            $data['data'][$key]->btn = $row->accepted?'btn-info':'btn-warning';
        }

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

    public function accepted($id)
    {
        $data['accepted'] ='1';
        $result = $this->model->update($id,$data);
        if($result)
        {
            redirect('purchase/po/notsent');
        }
    }

    public function disaccepted($id)
    {
        $data['accepted'] ='0';
        $result = $this->model->update($id,$data);
        if($result)
        {
            redirect('purchase/po/notsent');
        }
    }

    public function getprice_item($id)
    {
        $result = $this->model->getPrice($id);
        echo $result;
    }

    public function getSupplierByPO($id)
    {
        $result = $this->model->getSupplierByPO($id);
        echo $result[0]->supplier;
    }

    public function transiteItem($id,$idbuy)
    {
        $result = $this->model->getSupplierByPO($id);

        foreach($result[0]->poitem as $row)
        {
            $data = array(
                'buy'=>$idbuy,
                'item'=>$row->item,
                'qty'=>1,
                'residue'=>1,
                'piece'=>1,
                'price'=>1000,
                'total'=>1*1000
            );

            update_trans_buy($idbuy,array('grand_total'=>1000));

            savebarang($row->item,array('stock'=>1));

            $this->model->createDetail($data);
        }
    }

    public function multipleInsertCart()
    {
        $id = $this->input->post('iddetail');
        $iditem = $this->input->post('iditem');
        $qty = $this->input->post('qty');
        $unit = $this->input->post('unit');
        $piece = $this->input->post('piece');
        $price = $this->input->post('price');
        $grandtotal = $this->input->post('grandtotal');
        $idtransbuy = $this->input->post('idtransbuy');

//        return var_dump($grandtotal);


        for($i=0; $i<count($id); $i++)
        {
            $data = array(
                'qty'=>$qty[$i],
                'residue'=>$qty[$i],
                'unit'=>$unit[$i],
                'piece'=>$piece[$i],
                'price'=>$price[$i],
                'total'=>$price[$i]*($piece[$i]*$qty[$i])
            );

            $old = $this->model->getIdDetail($id[$i]);
            $qtydata = $old->qty;

            if($qty[$i]>$qtydata)
            {
                $stock = $qty[$i]-$qtydata;
                savebarang($iditem[$i],array('stock'=>$stock));
            }
            elseif($qty[$i]<$qtydata)
            {
                $stock = $qtydata-$qty[$i];
                savebarang($iditem[$i],array('stock'=>$stock),0);
            }

            $this->model->updateDetail($id[$i],$data);

        }

        $this->model->update($idtransbuy,array('grand_total'=>$grandtotal));

    }
}