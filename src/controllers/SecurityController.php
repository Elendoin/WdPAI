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

        session_save_path('../tmp');
        session_set_cookie_params([
            'lifetime' => 600,
            'path' => '../tmp',
            'samesite' => 'Lax'
        ]);
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }

        if($_SESSION['user'] !== null){
            return $this->render('browse');
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

        $_SESSION['user'] = $user;

        header('Location: /dailyQuiz');
        exit();
    }

    public function register(){
        if(!$this->isPost()){
            return $this->render('register');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $userRepository = new UserRepository();

        if($email == '' || $password == '' || $name == '' || $surname == ''){
            return $this->render('register', ['messages' => ['All fields are required!']]);
        }

        $user = new User($name, $surname, $email, $password);

        if(!$user){
            return null;
        }

        $userRepository->addUser($user);

        return $this->render('login');
    }

    public function logout(){
        if(!$this->isPost()){
            return $this->render('browse');
        }


        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }
        session_destroy();
        return $this->render('login');
    }
}