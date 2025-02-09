<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('index', 'DefaultController');
Routing::get('franchises', 'DefaultController');
Routing::get('suggestions', 'SuggestionController');
Routing::post('login', 'SecurityController');
Routing::post('addSuggestion', 'SuggestionController');

Routing::run($path);