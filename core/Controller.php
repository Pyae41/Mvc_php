<?php

namespace app\core;

class Controller
{
    public function view($view,$params = []){
        return Application::$app->router->renderView($view, $params);
    }
    public function redirect($route){
        return header('Location:http://localhost:8080/'.$route);
    }
}
