<?php

namespace app\models;
use app\core\Model;

class Customer
{
    use Model;

    protected $table = "customers";

    protected $fillable = [
        'name',
        'phone',
        'address',
        'email'
    ];
}
