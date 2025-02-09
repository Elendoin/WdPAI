<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository{
    public function getUserByEmail($email) : ?User{

        $statement = $this->database->connect()->prepare("SELECT * FROM users WHERE email = :email");
        $statement->bindValue(':email', $email, PDO::PARAM_STR);
        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if($user == false){
            return null;
        }

        return new User('e', 'e', $user['email'], $user['password']);
    }
}