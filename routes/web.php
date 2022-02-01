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

//$router->get('/testdb', 'MainController@testdb');

$router->post('/user/login', 'MainController@loginUser');
$router->get('/user/login', 'MainController@loginUser');
$router->post('/user/login/device', 'MainController@loginDevice');
$router->post('/user/logout', 'MainController@logoutUser');
$router->get('/user/logout', 'MainController@logoutUser');
$router->post('/user', 'MainController@createUser');
$router->put('/user', 'MainController@updateUser');
$router->delete('/user', 'MainController@removeUser');

//$router->get('/user/{userid}/creditcard', 'MainController@getCreditCard');
//$router->post('/user/{userid}/creditcard', 'MainController@addCreditCard');
//$router->put('/user/{userid}/creditcard', 'MainController@updateCreditCard');
//$router->delete('/user/{userid}/creditcard', 'MainController@removeCreditCard');

$router->get('/user/{userid}/buylists', 'MainController@getBuylists');
$router->get('/user/{userid}/buylist', 'MainController@getBuylist');
$router->post('/user/{userid}/buylist', 'MainController@addBuylist');
$router->put('/user/{userid}/buylist', 'MainController@updateBuylist');
$router->delete('/user/{userid}/buylist', 'MainController@removeBuylist');

$router->get('/product', 'MainController@getProduct');
$router->post('/product', 'MainController@addProduct');
$router->put('/product', 'MainController@updateProduct');
$router->delete('/product', 'MainController@removeProduct');
