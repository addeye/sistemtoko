<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 12/09/2016
 * Time: 23:05
 */
class Purchase_model extends Base_model
{
    protected $table = 'trans_po';

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
        $kode = $this->getkodeunik($this->table,'PO',7);
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

    public function getAllDPo()
    {
        $pagedata = $this->get('detail_po')->result();
        if($pagedata)
        {
            return $pagedata;
        }
        return [];
    }

    public function getIdDPo($id)
    {
        $condition['id']=$id;
        $pagedata = $this->getData('detail_po',$condition)->row();
        if($pagedata)
        {
            return $pagedata;
        }
        return [];
    }

    public function createDPo($data=array())
    {
        $query = $this->addData('detail_po',$data);
        if($query)
        {
            return TRUE;
        }
        return FALSE;
    }

    public function updateDPo($id,$data=array())
    {
        $condition['id'] = $id;
        $query = $this->updateData('detail_po',$data,$condition);
        if($query)
        {
            return TRUE;
        }
        return FALSE;
    }

    public function deleteDPo($id)
    {
        $condition['id']=$id;
        $query = $this->deleteData('detail_po',$condition);
        if($query)
        {
            return TRUE;
        }
        return FALSE;
    }

    public function getByPo($id_po)
    {
        $condition['po']=$id_po;
        $pagedata = $this->getData('detail_po',$condition)->result();
        if($pagedata)
        {
            return $pagedata;
        }
        return [];
    }
}