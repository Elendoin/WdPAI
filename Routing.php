<?php

require_once 'src/controllers/DefualtController.php';
require_once 'src/controllers/SecurityController.php';
require_once 'src/controllers/SuggestionController.php';
require_once 'src/controllers/QuizController.php';

Class Routing{
    public static $routes;

    public static function get($url, $controller) {
        self::$routes[$url] = $controller;
    }

    public static function post($url, $controller) {
        self::$routes[$url] = $controller;
    }

    public static function run($url){
        $action = explode("/", $url)[0];

        if(empty($action)){
            $action = "index";
        }

        if(!array_key_exists($action, self::$routes)){
            die('Wrong url!');
        }

        $controller = self::$routes[$action];
        $object = new $controller;

        $object->$action();
    }

}