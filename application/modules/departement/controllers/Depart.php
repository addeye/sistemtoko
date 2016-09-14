<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 11/09/2016
 * Time: 22:52
 */
class Depart extends My_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('departement_model'=>'dm','sub_model'=>'sub_dm'));
        if(!$this->is_logged_in())
        {
            redirect('/');
        }
    }

    public function index()
    {
        $data['title'] = 'Departement';
        $data['sub_title'] = 'Tabel Departement';
        $data['depart'] = $this->dm->getAll();
        $content = "list";
        $this->template->output($data,$content);
    }

    public function add()
    {
        $data['title'] = 'Departement';
        $data['sub_title'] = 'Tambah Departement';
        $content = "add";
        $this->template->output($data,$content);
    }

    public function do_add()
    {
        $name = $this->input->post('name');
        $data['name'] = $name;
        $result = $this->dm->create($data);
        if($result)
        {
            alert();
            redirect('departement/depart');
        }
    }

    public function update($id)
    {
        $data['title'] = 'Departement';
        $data['sub_title'] = 'Update Departement';
        $data['depart'] = $this->dm->getId($id);
        $content = "update";
        $this->template->output($data,$content);
    }

    public function do_update()
    {
        $name = $this->input->post('name');
        $id = $this->input->post('id');

        $data['name'] = $name;
        $result = $this->dm->update($id,$data);
        if($result)
        {
            alert(2);
            redirect('departement/depart');
        }
    }

    public function delete($id)
    {
        $result = $this->dm->delete($id);
        if($result)
        {
            alert(3);
        }
    }

    public function sub($id)
    {
        $data['title'] = 'Sub Departement';
        $data['sub_title'] = 'Tabel Sub Departement';
        $data['subdepart'] = $this->sub_dm->getByDepartement($id);
        $data['iddepart'] = $id;
        $data['name_depart'] = $this->dm->getId($id)->name;
        $content = "sublist";
        $this->template->output($data,$content);
    }

    public function subadd($id)
    {
        $data['title'] = 'Sub Departement';
        $data['sub_title'] = 'Tambah Sub Departement';
        $data['iddepart'] = $id;
        $data['name_depart'] = $this->dm->getId($id)->name;
        $content = "subadd";
        $this->template->output($data,$content);
    }

    public function do_subadd()
    {
        $id_departement = $this->input->post('id_departement');
        $name = $this->input->post('name');
        $data = array(
            'id_departement' => $id_departement,
            'name' => $name
        );
        $result = $this->sub_dm->create($data);
        if($result)
        {
            alert();
            redirect('departement/depart/sub/'.$id_departement);
        }
    }

    public function subupdate($id,$subid)
    {
        $data['title'] = 'Sub Departement';
        $data['sub_title'] = 'Tambah Sub Departement';
        $data['iddepart'] = $id;
        $data['name_depart'] = $this->dm->getId($id)->name;
        $data['subdepart'] = $this->sub_dm->getId($subid);
        $content = "subupdate";
        $this->template->output($data,$content);
    }

    public function do_subupdate()
    {
        $id_departement = $this->input->post('id_departement');
        $name = $this->input->post('name');
        $id = $this->input->post('id');

        $data = array(
            'id_departement' => $id_departement,
            'name' => $name
        );
        $result = $this->sub_dm->update($id,$data);
        if($result)
        {
            alert(2);
            redirect('departement/depart/sub/'.$id_departement);
        }
    }

    public function subdelete($id)
    {
        $result = $this->sub_dm->delete($id);
        if($result)
        {
            alert(3);
        }
    }

    public function getkode()
    {
        $kode = $this->dm->getkode();
        return $kode;
    }
}