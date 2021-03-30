<?php
declare(strict_types=1);

use StoreModule\Controller\StoreActions\CreateStoreAction;
use StoreModule\Controller\StoreActions\ListStoresAction;
use StoreModule\Controller\StoreActions\ReadStoreAction;
use StoreModule\Controller\StoreActions\UpdateStoreAction;
use StoreModule\Controller\StoreActions\DeleteStoreAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });

    $app->group('/stores', function (Group $group) {
        $group->get('', ListStoresAction::class);
        $group->get('/{id}', ReadStoreAction::class);
        $group->post('', CreateStoreAction::class);
        $group->put('/{id}', UpdateStoreAction::class);
        $group->delete('/{id}', DeleteStoreAction::class);
    });
};
