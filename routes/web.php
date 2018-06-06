<?php

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

//$router->get('posts/index', [
//    'as' => 'index', 'uses' => 'PostsController@index'
//]);

$router->group(['prefix' =>'api/v1'], function($router) {
    $router->post('posts/add', 'PostsController@createPost');
    $router->put('posts/view/{id}', 'PostsController@updatePost');
    $router->delete('posts/delete/{id}', 'PostsController@deletePost');
    $router->get('posts/index', 'PostsController@index');
});
//C:\Koder\lumenBlog
$router->group(['prefix' => 'users', 'middleware'=>'auth'], function($router)
{
    $router->post('add','UsersController@add');
    $router->get('index','UsersController@index');
});
