<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/Suggestion.php';
require_once __DIR__.'/../repository/SuggestionRepository.php';

class SuggestionController extends AppController{

    private $messages = [];
    private $suggestionRepository ;
    const MAX_FILE_SIZE = 2048*2048;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIR = '/../public/uploads/';


    public function __construct()
    {
        parent::__construct();
        $this->suggestionRepository = new SuggestionRepository();
    }


    public function addSuggestion(){
        if($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
            move_uploaded_file($_FILES['file']['tmp_name'], dirname(__DIR__).self::UPLOAD_DIR . $_FILES['file']['name']);

            $suggestion = new Suggestion($_POST['title'], $_POST['description'], $_FILES['file']['name']);
            $this->suggestionRepository->addSuggestion($suggestion);

            return $this->render('suggestions', ['messages' => $this->messages, 'suggestion' => $suggestion]);
        }

        return $this->render('addSuggestion', ['messages' => $this->messages]);
    }

    private function validate($file) : bool{
        if(self::MAX_FILE_SIZE < $file['size']){
            $this->messages[] = 'File is too big!';
            return false;
        }
        if(!isset($file['type']) &&!in_array($file['type'], self::SUPPORTED_TYPES)){
            $this->messages[] = 'File type is not allowed!';
            return false;
        }
        return true;
    }

    public function suggestions(){
        $suggestions = $this->suggestionRepository->getSuggestions();
        $this->render('suggestions', ['suggestions' => $suggestions]);
    }
}