<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 12/10/2016
 * Time: 13:45
 */
class Debt extends My_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('debt_model'=>'model'));
    }

    public function index()
    {
        $data = array(
            'title' => 'Pelunasan Hutang',
            'sub_title' => 'Tabel Transaksi',
            'link_pay' => site_url('buying/debt/act_payoff'),

            'data' => $this->model->getAll()
        );

        $content = "debt/list";
        $this->template->output($data,$content);
    }

    public function act_payoff($id)
    {
        $data = $this->model->getId($id);
        $val = $data->paid;

        $result = $this->model->actPayOff($id,$val);
        if($result)
        {
            return TRUE;
        }
        return FALSE;
    }
}