<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 12/10/2016
 * Time: 22:23
 */
class Cart_model extends Base_model
{
    protected $table = 'm_barang';

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $pagedata = $this->get($this->table)->result();
        if($pagedata)
        {
            return $pagedata;
        }
        return [];
    }

    public function getId($id)
    {
        $condition['id']=$id;
        $pagedata = $this->getData($this->table,$condition)->row();
        if($pagedata)
        {
            return $pagedata;
        }
        return [];
    }

    public function getBarcode($code)
    {
        $condition['barcode']=$code;
        $pagedata = $this->getData($this->table,$condition)->row();
        if($pagedata)
        {
            return $pagedata;
        }
        return [];
    }

    public function getCode()
    {
        $condition['barcode !='] = '';
        $pagedata = $this->getData($this->table,$condition)->result();
        if($pagedata)
        {
            return $pagedata;
        }
        return [];
    }
}