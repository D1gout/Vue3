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

$router->post("/", function () use ($router) {
    return $router->app->version();
});

$router->post("api/minus", "ExampleController@minus");

$router->get("api/plus", "ExampleController@plus");

$router->post("api/dev", "ExampleController@dev");

$router->post("api/sep", "ExampleController@sep");
