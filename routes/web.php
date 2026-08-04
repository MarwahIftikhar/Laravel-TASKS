<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DepartmentController;

Route::get('/', [PageController::class, 'home']);


Route::get('/about', [PageController::class, 'about']);


Route::get('/contact', [PageController::class, 'contact']);


Route::resource('departments', DepartmentController::class);