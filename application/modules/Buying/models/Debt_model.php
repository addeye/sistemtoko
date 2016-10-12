<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 12/10/2016
 * Time: 13:46
 */
class Debt_model extends Base_model
{
    protected $table='trans_buy';

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $condition['term'] =2;
        $result = $this->getData($this->table,$condition)->result();
        foreach($result as $key=>$val)
        {
            $result[$key]->sup = $this->getData('m_supplier',array('id'=>$val->supplier))->row();
            $result[$key]->status_hutang = $val->paid?'Lunas':'Belum';
            $result[$key]->button = $val->paid?'btn-success':'btn-danger';
        }
        if($result)
        {
            return $result;
        }
        return [];
    }

    public function getId($id)
    {
        $result = $this->getData($this->table,array('id'=>$id))->row();
        if($result)
        {
            return $result;
        }
        return [];
    }

    public function actPayOff($id,$val)
    {
        if($val)
        {
            $val=0;
            $this->updateData($this->table,array('paid'=>$val),array('id'=>$id));
        }
        else
        {
            $val=1;
            $this->updateData($this->table,array('paid'=>$val),array('id'=>$id));
        }
    }
}