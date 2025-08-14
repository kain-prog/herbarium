<?php

use core\Router;

$router = new Router();

//Inicio
$router->get('/', 'HomeController@index');

// Atendente
$router->get('/atendente', 'AtendenteController@index');

// Relato
$router->get('/relato', 'RelatoController@index');
$router->post('/relato', 'RelatoController@store');

// Acompanhe
$router->get('/acompanhe', 'AcompanheController@index');
$router->post('/acompanhe', 'AcompanheController@store');
$router->post('/acompanhe/send', 'AcompanheController@send');

// Sucesso
$router->get('/enviado', 'SuccessController@index');


// Autenticação
$router->get('/login', 'AuthController@login');
$router->post('/login', 'AuthController@auth');

$router->get('/cadastro', 'AuthController@cadastro');
$router->post('/cadastro', 'AuthController@registrar');

$router->post('/logout', 'AuthController@logout');