<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('index', 'DefaultController');
Routing::get('dailyQuiz', 'QuizController');
Routing::get('suggestions', 'SuggestionController');
Routing::get('register', 'ContactController');
Routing::post('logout', 'SecurityController');
Routing::post('register', 'SecurityController');
Routing::post('login', 'SecurityController');
Routing::post('addSuggestion', 'SuggestionController');
Routing::post('search', 'SuggestionController');
Routing::post('playedToday', 'SecurityController');
Routing::post('win', 'SecurityController');
Routing::post('lose', 'SecurityController');


Routing::run($path);