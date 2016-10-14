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
        $this->load->model(array('inv_model'=>'model'));
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
}