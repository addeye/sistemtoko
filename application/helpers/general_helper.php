<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 15/09/2016
 * Time: 13:23
 */

if(! function_exists('rupiah'))
{
    function rupiah($nilai, $pecahan = 0)
    {
        return 'Rp. '.number_format($nilai, $pecahan, ',', '.');
    }
}

if(!function_exists('term'))
{
    function term()
    {
        return array(
            SISTEM_TOKO_TUNAI => 'Tunai',
            SISTEM_TOKO_HUTANG => 'Hutang'
        );
    }
}

