<?php
require_once("libs/Router.php");
require_once("api/controller/api.controller.php");

$router = new Router();


$router->addRoute('getpjs/:ID', 'GET', 'ApiAklasController', 'getAllPjs');
$router->addRoute('getpj/:ID', 'GET', 'ApiAklasController', 'getPj');
$router->addRoute('addNoticia', 'POST', 'ApiAklasController', 'addNoticia');
$router->addRoute('getAllNoticias', 'GET', 'ApiAklasController', 'getAllNoticias');
$router->addRoute('getBaseClass/:ID', 'GET', 'ApiAklasController', 'getBaseClass');
$router->addRoute('clan/:ID', 'GET', 'ApiAklasController', 'getClan');
$router->addRoute('inv/:ID', 'GET', 'ApiAklasController', 'getInv');
$router->addRoute('practicaApi', 'GET', 'ApiAklasController', 'practica');









$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);