<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 10/09/2016
 * Time: 21:37
 */

if(! function_exists('alert'))
{
    function alert($success=1)
    {
        switch($success)
        {
            case 0:
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal Disimpan</div></div>");
                break;
            case 1:
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Data berhasil disimpan</div></div>");
                break;
            case 2:
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Data berhasil diupdate</div></div>");
                break;
        }
    }
}