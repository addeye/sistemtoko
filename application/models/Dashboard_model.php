<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 21/10/2016
 * Time: 10:07
 */
class Dashboard_model extends Base_model
{
    protected $tsales = 'trans_sales';
    protected $dpo = 'detail_po';
    protected $tbuy = 'trans_buy';
    protected $dbuy = 'detail_buy';

    public function __construct()
    {
        parent::__construct();
    }

    public function getTransSalesByLast30Day()
    {
        $condition['date <='] = date('Y-m-d',strtotime("+1 days"));
        $condition['date >='] = date('Y-m-d', strtotime("-30 days"));

        $result = $this->getData($this->tsales,$condition)->result();
        if($result)
        {
            return $result;
        }
        return [];
    }

    public function getInvoiceNotSend()
    {
        $condition['come'] = '0';

        $result = $this->getData($this->dpo,$condition)->result();
        if($result)
        {
            return count($result);
        }
        return 0;
    }

    public function getTransBuyByLast30Day()
    {
        $total = array();
        $condition['date <='] = date('Y-m-d',strtotime("+1 days"));
        $condition['date >='] = date('Y-m-d', strtotime("-30 days"));

        $result = $this->getData($this->tbuy,$condition)->result();
        foreach($result as $key=>$row)
        {
            $data = $this->getData($this->dbuy,array('buy'=>$row->id))->result();
            foreach($data as $value)
            {
                $total[] = $value->total;
            }
        }

        $result = array_sum($total);


        if($result)
        {
            return $result;
        }

        return 0;

    }

    public function getTotalKredit()
    {
        $condition['term'] = '2';
        $condition['paid'] = '0';
        $total = array();

        $result = $this->getData($this->tbuy,$condition)->result();

        foreach($result as $key=>$row)
        {
            $data = $this->getData($this->dbuy,array('buy'=>$row->id))->result();
            foreach($data as $value)
            {
                $total[] = $value->total;
            }
        }

        $result = array_sum($total);

        if($result)
        {
            return $result;
        }
        return 0;
    }

    public function getGroupBySales()
    {
        $result = $this->groupBy($this->tsales)->result();
        if($result)
        {
            return $result;
        }
        return [];
    }

    public function getGroupByBuy()
    {
        $result = $this->groupBy($this->tbuy)->result();
        if($result)
        {
            return $result;
        }
        return [];
    }
}