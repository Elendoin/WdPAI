<?php

require_once 'AppController.php';
require_once 'SecurityController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController{
    public function login(){
        if(!$this->isPost()){
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        $userRepository = new UserRepository();
        $user = $userRepository->getUserByEmail($_POST['email']);

        if(!$user){
            return $this->render('login', ['messages' => ['User doesnt exist!']]);
        }

        if($user->getEmail() != $email){
            return $this->render('login', ['messages' => ['Wrong email!']]);
        }
        if($user->getPassword() != $password){
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

        return $this->render('browse');
        die();
    }
}