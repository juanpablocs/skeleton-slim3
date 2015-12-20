<?php
// DIC configuration
$container = $app->getContainer();

$container['view'] = function ($c) {
    $path = $c->get('settings')['view'];
    return new \Slim\Views\PhpRenderer($path);
};

$container['notFoundHandler'] = function ($c) {
  return function ($request, $response) use ($c) {
    $app = new App\Action\ErrorAction($c->get('view'), $c->get('settings'));
    return $app->Error404($request, $response);
  };
};


// Action Factories
$container['App\Action\HomeAction'] = function ($c) {
    return new App\Action\HomeAction($c->get('view'));
};