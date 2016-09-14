<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 11/09/2016
 * Time: 22:28
 */
class Departement_model extends Base_model
{
    protected $departement = 'm_departement';

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $departement = $this->get($this->departement)->result();
        if($departement)
        {
            return $departement;
        }
        return [];
    }

    public function getId($id)
    {
        $condition['id']=$id;
        $departement = $this->getData($this->departement,$condition)->row();
        if($departement)
        {
            return $departement;
        }
        return [];
    }

    public function create($data=array())
    {
        $query = $this->addData($this->departement,$data);
        if($query)
        {
            return TRUE;
        }
        return FALSE;
    }

    public function update($id,$data=array())
    {
        $condition['id']=$id;
        $query = $this->updateData($this->departement,$data,$condition);
        if($query)
        {
            return TRUE;
        }
        return FALSE;
    }

    public function delete($id)
    {
        $condition['id']=$id;
        $query = $this->deleteData($this->departement,$condition);
        if($query)
        {
            return TRUE;
        }
        return FALSE;
    }

    public function getkode()
    {
        $kode = $this->getkodeunik($this->departement,'DP');
        return $kode;
    }
}