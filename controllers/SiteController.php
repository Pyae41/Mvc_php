<?php

namespace app\controllers;
use app\core\Controller;
use app\models\Customer;

class SiteController extends Controller
{
    public function index(){

        $user = new Customer();
        $data = $user->all();

        return $this->view("home", [
            "datas" => $data
        ]);
    }

    public function getContact(){
        return $this->view("contact");
    }

    public function postContact(){
        
    }
}
