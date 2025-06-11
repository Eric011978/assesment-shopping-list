<?php
use App\Controllers\ItemController;
use App\Core\Router;

/** @var Router $router */

$itemController = new ItemController();

$router->add('GET', '/', [$itemController, 'index']);
$router->add('POST', '/create', [$itemController, 'create']);
$router->add('GET', '/edit/(\\d+)', [$itemController, 'edit']);
$router->add('POST', '/update/(\\d+)', [$itemController, 'update']);
$router->add('POST', '/delete/(\\d+)', [$itemController, 'delete']);

