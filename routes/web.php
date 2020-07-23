<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Controller@index')->name('index');
Route::get('/contato', 'Controller@contact');
Route::get('/ver', 'Controller@single');
Route::get('login', 'UserController@login')->name('login');
Route::post('login', 'UserController@auth')->name('authenticate');
Route::get('/ver/{id}', 'Controller@single')->name('single');

Route::group(['prefix' => 'produtos', 'as' => 'produtos.'], function(){
    Route::get('/', 'Controller@products');
    Route::get('/filter', 'FilterController@filter')->name('filtro');
    Route::get('/{category}', 'Controller@products');
    Route::get('/{category}/{brand}', 'Controller@products');
    Route::get('/{category}/{brand}/{price}', 'Controller@products');
    Route::get('/{category}/{brand}/{price}/{animal}', 'Controller@products');
});

/*--------------A PARTIR DESTE PONTO REQUER AUTENTICAÇÃO----------*/
Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('/', 'UserController@index')->name('index');
        Route::get('logout', 'Controller@logout')->name('logout');

        //Grupos
        Route::group(['prefix' => 'grupo', 'as' => 'grupo.'], function () {
            Route::get('gerenciar', 'GroupController@index')->name('gerenciar');
            Route::post('add', 'GroupController@insert')->name('add');
            Route::get('listar', 'GroupController@list')->name('listar');
            Route::get('editar/{id}', 'GroupController@editar')->name('editar');
            Route::post('update/{id}', 'GroupController@update')->name('update');
            Route::get('excluir/{id}', 'GroupController@excluir')->name('excluir');
        });

        //Categorias
        Route::group(['prefix' => 'categoria', 'as' => 'categoria.'], function () {
            Route::get('gerenciar', 'CategoryController@index')->name('gerenciar');
            Route::get('listar', 'CategoryController@list')->name('listar');
            Route::post('add', 'CategoryController@insert')->name('add');
            Route::get('editar/{id}', 'CategoryController@editar')->name('editar');
            Route::post('update/{id}', 'CategoryController@update')->name('update');
            Route::get('excluir/{id}', 'CategoryController@excluir')->name('excluir');
        });

        //Marcas
        Route::group(['prefix' => 'marca', 'as' => 'marca.'], function () {
            Route::get('gerenciar', 'BrandController@index')->name('gerenciar');
            Route::get('listar', 'BrandController@list')->name('listar');
            Route::post('add', 'BrandController@insert')->name('add');
            Route::get('editar/{id}', 'BrandController@editar')->name('editar');
            Route::post('update/{id}', 'BrandController@update')->name('update');
            Route::get('excluir/{id}', 'BrandController@excluir')->name('excluir');
        });
        
        //Vendedores
        Route::group(['prefix' => 'vendedor', 'as' => 'vendedor.'], function () {
            Route::get('gerenciar', 'SalespeopleController@index')->name('gerenciar');
            Route::post('add', 'SalespeopleController@insert')->name('add');
            Route::get('listar', 'SalespeopleController@list')->name('listar');
            Route::get('editar/{id}', 'SalespeopleController@editar')->name('editar');
            Route::post('update/{id}', 'SalespeopleController@update')->name('update');
            Route::get('excluir/{id}', 'SalespeopleController@excluir')->name('excluir');
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

        //Regionais
        Route::group(['prefix' => 'regional', 'as' => 'regional.'], function () {
            Route::get('gerenciar', 'RegionalsController@index')->name('gerenciar');
            Route::post('add', 'RegionalsController@insert')->name('add');
            Route::get('listar', 'RegionalsController@list')->name('listar');
            Route::get('editar/{id}', 'RegionalsController@editar')->name('editar');
            Route::post('update/{id}', 'RegionalsController@update')->name('update');
            Route::get('excluir/{id}', 'RegionalsController@excluir')->name('excluir');
        });
    });
});
