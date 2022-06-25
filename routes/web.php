<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->group(['prefix' => 'indonesia'], function () use ($router) {
        // kawasan
        $router->group(['prefix' => 'kawasan'], function () use ($router) {
            $router->get('/', 'KawasanController@getListData');
            $router->post('/simpan', 'KawasanController@getPostList');
            $router->get('/q', 'KawasanController@getSearchData');
        });

        // provinsi
        $router->group(['prefix' => 'provinsi'], function () use ($router) {
            $router->get('/', 'ProvinsiController@getListData');
            $router->post('/simpan', 'ProvinsiController@getPostList');
            $router->get('/q', 'ProvinsiController@getSearchData');
        });

        // kabupaten
        $router->group(['prefix' => 'kabupaten'], function () use ($router) {
            $router->get('/', 'KabupatenController@getListData');
            $router->post('/simpan', 'KabupatenController@getPostList');
            $router->get('/q', 'KabupatenController@getSearchData');
        });

        // daerah
        $router->group(['prefix' => 'daerah'], function () use ($router) {
            $router->get('/', 'DaerahController@getListData');
            $router->post('/simpan', 'DaerahController@getPostList');
            $router->get('/q', 'DaerahController@getSearchData');
        });

        // wisata
        $router->group(['prefix' => 'daerah'], function () use ($router) {
            $router->get('/', 'DaerahController@getListData');
            $router->post('/simpan', 'DaerahController@getPostList');
            $router->get('/q', 'DaerahController@getSearchData');
        });
    });
});
