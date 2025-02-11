<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/SuggestionRepository.php';

class SuggestionRepository extends Repository{
    public function getSuggestion(int $id) : ?Suggestion{

        $statement = $this->database->connect()->prepare("SELECT * FROM suggestions WHERE id = :id");
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $suggestion = $statement->fetch(PDO::FETCH_ASSOC);

        if($suggestion == false){
            return null;
        }

        return new Suggestion($suggestion['title'], $suggestion['description'], $suggestion['image']);
    }

    public function getSuggestionByTitle(string $title) {
        $title = '%'.strtolower($title).'%';

        $statement = $this->database->connect()->prepare("SELECT * FROM suggestions WHERE lower(title) = :title
                             or lower(description) LIKE :title");
        $statement->bindValue(':title', $title, PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }

    public function addSuggestion(Suggestion $suggestion) : void{
        session_start();
        $date = new DateTime();
        $statement = $this->database->connect()->prepare("INSERT INTO suggestions
        (title, description, created_at, id_suggested_by, image) 
        VALUES (?, ?, ?, ?, ?)");

        if(session_status() === PHP_SESSION_NONE){
            header("Location: /login");
            exit;
        }
        else{
            $assignedById = $_SESSION['user']->getId();
        }


        $statement->execute(
            [$suggestion->getTitle(),
            $suggestion->getDescription(),
            $date->format('Y-m-d'),
            $assignedById,
            $suggestion->getImage()]
        );
        exit;
    }

    public function getSuggestions(): array{
        $result = [];
        $statement = $this->database->connect()->prepare("SELECT * FROM suggestions");
        $statement->execute();
        $suggestions = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach($suggestions as $suggestion){
            $result[] = new Suggestion($suggestion['title'], $suggestion['description'],$suggestion['image']);
        }

        return $result;
    }

}