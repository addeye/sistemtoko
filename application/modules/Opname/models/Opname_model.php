<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 18/10/2016
 * Time: 9:24
 */
class Opname_model extends Base_model
{
    protected $table = 'stock_opname';
    protected $barang = 'm_barang';

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $pagedata = $this->get($this->table)->result();
        foreach($pagedata as $key=>$row)
        {
            $pagedata[$key]->barang = $this->getBarangById($row->item);
        }
        if($pagedata)
        {
            return $pagedata;
        }
        return [];
    }

    public function getBarangById($id)
    {
        $condition['id'] = $id;
        $result = $this->getData($this->barang,$condition)->row();
        if($result)
        {
            return $result;
        }
        return [];
    }

    public function getBarangAll()
    {
        $result = $this->get($this->barang,'ASC')->result();
        if($result)
        {
            return $result;
        }
        return [];
    }

    public function getId($id)
    {
        $condition['id']=$id;
        $pagedata = $this->getData($this->table,$condition)->row();
        $pagedata->barang = $this->getBarangById($pagedata->item);
        if($pagedata)
        {
            return $pagedata;
        }
        return [];
    }

    public function getByItem($id)
    {
        $condition['item'] = $id;
        $result = $this->getData($this->table,$condition)->result();
        if($result)
        {
            return $result;
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
        $kode = $this->getkodeunik($this->table,'M');
        return $kode;
    }

    public function getBarangByFilter($from,$until)
    {
        $condition= array(
            'code >=' => $from,
            'code <=' => $until
        );
        $result = $this->getData($this->barang,$condition)->result();
        if($result)
        {
            return $result;
        }
        return [];
    }

}