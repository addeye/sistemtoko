<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 03/08/2016
 * Time: 8:37
 */
class Base_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get($table,$orderby='DESC')
    {
        $this->db->select("*");
        $this->db->from($table);
        $this->db->order_by($table.'.id', $orderby);
        return $this->db->get();
    }

    function getData($table, $condition,$orderby='DESC')
    {
        $this->db->where($condition);
        $this->db->select("*");
        $this->db->from($table);
        $this->db->order_by($table.'.id', $orderby);

        return $this->db->get();
    }

    function addData($table,$data)
    {
        $query = $this->db->insert($table, $data);
        if($query)
        {
            return TRUE;
        }

        return FALSE;
    }

    function updateData($table, $data, $condition)
    {
        $this->db->where($condition);
        $query = $this->db->update($table, $data);
        if($query)
        {
            return TRUE;
        }
        return FALSE;
    }

    function deleteData($table, $condition)
    {
        $this->db->where($condition);
        $query = $this->db->delete($table);
        if($query)
        {
            return TRUE;
        }
        return FALSE;
    }
}