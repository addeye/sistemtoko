<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 11/09/2016
 * Time: 22:40
 */
class Sub_model extends Base_model
{
    protected $sub_departement = 'm_subdepartement';

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $subdepartement = $this->get($this->sub_departement)->result();
        if($subdepartement)
        {
            return $subdepartement;
        }
        return [];
    }

    public function getId($id)
    {
        $condition['id']=$id;
        $subdepartement = $this->getData($this->sub_departement,$condition)->row();
        if($subdepartement)
        {
            return $subdepartement;
        }
        return [];
    }

    public function getByDepartement($id)
    {
        $condition['id_departement']=$id;
        $subdepartement = $this->getData($this->sub_departement,$condition)->result();
        if($subdepartement)
        {
            return $subdepartement;
        }
        return [];
    }

    public function create($data=array())
    {
        $query = $this->addData($this->sub_departement,$data);
        if($query)
        {
            return TRUE;
        }
        return FALSE;
    }

    public function update($id,$data=array())
    {
        $condition['id']=$id;
        $query = $this->updateData($this->sub_departement,$data,$condition);
        if($query)
        {
            return TRUE;
        }
        return FALSE;
    }

    public function delete($id)
    {
        $condition['id']=$id;
        $query = $this->deleteData($this->sub_departement,$condition);
        if($query)
        {
            return TRUE;
        }
        return FALSE;
    }
}