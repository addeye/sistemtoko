<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 20/10/2016
 * Time: 10:28
 */
class Activity_model extends Base_model
{
    protected $table = 'm_log';

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
}