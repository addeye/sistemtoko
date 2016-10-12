<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 12/10/2016
 * Time: 22:16
 */
class Kasirweb
{
    protected 	$ci;

    public function __construct()
    {
        $this->ci =& get_instance();
    }

    public function output($data=null, $content)
    {
        $this->ci->load->view('kasirweb/template/head', $data);
        $this->ci->load->view('kasirweb/template/nav', $data);
        $this->ci->load->view($content, $data);
        $this->ci->load->view('kasirweb/template/foot', $data);
    }
}