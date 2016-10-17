<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 12/10/2016
 * Time: 22:22
 */
class Cart extends My_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('cart');
        $this->load->model(array('cart_model'=>'model'));
    }

    public function index()
    {
        $data['cari'] = $this->model->getCode();
        $data['member'] = $this->model->getCodeMember();

        $data['title'] = "Minimarket Versi 1";
        $data['judule'] = "Toko Rachmad";
        $data['user_name'] = $this->user_name();
        $content = "cart";
        $this->kasirweb->output($data, $content);
    }

    public function daftarkeranjang()
    {
        $this->load->view('cart_view');
    }

    public function total()
    {
        echo $this->cart->total();
    }

    public function pluscart($id)
    {
        foreach ($this->cart->contents() as $items){
            $kode = $id;
            if($items['id'] == $kode){
                $total = $items['qty'] + 1;
                $data = array(
                    'rowid'   => $items['rowid'],
                    'qty'     => $total
                );
                $this->cart->update($data);
                break;
            }
        }
    }

    public function minuscart($id)
    {
        foreach ($this->cart->contents() as $items){
            $kode = $id;
            if($items['id'] == $kode){
                $total = $items['qty'] - 1;
                $data = array(
                    'rowid'   => $items['rowid'],
                    'qty'     => $total
                );
                $this->cart->update($data);
                break;
            }
        }
    }

    public function keranjang($barcode)
    {
        $get = $this->model->getBarcode($barcode);
        $jml = count($get);
        $tambah = TRUE;
//        return var_dump($get);

        foreach ($this->cart->contents() as $items){
            $kode = $get->code;
            if($items['id'] === $kode){
                $total = $items['qty'] + 1;
                $data = array(
                    'rowid'   => $items['rowid'],
                    'qty'     => $total
                );
                $this->cart->update($data);
                $tambah = FALSE;
                break;
            }
        }

        if($tambah){
            if($jml == 0)
            {

                echo "<script>
                alert('Id barang yang dimasukan tidak ada!');
                </script>";

            }else
            {

                    $data = array(
                        'id'      => $get->code,
                        'qty'     => 1,
                        'price'   => $get->sale_price,
                        'name'    => $get->name
                    );
                $this->cart->product_name_rules = '[:print:]';
                $result = $this->cart->insert($data);
                var_dump($data);

                var_dump($result);


            }
        }
    }

    public function client()
    {
        $this->load->view('client_teller');
    }

    public function penjualan()
    {
        $table = "penjualan";
        $data['penjualan'] = $this->myigniter_model->total_per();

        $data['title'] = "penjualan";
        $content = "penjualan";
        $data['judule'] = "PENJUALAN";
        $this->template->output($data, $content);
    }

    public function setoran()
    {
        $table = "penjualan";
        $condition['setor'] = '0';
        $data['setoran'] = $this->myigniter_model->setoran($table, $condition);

        $data['title'] = "Penyetoran";
        $content = "setoran";
        $data['judule'] = "SETORAN";
        $this->template->output($data, $content);
    }

    public function setoranSubmit()
    {
        $this->load->helper('date');
        $datestring = "%Y-%m-%d";
        $tgl = mdate($datestring);

        $tgl_jual = $this->input->post('tgljual');
        $tablePenjualan = "penjualan";
        $condition['tgl'] = $tgl_jual;
        $selectTotal = $this->myigniter_model->totalSetor($tablePenjualan, $condition);
        foreach ($selectTotal->result() as $tot) {
            $total_jual = $tot->total_harga;
            $total_setor = $this->input->post('setor');
            $selisih = $total_setor - $total_jual;
            $table = "setor";
            $data = array(
                'penyetor' => $this->input->post('nama') ,
                'tgl_jual' => $tgl_jual ,
                'tgl_setor' => $tgl ,
                'total_jual' => $total_jual,
                'total_setor' => $total_setor,
                'selisih' => $selisih
            );
            $this->myigniter_model->addData($table, $data);
        }
        $data = array('setor' => 1, );
        $updatePenjualan = $this->myigniter_model->updateData($tablePenjualan, $data, $condition);

        redirect('myigniter/setoran','refresh');
    }

    public function deleterow($id)
    {
        $data = array(
            'rowid'   => $id,
            'qty'     => 0
        );

        $this->cart->update($data);
        redirect('teller/cart');
    }
    public function delete()
    {
        $this->cart->destroy();
        redirect('teller/cart');
    }

    public function selesai()
    {
        $number = $this->model->getkode();
        $employee = $this->user_id();
        $member = $this->input->post('member');
        $grandtotal = $this->input->post('grandtotal');
        $cash = $this->input->post('cash');

        $rowmember = $this->model->getMemberByKode($member);
//        return var_dump(count($rowmember));

        if(!count($rowmember))
        {
            $memberid = 0;
        } else
        {
            $memberid = $rowmember->id;
        }


        $dataTrans=array(
            'number'=>$number,
            'employee' => $employee,
            'member' => $memberid,
            'grand_total' => $grandtotal,
            'cash' => $cash
        );

        $result = $this->model->create($dataTrans);
        $last_id = $this->model->insertId();

        if($result)
        {
            $sales = $this->model->insertId();
            foreach($this->cart->contents() as $insert)
            {
                $total = $insert['price']*$insert['qty'];
                $code = $insert['id'];
                $pageData = $this->model->getByCode($code);

                $dataDetail = array(
                    'sales' => $sales,
                    'item' => $pageData->id,
                    'qty' => $insert['qty'],
                    'price' => $insert['price'],
                    'total' => $total,
                );

                $dquery = $this->model->createDetail($dataDetail);
                if($dquery)
                {
                    $dataItem=array(
                        'stock' => $pageData->stock - $insert['qty'],
                    );

                    $this->model->updateItem($pageData->id,$dataItem);
                }

            }

        }
        $this->cart->destroy();
//        redirect('teller/cart');
        echo $last_id;
    }

    public function print_struck($id)
    {
        $pagedata['user_name'] = $this->user_name();
        $pagedata['struck'] = $this->model->getByIdTrans_Sales($id);

        $this->load->view('print_struck',$pagedata);
    }
}