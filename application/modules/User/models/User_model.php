<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 01/09/2016
 * Time: 23:17
 */
class User_model extends Base_model
{
    protected $table = 'm_user';

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $user = $this->get($this->table)->result();
        foreach($user as $key=>$row)
        {
            $user[$key]->level = $this->getData('m_level',array('id'=>$row->level))->row();
        }
        if($user)
        {
            return $user;
        }
        return [];
    }

    public function getId($id)
    {
        $condition['id']=$id;
        $user = $this->getData($this->table,$condition)->row();
        $user[0]->level = $this->getData('m_level',array('id'=>$user->level))->row();
        if($user)
        {
            return $user;
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
}