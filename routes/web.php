<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Controller@index');
Route::get('/contato', 'Controller@contact');
Route::get('/produtos', 'Controller@products');
