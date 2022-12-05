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
    return ["hello" => "world"];
});

$router->get('/usuario', ['uses' => 'UsuarioController@getAll']);
$router->post('/usuario/validar', ['uses' => 'UsuarioController@validarLogin']);
$router->post('/usuario', ['uses' => 'UsuarioController@insertar']);

$router->get('/clientes', ['uses' => 'ClientesController@getAll']);
$router->get('/clientesByName/{nombre}', ['uses' => 'ClientesController@getByName']);
$router->get('/clientes/{id}', ['uses' => 'ClientesController@getById']);

$router->get('/creditos', ['uses' => 'CreditosController@getAll']);
$router->get('/creditos/estado/{id_credito}', ['uses' => 'CreditosController@estadoCredito']);
$router->get('/creditos/{id}', ['uses' => 'CreditosController@getById']);
$router->get('/creditosByClienteId/{idCliente}', ['uses' => 'CreditosController@getByClienteId']);
$router->post('/creditos', ['uses' => 'CreditosController@insertar']);

$router->get('/abonos', ['uses' => 'AbonosController@getAll']);
$router->get('/abonos/{id}', ['uses' => 'AbonosController@getById']);
$router->get('/abonosByIdCredito/{id}', ['uses' => 'AbonosController@getByIdCredito']);
$router->post('/abonos', ['uses' => 'AbonosController@insertar']);
