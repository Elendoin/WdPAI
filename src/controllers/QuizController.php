<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Question.php';
require_once __DIR__.'/../repository/QuestionRepository.php';

class QuizController extends AppController{
    private $questionRepository;

    public function __construct()
    {
        parent::__construct();
        $this->questionRepository = new QuestionRepository();
    }

    public function dailyQuiz(){
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }
        if($_SESSION['user'] === null){
            header('Location: /login');
            exit;
        }

        $question = $this->questionRepository->getTodaysQuestion();
        $userRepository = new UserRepository();

        $_SESSION['wins'] = $userRepository->getWins($_SESSION['user']);
        $_SESSION['losses'] = $userRepository->getLosses($_SESSION['user']);
        return $this->render('browse', ['question' => $question,]);
    }

}