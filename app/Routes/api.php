<?php

use App\Controller\TicketController;
use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;

$dispatcher = simpleDispatcher(function(RouteCollector $router) {
    $router->post('/ticket', [TicketController::class, 'create']);
});