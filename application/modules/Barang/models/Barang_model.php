<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 12/09/2016
 * Time: 23:05
 */
class Barang_model extends Base_model
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
        $kode = $this->getkodeunik($this->table,'B',5);
        return $kode;
    }

    public function getSubDepart()
    {
        $result = $this->get('m_subdepart')->result();
        if($result)
        {
            return $result;
        }

        return [];
    }

    public function getAllSatuan()
    {
        $pagedata = $this->get('m_satuan')->result();
        if($pagedata)
        {
            return $pagedata;
        }
        return [];
    }

    public function getIdSatuan($id)
    {
        $condition['id']=$id;
        $pagedata = $this->getData('m_satuan',$condition)->row();
        if($pagedata)
        {
            return $pagedata;
        }
        return [];
    }

    public function createSatuan($data=array())
    {
        $query = $this->addData('m_satuan',$data);
        if($query)
        {
            return TRUE;
        }
        return FALSE;
    }

    public function updateSatuan($id,$data=array())
    {
        $condition['id'] = $id;
        $query = $this->updateData('m_satuan',$data,$condition);
        if($query)
        {
            return TRUE;
        }
        return FALSE;
    }

    public function deleteSatuan($id)
    {
        $condition['id']=$id;
        $query = $this->deleteData('m_satuan',$condition);
        if($query)
        {
            return TRUE;
        }
        return FALSE;
    }
}