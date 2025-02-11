<?php

require_once 'AppController.php';

Class DefaultController extends AppController{
    public function index(){
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }
        if($_SESSION['user'] === null){
            return $this->render('login');
        }
        return $this->render('browse');
    }

    public function dailyQuiz() {
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }
        if($_SESSION['user'] === null){
            header('Location: login');
        }
        return $this->render('browse');
    }

    public function upload() {
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }
        if($_SESSION['user'] === null){
            header('Location: login');
        }
        return $this->render('upload');
    }
}