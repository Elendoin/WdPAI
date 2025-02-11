<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository{
    public function getUserByEmail($email) : ?User{

        $statement = $this->database->connect()->prepare("SELECT * FROM users WHERE email = :email");
        $statement->bindValue(':email', $email, PDO::PARAM_STR);
        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_ASSOC);
        $id = $user['id_user_details'];

        $statement = $this->database->connect()->prepare("SELECT * FROM user_details WHERE id = :id");
        $statement->bindValue(':id', $id, PDO::PARAM_STR);
        $statement->execute();

        $userDetails = $statement->fetch(PDO::FETCH_ASSOC);

        if($user == false){
            return null;
        }

        return new User($userDetails['name'], $userDetails['surname'], $user['email'], $user['password']);
    }

    public function addUser(User $user) : void{
        $statement = $this->database->connect()->prepare("INSERT INTO user_details (name, surname) VALUES (?, ?)");
        $statement->execute([$user->getName(), $user->getSurname()]);

        $yesterday = date('Y-m-d', strtotime('-1 day'));
        $statement = $this->database->connect()->prepare("INSERT INTO user_stats (last_answered) VALUES (?)");
        $statement->execute([$yesterday]);

        $statement = $this->database->connect()->prepare("SELECT MAX(id) FROM user_details");
        $statement->execute();
        $maxDetailsId = $statement->fetchColumn();

        $statement = $this->database->connect()->prepare("SELECT MAX(id) FROM user_stats");
        $statement->execute();
        $maxStatsId = $statement->fetchColumn();

        $statement = $this->database->connect()->prepare("INSERT INTO users
        (email, password, id_user_details, id_user_stats) 
        VALUES (?, ?, ?, ?)");

        $statement->execute(
            [$user->getEmail(), $user->getPassword(), $maxDetailsId, $maxStatsId]
        );
    }

    public function getId(User $user) : int{
        $statement = $this->database->connect()->prepare("SELECT id FROM users WHERE email = :email");
        $statement->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetchColumn();
    }
    public function getUserStatsId(User $user) : int{
        $statement = $this->database->connect()->prepare("SELECT id_user_stats FROM users WHERE email = :email");
        $statement->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetchColumn();
    }

    public function playedToday(int $id_user_stats): bool{
        $statement = $this->database->connect()->prepare("SELECT last_answered FROM
                                                                user_stats WHERE id = :id");
        $statement->bindValue(':id', $id_user_stats, PDO::PARAM_INT);
        $statement->execute();

        $lastAnswered = $statement->fetchColumn();

        if($lastAnswered === date("Y-m-d")){
            return true;
        }
        else{
            return false;
        }
    }

    public function incrementWin($id){
        $statement = $this->database->connect()->prepare(
            "UPDATE user_stats SET wins = wins + 1, last_answered = current_date WHERE id = :id");
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();
    }

    public function incrementLosses($id){
        $statement = $this->database->connect()->prepare(
            "UPDATE user_stats SET losses = losses + 1, last_answered = current_date WHERE id = :id");
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();
    }

    public function getWins(User $user): int{
        $id = $this->getUserStatsId($user);
        $statement = $this->database->connect()->prepare("SELECT wins FROM user_stats WHERE id = :id");
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $wins = $statement->fetchColumn();

        return $wins;
    }

    public function getLosses(User $user): int{
        $id = $this->getUserStatsId($user);
        $statement = $this->database->connect()->prepare("SELECT losses FROM user_stats WHERE id = :id");
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $wins = $statement->fetchColumn();

        return $wins;
    }
}