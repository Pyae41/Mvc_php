<?php

use app\models\User;

class test
{
    public function run(){
        $user = new User();
        echo '<pre>';
        var_dump(
            $user->all()
        );
        echo '</pre>';
    }
}
