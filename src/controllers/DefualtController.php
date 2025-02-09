<?php

require_once 'AppController.php';

Class DefaultController extends AppController{
    public function index(){
        $this->render('login');
    }

    public function franchises() {   
        $this->render('browse');
    }

    public function upload() {
        $this->render('upload');
    }


}