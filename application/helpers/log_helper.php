<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 10/09/2016
 * Time: 22:30
 */
if(!function_exists('helper_log'))
{
    function helper_log($tipe = "", $str = "")
    {
        $CI = & get_instance();

        if (strtolower($tipe) == "login"){
            $log_tipe   = 0;
        }
        elseif(strtolower($tipe) == "logout")
        {
            $log_tipe   = 1;
        }
        elseif(strtolower($tipe) == "add"){
            $log_tipe   = 2;
        }
        elseif(strtolower($tipe) == "edit"){
            $log_tipe  = 3;
        }
        else{
            $log_tipe  = 4;
        }

        // paramter
        $param['log_user']      = $CI->session->userdata('username');
        $param['log_tipe']      = $log_tipe;
        $param['log_desc']      = $str;

        //load model log
        $CI->load->model('m_log');

        //save to database
        $CI->m_log->save_log($param);

    }
}
