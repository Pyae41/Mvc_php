<?php

use app\controllers\CategoryController;
use app\controllers\CustomerController;
use app\core\Controller;
use app\core\Route;

// default route
Route::get('/', function () {
    $view = new Controller();
    return $view->view('home');
});

// Customer
Route::get('/customers', [CustomerController::class, 'index']);
Route::get('/create_customer',[CustomerController::class,'getCreateForm']);
Route::post('/save_customer',[CustomerController::class,'saveCustomer']);
Route::get('/edit_customer', [CustomerController::class, 'editCustomer']);
Route::post('/update_customer', [CustomerController::class, 'updateCustomer']);
Route::get('/delete_customer', [CustomerController::class, 'deleteCustomer']);
// Customer

// Category
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/create_category',[CategoryController::class,'getCreateForm']);
Route::post('/save_category',[CategoryController::class,'saveCategory']);
Route::get('/edit_category', [CategoryController::class, 'editCategory']);
Route::post('/update_category', [CategoryController::class, 'updateCategory']);
Route::get('/delete_category', [CategoryController::class, 'deleteCategory']);
// Category