<?php

class ModuloRest extends GenericAPI
{

    public function __construct()
    {
        $this->model = $this->model('ModuloModel');
        $this->url = constant('RUTA_URL') . "/ModuloRest";
    }

    public function findAll()
    {
        return parent::findAll();
    }

    public function findById($id)
    {
        return parent::findById($id);
    }

    public function findByRange($inicio, $maxResult)
    {
        return parent::findByRange($inicio, $maxResult);
    }

    public function create()
    {
        return parent::create();
    }

    public function update()
    {
        parent::update();
    }

    public function delete($id)
    {
        parent::delete($id);
    }


}