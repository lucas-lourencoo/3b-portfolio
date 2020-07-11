<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Controller@index');
Route::get('/contato', 'Controller@contact');
Route::get('/produtos', 'Controller@products');
Route::get('/ver', 'Controller@single');

Route::get('/admin', 'Controller@admin');
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    
    //Grupos
    Route::group(['prefix' => 'group', 'as' => 'group.'], function(){
        Route::get('adicionar', 'GroupController@index')->name('adicionar');
        Route::post('add', 'GroupController@insert')->name('add');
        Route::get('editar', 'GroupController@update')->name('editar');
    });

    //Categorias
    Route::group(['prefix' => 'category', 'as' => 'category.'], function(){
        Route::get('adicionar', 'CategoryController@index')->name('adicionar');
        Route::post('add', 'CategoryController@insert')->name('add');
        Route::get('editar', 'CategoryController@update')->name('editar');
    });

    //Marcas
    Route::group(['prefix' => 'brand', 'as' => 'brand.'], function(){
        Route::get('adicionar', 'BrandController@index')->name('adicionar');
        Route::post('add', 'BrandController@insert')->name('add');
        Route::get('editar', 'BrandController@update')->name('editar');
    });
    
    //Vendedores
    Route::group(['prefix' => 'salespeople', 'as' => 'salespeople.'], function(){
        Route::get('adicionar', 'SalespeopleController@index')->name('adicionar');
        Route::post('add', 'SalespeopleController@insert')->name('add');
        Route::get('editar', 'SalespeopleController@update')->name('editar');
    });
    
    //Bulas
    Route::group(['prefix' => 'bull', 'as' => 'bull.'], function(){
        Route::get('adicionar', 'BullController@index')->name('adicionar');
        Route::post('add', 'BullController@insert')->name('add');
        Route::get('editar', 'BullController@update')->name('editar');
    });
    
    //Produtos
    Route::group(['prefix' => 'product', 'as' => 'product.'], function(){
        Route::get('adicionar', 'ProductController@index')->name('adicionar');
        Route::post('add', 'ProductController@insert')->name('add');
        Route::get('editar', 'ProductController@update')->name('editar');
    });
    
    //Usuários
    Route::group(['prefix' => 'user', 'as' => 'user.'], function(){
        Route::get('adicionar', 'UserController@index')->name('adicionar');
        Route::post('add', 'UserController@insert')->name('add');
        Route::get('editar', 'UserController@update')->name('editar');
    });
});
