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

        $data['title'] = "Minimarket Versi 1";
        $data['judule'] = "Gowonan Market";
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

        foreach ($this->cart->contents() as $items){
            $kode = $get->code;
            if($items['id'] == $kode){
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
            if($jml == 0){
                /*
                echo "<script>
                alert('Id barang yang dimasukan tidak ada!');
                </script>";
                */
            }else{

                    $data = array(
                        'id'      => $get->code,
                        'qty'     => 1,
                        'price'   => $get->sale_price,
                        'name'    => $get->name
                    );
                    $this->cart->insert($data);


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
        $this->load->helper('date');
        $datestring = "%Y-%m-%d";

        $tgl = mdate($datestring);
        $table = "penjualan";
        $table_2 = "barang";
        foreach ($this->cart->contents() as $insert){
            $total = $insert['price']*$insert['qty'];
            $data = array(
                'id_barang' => $insert['id'],
                'qty' => $insert['qty'],
                'total_harga' => $total,
                'tgl' => $tgl
            );

            $this->myigniter_model->addData($table, $data);
            $condition['id']=$insert['id'];

            $selectbarang = $this->myigniter_model->getData($table_2,$condition);
            $selectbarang = $selectbarang->row();
            $stok_barang = $selectbarang->stok;

            $data_up = array(
                'stok' => $stok_barang - $insert['qty']
            );

            $this->myigniter_model->updateData($table_2,$data_up,$condition);
        }
        $this->cart->destroy();
        redirect('myigniter');
    }
}