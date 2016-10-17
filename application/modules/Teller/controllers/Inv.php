<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 14/10/2016
 * Time: 10:21
 */
class Inv extends My_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('inv_model'=>'model','history_model'=>'history'));
    }

    public function index()
    {
        $data['title'] = "Inventory";
        $content = "inv/list";
        $data['barang'] = $this->model->getAll();
        $data['judule'] = "INVENTORY";
        $data['user_name'] = $this->user_name();
        $this->kasirweb->output($data, $content);
    }

    public function history()
    {
        $data['title'] = "History";
        $content = "history/list";
        $data['trans'] = $this->history->getAllTransSalesByEmployee($this->user_id());
        $data['judule'] = "HISTORY";
        $data['edit'] = site_url('teller/inv/edit_history');
        $data['user_name'] = $this->user_name();
        $this->kasirweb->output($data, $content);
    }

    public function edit_history($id)
    {
        $data['title'] = "Update Transaksi";
        $content = "history/detail";
        $data['judule'] = "UPDATE";
        $data['detail'] = $this->history->getDetailBySales($id);
        $data['user_name'] = $this->user_name();
        $data['link_back'] = site_url('teller/inv/history');

        $this->kasirweb->output($data, $content);
    }
}