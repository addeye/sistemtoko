<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 12/09/2016
 * Time: 23:05
 */
class Buying_model extends Base_model
{
    protected $table = 'trans_buy';
    protected $table_detail = 'detail_buy';

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $pagedata = $this->get($this->table)->result();
        foreach($pagedata as $key=>$row)
        {
            $pagedata[$key]->sup = $this->model->getIdSupplier($row->supplier);
        }
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
        $pagedata->supp = $this->getData('m_supplier',array('id'=>$pagedata->supplier))->row();
        $pagedata->detail = $this->getByBuy($pagedata->id);
        $pagedata->po = $this->getSupplierByPO($pagedata->po);

        if($pagedata)
        {
            return $pagedata;
        }
        return [];
    }

    public function create($data=array())
    {
        $query = $this->addData($this->table,$data);
        if($query)
        {
            return TRUE;
        }
        return FALSE;
    }

    public function update($id,$data=array())
    {
        $condition['id'] = $id;
        $query = $this->updateData($this->table,$data,$condition);
        if($query)
        {
            return TRUE;
        }
        return FALSE;
    }

    public function delete($id)
    {
        $condition['id']=$id;
        $query = $this->deleteData($this->table,$condition);
        if($query)
        {
            return TRUE;
        }
        return FALSE;
    }

    public function getkode()
    {
        $kode = $this->getkodeunik($this->table,'TB',8);
        return $kode;
    }

    public function getSupplier()
    {
        $result = $this->get('m_supplier')->result();
        if($result)
        {
            return $result;
        }
        return [];
    }
    public function getIdSupplier($id)
    {
        $condition['id'] = $id;
        $result = $this->getData('m_supplier',$condition)->row();
        if($result)
        {
            return $result;
        }
        return [];
    }

    public function getBarang()
    {
        $result = $this->get('m_barang')->result();
        if($result)
        {
            return $result;
        }
        return [];
    }

    public function getBarangById($id)
    {
        $condition['id'] = $id;
        $result = $this->getData('m_barang',$condition)->row();
        if($result)
        {
            return $result;
        }
        return [];
    }

    public function getUnit()
    {
        $result = $this->get('m_satuan')->result();
        if($result)
        {
            return $result;
        }
        return [];
    }

    public function getAllDetail()
    {
        $pagedata = $this->get($this->table_detail)->result();
        if($pagedata)
        {
            return $pagedata;
        }
        return [];
    }

    public function getIdDetail($id)
    {
        $condition['id']=$id;
        $pagedata = $this->getData($this->table_detail,$condition)->row();
        if($pagedata)
        {
            return $pagedata;
        }
        return [];
    }

    public function createDetail($data=array())
    {
        $query = $this->addData($this->table_detail,$data);
        if($query)
        {
            return TRUE;
        }
        return FALSE;
    }

    public function updateDetail($id,$data=array())
    {
        $condition['id'] = $id;
        $query = $this->updateData($this->table_detail,$data,$condition);
        if($query)
        {
            return TRUE;
        }
        return FALSE;
    }

    public function deleteDetail($id)
    {
        $condition['id']=$id;
        $query = $this->deleteData($this->table_detail,$condition);
        if($query)
        {
            return TRUE;
        }
        return FALSE;
    }

    public function getByBuy($id_buy)
    {
        $condition['buy']=$id_buy;
        $pagedata = $this->getData($this->table_detail,$condition)->result();

        foreach($pagedata as $key=>$row)
        {
            $pagedata[$key]->items = $this->getData('m_barang',array('id'=>$row->item))->row();
        }
        if($pagedata)
        {
            return $pagedata;
        }
        return [];
    }

    public function getNotSent()
    {
        $pagedata = $this->get($this->table,'DESC','date')->result();
        foreach($pagedata as $key=>$row)
        {
            $pagedata[$key]->sup = $this->model->getIdSupplier($row->supplier);
        }
        if($pagedata)
        {
            return $pagedata;
        }
        return [];
    }

    public function getPrice($id)
    {
        $result = $this->getData('m_barang',array('id'=>$id))->row();
        if($result)
        {
            return $result->buy_price;
        }

        return 0;
    }

    public function getListPO()
    {
        $pagedata = $this->get('trans_po')->result();
        if($pagedata)
        {
            return $pagedata;
        }
        return [];
    }

    public function getSupplierByPO($id)
    {
        $pagedata = $this->getData('trans_po',array('id'=>$id))->result();
        foreach($pagedata as $key=>$row)
        {
            $pagedata[$key]->poitem = $this->getData('detail_po',array('po'=>$row->id))->result();
        }
        if($pagedata)
        {
            return $pagedata;
        }
        return [];
    }
}