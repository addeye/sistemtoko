<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 10/09/2016
 * Time: 22:10
 */
class Alert
{
    protected 	$ci;

    public function __construct()
    {
        $this->ci =& get_instance();
    }

    public function show($id=1)
    {
        switch($id)
        {
            case 0:
                $this->ci->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal Disimpan</div></div>");
                break;
            case 1:
                $this->ci->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Data berhasil disimpan</div></div>");
                break;
            case 2:
                $this->ci->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Data berhasil diupdate</div></div>");
                break;
        }
    }

}