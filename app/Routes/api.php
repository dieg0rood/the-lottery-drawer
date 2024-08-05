<?php

use App\Controller\DrawController;
use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;

$dispatcher = simpleDispatcher(function(RouteCollector $router) {
    $router->get('/draw', [DrawController::class, 'draw']);
});

include_once __DIR__ . '/dispatch.php';