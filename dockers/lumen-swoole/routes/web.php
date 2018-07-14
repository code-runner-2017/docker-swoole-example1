<?php

/*
 * |--------------------------------------------------------------------------
 * | Application Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register all of the routes for an application.
 * | It is a breeze. Simply tell Lumen the URIs it should respond to
 * | and give it the Closure to call when that URI is requested.
 * |
 */
global $sid;

$sid = rand(0, 10);
 
$router->get('/', function () use ($router) {
    // info('This is some useful information.');
    global $sid;
    return "SERVER: $sid";
});

$router->get('/hello', function () use ($router) {
    apcu_store('pietro', 'prova', 0);
    $val = apcu_fetch('pietro', $success);
    return 'ciao! ' . $val . ', success=' . $success;
});

$router->get('/test1/{id}', function ($id) use ($router) {    
    return "id is $id";
});
        
$router->get('/test2/{id}', 'UserController@show');
        