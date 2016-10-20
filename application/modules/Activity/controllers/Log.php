<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 20/10/2016
 * Time: 10:27
 */
class Log extends My_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('activity_model'=>'model'));
    }

    public function index()
    {
        $data = array(
            'title' => 'Log Activity',
            'sub_title' => 'Tabel Activity',
            'log' => $this->model->getAll()
        );

        $content = "list";
        $this->template->output($data,$content);
    }
}