<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 12/09/2016
 * Time: 23:05
 */
class Return_model extends Base_model
{
    protected $table = 'trans_return';

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
        $pagedata->detail = $this->getByTr($pagedata->id);

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
        $kode = $this->getkodeunik($this->table,'TR',7);
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

    public function getAllDTr()
    {
        $pagedata = $this->get('detail_return')->result();
        if($pagedata)
        {
            return $pagedata;
        }
        return [];
    }

    public function getIdDTr($id)
    {
        $condition['id']=$id;
        $pagedata = $this->getData('detail_return',$condition)->row();
        if($pagedata)
        {
            return $pagedata;
        }
        return [];
    }

    public function createDTr($data=array())
    {
        $query = $this->addData('detail_return',$data);
        if($query)
        {
            return TRUE;
        }
        return FALSE;
    }

    public function updateDTr($id,$data=array())
    {
        $condition['id'] = $id;
        $query = $this->updateData('detail_return',$data,$condition);
        if($query)
        {
            return TRUE;
        }
        return FALSE;
    }

    public function deleteDTr($id)
    {
        $condition['id']=$id;
        $query = $this->deleteData('detail_return',$condition);
        if($query)
        {
            return TRUE;
        }
        return FALSE;
    }

    public function getByTr($id_tr)
    {
        $condition['tr']=$id_tr;
        $pagedata = $this->getData('detail_return',$condition)->result();

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

    public function getStatusSent()
    {
        $pagedata = $this->get($this->table,'DESC','date')->result();
        foreach($pagedata as $key=>$row)
        {
            $pagedata[$key]->sup = $this->model->getIdSupplier($row->supplier);
            $pagedata[$key]->send = count($this->getData('detail_return',array('tr'=>$row->id,'come'=>1))->result());
            $pagedata[$key]->total = count($this->getData('detail_return',array('tr'=>$row->id))->result());
        }
        if($pagedata)
        {
            return $pagedata;
        }
        return [];
    }
}