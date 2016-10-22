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
    protected $dbuy = 'detail_buy';
    protected $member = 'm_member';

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

    public function getMemberByKode($kode)
    {
        $condition['kode']=$kode;
        $pagedata = $this->getData($this->member,$condition)->row();
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

    public function getCodeMember()
    {
        $pagedata = $this->get($this->member)->result();
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
        $kode = $this->getkodeunik($this->tsales,'P',7);
        return $kode;
    }

    public function getByIdTrans_Sales($id)
    {
        $condition['id']=$id;
        $result = $this->getData($this->tsales,$condition)->row();
        $result->detail = $this->getData($this->dsales,array('sales'=>$result->id))->result();
        foreach($result->detail as $key=>$row)
        {
            $result->detail[$key]->barang = $this->getId($row->item);
        }
        if($result)
        {
            return $result;
        }
        return [];
    }

    public function getByItemNotNullDetailBuy($id)
    {
        $condition['item']=$id;
        $condition['residue !='] = 0;
        $result = $this->getData($this->dbuy,$condition,'ASC')->result();
        if($result)
        {
            return $result;
        }
        return [];
    }

    public function updateResidueDetailBuy($id,$data)
    {
        $condition['id']=$id;
        $result = $this->updateData($this->dbuy,$data,$condition);
        if($result)
        {
            return TRUE;
        }
        return FALSE;
    }
}