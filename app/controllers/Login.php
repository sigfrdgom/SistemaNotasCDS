<?php

class Login extends Controller
{

    public function index(){

        $datos = [];
        $this->view('pages/login/login', $datos);
    }

}