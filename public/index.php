<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Routing\RouteCollectorProxy;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->group('/api', function (RouteCollectorProxy $group) {
    $group->get('/images', function (Request $request, Response $response) {
        $response->getBody()->write(json_encode(['test' => 'ok']));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    });
});

$app->run();