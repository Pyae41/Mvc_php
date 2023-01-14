<?php

use app\controllers\CategoryController;
use app\controllers\CustomerController;
use app\core\Controller;
use app\core\Router;

// default route
Router::get('/', function () {
    $view = new Controller();
    return $view->view('home');
});

// Customer
Router::get('/customers', [CustomerController::class, 'index']);
Router::get('/create_customer',[CustomerController::class,'getCreateForm']);
Router::post('/save_customer',[CustomerController::class,'saveCustomer']);
Router::get('/edit_customer', [CustomerController::class, 'editCustomer']);
Router::post('/update_customer', [CustomerController::class, 'updateCustomer']);
Router::get('/delete_customer', [CustomerController::class, 'deleteCustomer']);
// Customer

// Category
Router::get('/categories', [CategoryController::class, 'index']);
Router::get('/create_category',[CategoryController::class,'getCreateForm']);
Router::post('/save_category',[CategoryController::class,'saveCategory']);
Router::get('/edit_category', [CategoryController::class, 'editCategory']);
Router::post('/update_category', [CategoryController::class, 'updateCategory']);
Router::get('/delete_category', [CategoryController::class, 'deleteCategory']);
// Category