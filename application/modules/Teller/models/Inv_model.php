<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 14/10/2016
 * Time: 10:22
 */
class Inv_model extends Base_model
{
    protected $barang = 'm_barang';

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $pagedata = $this->get($this->barang)->result();
        if($pagedata)
        {
            return $pagedata;
        }
        return [];
    }
}