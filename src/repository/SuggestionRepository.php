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

    public function addSuggestion(Suggestion $suggestion) : void{
        $date = new DateTime();
        $statement = $this->database->connect()->prepare("INSERT INTO suggestions
        (title, description, suggested_fields, created_at, id_suggested_by, image) 
        VALUES (?, ?, ?, ?, ?, ?)");

        $assignedById = 5;


        $statement->execute(
            [$suggestion->getTitle(),
            $suggestion->getDescription(),
            $suggestion->getDescription(),
            $date->format('Y-m-d'),
            $assignedById,
            $suggestion->getImage()]
        );
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