<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 12/09/2016
 * Time: 23:09
 */
class Brg extends My_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('barang_model'=>'model'));
    }

    public function index()
    {
        $data = array(
            'title' => 'Barang',
            'sub_title' => 'Tabel Barang',
            'link_add' => site_url('barang/brg/add'),
            'link_edit' => site_url('barang/brg/update/'),
            'link_delete' => site_url('barang/brg/delete'),
        );

        $jml = $this->model->getAll();


        //pengaturan pagination
        $config['base_url'] = base_url().'barang/brg/index/';
        $config['total_rows'] = count($jml);


        // $config['base_url'] = '';
        $config['per_page'] = 10;
//        $choice = $config["total_rows"] / $config["per_page"];
//        $config["num_links"] = floor($choice);

//        $config['query_string_segment'] = 'page';
        /* This Application Must Be Used With BootStrap 3 *  */
//        $config['query_string_segment'] = 'start';

        $config['full_tag_open'] = '<nav arial-label="Page navigation"><ul class="pagination" style="margin-top:0px">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

//        $config['display_pages'] = FALSE;
//
        $config['anchor_class'] = 'follow_link';
        $from = $this->uri->segment(4);

//        return var_dump($from);


        //inisialisasi config
        $this->pagination->initialize($config);

        //buat pagination
        $data['halaman'] = $this->pagination->create_links();

        //tamplikan data
        $data['barang'] = $this->model->getPaggingData($config['per_page'],$from);

        foreach($data['barang'] as $key=>$row)
        {
            $data['barang'][$key]->harga_beli = rupiah($row->buy_price);
            $data['barang'][$key]->harga_jual = rupiah($row->sale_price);
        }

        $content = "list";
        $this->template->output($data,$content);
    }

    public function add()
    {
        $data = array(
            'title' => 'Barang',
            'sub_title' => 'Tambah Barang',
            'link_back' => site_url('barang/brg'),
            'action_link' => site_url('barang/brg/do_add'),
            'kode' => $this->model->getkode(),
            'category' => $this->model->getSubDepart(),
        );

        $content = "add";
        $this->template->output($data,$content);
    }

    public function do_add()
    {
        $code = $this->input->post('code');
        $barcode = $this->input->post('barcode');
        $name = $this->input->post('name');
        $buy_price = $this->input->post('buy_price');
        $sale_price = $this->input->post('sale_price');
        $stock = $this->input->post('stock');
        $category = $this->input->post('category');

        $data = array(
            'code'=>$code,
            'barcode'=>$barcode,
            'name'=>$name,
            'buy_price'=>$buy_price,
            'sale_price'=>$sale_price,
            'stock'=>$stock,
            'category'=>$category,
        );

        $result = $this->model->create($data);
        if($result)
        {
            alert();
            helper_log('add','menambahkan data barang '.$name);
            redirect('barang/brg');
        }
    }

    public function update($id)
    {
        $data = array(
            'title' => 'Barang',
            'sub_title' => 'Update Barang',
            'link_back' => site_url('barang/brg'),
            'action_link' => site_url('barang/brg/do_update'),
            'barang' => $this->model->getId($id),
            'category' => $this->model->getSubDepart(),
        );

        $content = "update";
        $this->template->output($data,$content);
    }

    public function do_update()
    {
        $code = $this->input->post('code');
        $barcode = $this->input->post('barcode');
        $name = $this->input->post('name');
        $buy_price = $this->input->post('buy_price');
        $sale_price = $this->input->post('sale_price');
        $stock = $this->input->post('stock');
        $id = $this->input->post('id');

        $data = array(
            'code'=>$code,
            'barcode'=>$barcode,
            'name'=>$name,
            'buy_price'=>$buy_price,
            'sale_price'=>$sale_price,
            'stock'=>$stock,
        );
        $condition['id']= $id;
        $result = $this->model->update($id,$data);
        if($result)
        {
            alert(2);
            helper_log('edit','update data barang '.$name);
            redirect('barang/brg');
        }
    }

    public function delete($id)
    {
        $data = $this->model->getId($id);
        helper_log('delete','delete data barang '.$data->name);

        $result = $this->model->delete($id);
        if($result)
        {

            alert(3);
        }
    }

    public function satuan()
    {
        $data = array(
            'title' => 'Satuan',
            'sub_title' => 'Tabel Satuan',
            'link_add' => site_url('barang/brg/add_satuan'),
            'link_edit' => site_url('barang/brg/update_satuan/'),
            'link_delete' => site_url('barang/brg/delete_satuan'),
        );
        $data['satuan'] = $this->model->getAllSatuan();
        $content = "list_satuan";
        $this->template->output($data,$content);
    }

    public function add_satuan()
    {
        $data = array(
            'title' => 'Satuan',
            'sub_title' => 'Tambah Satuan',
            'link_back' => site_url('barang/brg/satuan'),
            'action_link' => site_url('barang/brg/do_add_satuan'),
        );

        $content = "add_satuan";
        $this->template->output($data,$content);
    }

    public function do_add_satuan()
    {
        $name = $this->input->post('name');

        $data = array(
            'name'=>$name,
        );

        $result = $this->model->createSatuan($data);
        if($result)
        {
            alert();
            redirect('barang/brg/satuan');
        }
    }

    public function update_satuan($id)
    {
        $data = array(
            'title' => 'Satuan',
            'sub_title' => 'Update Satuan',
            'link_back' => site_url('barang/brg/satuan'),
            'action_link' => site_url('barang/brg/do_update_satuan'),
            'satuan' => $this->model->getIdSatuan($id),
        );

        $content = "update_satuan";
        $this->template->output($data,$content);
    }

    public function do_update_satuan()
    {
        $name = $this->input->post('name');
        $id = $this->input->post('id');

        $data = array(
            'name'=>$name,
        );
        $condition['id']= $id;
        $result = $this->model->updateSatuan($id,$data);
        if($result)
        {
            alert(2);
            redirect('barang/brg/satuan');
        }
    }

    public function delete_satuan($id)
    {
        $result = $this->model->deleteSatuan($id);
        if($result)
        {
            alert(3);
        }
    }
}