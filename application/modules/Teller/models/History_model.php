<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 17/10/2016
 * Time: 0:04
 */
class History_model extends Base_model
{
    protected $tsales = 'trans_sales';
    protected $dsales = 'detail_sales';
    protected $mbarang = 'm_barang';

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllTransSalesByEmployee($iduser)
    {
        $condition['employee'] = $iduser;
        $result = $this->getData($this->tsales,$condition)->result();
        foreach($result as $key=>$row)
        {
            $result[$key]->detail = $this->getDetailBySales($row->id);
        }
        if($result)
        {
            return $result;
        }
        return [];
    }

    public function getDetailBySales($id)
    {
        $condition['sales']=$id;
        $result = $this->getData($this->dsales,$condition)->result();
        foreach($result as $key=>$row)
        {
            $result[$key]->item_detail = $this->getBarangById($row->item);
        }
        if($result)
        {
            return $result;
        }
        return [];
    }

    public function getBarangById($id)
    {
        $condition['id']=$id;
        $result = $this->getData($this->mbarang,$condition)->row();
        if($result)
        {
            return $result;
        }
        return [];
    }
}