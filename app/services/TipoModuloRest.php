<?php

class TipoModuloRest extends GenericAPI
{

    public function __construct()
    {
        $this->model = $this->model('TipoModuloModel');
        $this->url = constant('RUTA_URL') . "/TipoModuloRest";
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