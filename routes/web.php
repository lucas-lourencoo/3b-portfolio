<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Controller@index')->name('index');
Route::get('/contato', 'Controller@contact');
Route::get('/produtos', 'Controller@products');
Route::get('/ver', 'Controller@single');
Route::get('login', 'UserController@login')->name('login');
Route::post('login', 'UserController@auth')->name('authenticate');

/*--------------A PARTIR DESTE PONTO REQUER AUTENTICAÇÃO----------*/
Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('index', 'Controller@admin')->name('index');
        Route::get('logout', 'Controller@logout')->name('logout');

        //Grupos
        Route::group(['prefix' => 'grupo', 'as' => 'grupo.'], function () {
            Route::get('adicionar', 'GroupController@index')->name('gerenciar');
            Route::post('add', 'GroupController@insert')->name('add');
            Route::get('editar', 'GroupController@update')->name('editar');
        });

        //Categorias
        Route::group(['prefix' => 'categoria', 'as' => 'categoria.'], function () {
            Route::get('gerenciar', 'CategoryController@index')->name('gerenciar');
            Route::post('add', 'CategoryController@insert')->name('add');
            Route::get('editar', 'CategoryController@update')->name('editar');
        });

        //Marcas
        Route::group(['prefix' => 'marca', 'as' => 'marca.'], function () {
            Route::get('gerenciar', 'BrandController@index')->name('gerenciar');
            Route::post('add', 'BrandController@insert')->name('add');
            Route::get('editar', 'BrandController@update')->name('editar');
        });

        //Vendedores
        Route::group(['prefix' => 'vendedor', 'as' => 'vendedor.'], function () {
            Route::get('gerenciar', 'SalespeopleController@index')->name('gerenciar');
            Route::post('add', 'SalespeopleController@insert')->name('add');
            Route::get('editar', 'SalespeopleController@update')->name('editar');
        });

        //Produtos
        Route::group(['prefix' => 'produto', 'as' => 'produto.'], function () {
            Route::get('gerenciar', 'ProductController@index')->name('gerenciar');
            Route::post('add', 'ProductController@insert')->name('add');
            Route::get('editar', 'ProductController@update')->name('editar');
        });

        //Usuários
        Route::group(['prefix' => 'usuario', 'as' => 'usuario.'], function () {
            Route::get('gerenciar', 'UserController@index')->name('gerenciar');
            Route::post('add', 'UserController@insert')->name('add');
            Route::get('editar', 'UserController@update')->name('editar');
        });
    });
});
