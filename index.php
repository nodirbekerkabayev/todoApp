<?php

require 'bootstrap.php';
require 'helpers.php';

use App\Todo;
use App\Router;




$router = new Router();
$todo = new Todo();

$router->get('/', fn() => require 'controllers/homeController.php');
$router->get('/todos', fn() => require 'controllers/showTodosController.php');
$router->get('/todos/{id}/edit', fn($todoId) => require 'controllers/editController.php');
$router->get('/todos/{id}/delete', fn($todoId) => require 'controllers/deleteController.php');
$router->get('/telegram', fn() => require 'controllers/telegramController.php');
$router->post('/test', fn() => print 'test');
$router->put('/todos/{id}/update', fn($todoId) => require 'controllers/updateController.php');
$router->post('/store', fn() => require 'controllers/storeController.php');