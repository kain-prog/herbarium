<?php

use core\Router;

$router = new Router();

//Inicio
$router->get('/', 'HomeController@index');

// Atendente
$router->get('/atendente', 'AtendenteController@index');

// Relato
$router->get('/relato', 'RelatoController@index');

// Acompanhe
$router->get('/acompanhe', 'AcompanheController@index');