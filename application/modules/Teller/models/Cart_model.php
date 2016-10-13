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
    protected $tsales = 'trans_sales';
    protected $dsales = 'detail_sales';

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

    public function updateItem($id,$data=array())
    {
        $condition['id'] = $id;
        $query = $this->updateData($this->table,$data,$condition);
        if($query)
        {
            return TRUE;
        }
        return FALSE;
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

    public function getByCode($code)
    {
        $condition['code']=$code;
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

    public function create($data=array())
    {
        $query = $this->addData($this->tsales,$data);

        if($query)
        {
            return TRUE;
        }
        return FALSE;
    }

    public function insertId()
    {
        return $this->getLastInsertId();
    }


    public function createDetail($data=array())
    {
        $result = $this->addData($this->dsales,$data);
        if($result)
        {
            return TRUE;
        }
        return FALSE;
    }

    public function getkode()
    {
        $kode = $this->getkodeunik($this->table,'P');
        return $kode;
    }
}