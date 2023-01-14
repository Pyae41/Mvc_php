<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $category = new Category();

        $categories = $category->all();

        $parents = array_values(array_filter($categories, function ($value) {
            return $value["parent"] == 0;
        }));

        return $this->view('categories', [
            'categories' => $categories,
            'parents' => $parents
        ]);
    }

    public function getCreateForm()
    {
        $category = new Category();

        $categories = $category->all();

        $parents = array_values(array_filter($categories, function ($value) {
            return $value["parent"] == 0;
        }));

        return $this->view('create_category', [
            'parents' => $parents
        ]);
    }

    public function saveCategory(Request $request){
        $category = new Category();

        $data = $request->getAll();

        $result = $category->save($data);

        if($result){
            return $this->redirect("categories");
        }

    }
}
