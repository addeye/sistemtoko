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
}