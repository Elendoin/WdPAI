<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Question.php';

class QuestionRepository extends Repository{

    public function getTodaysQuestion(){
        $statement = $this->database->connect()->prepare("SELECT * FROM questions WHERE date = :date");
        $statement->bindValue(':date', date('Y-m-d'), PDO::PARAM_STR);
        $statement->execute();

        $question = $statement->fetch(PDO::FETCH_ASSOC);

        return new Question($question['contents'], $question['correct'], $question['option_a'], $question['option_b'],
                            $question['option_c'], $question['option_d'], $question['date'],
                            $question['image']);
    }
}