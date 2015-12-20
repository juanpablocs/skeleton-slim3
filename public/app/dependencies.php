<?php
// DIC configuration
$container = $app->getContainer();

$container['view'] = function ($c) {
    $path = $c->get('settings')['view'];
    return new \Slim\Views\PhpRenderer($path);
};


// Action Factories
$container['App\Action\HomeAction'] = function ($c) {
    return new App\Action\HomeAction($c->get('view'));
};