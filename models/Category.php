<?php

namespace app\models;

use app\core\Model;

class Category
{
    use Model;
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'parent'
    ];
}
