<?php
// session_start();

require '../vendor/autoload.php';

$config = require 'config.php';

$app = new \Slim\App($config);

require '../app/dependencies.php';

require '../app/routes.php';

$app->run();
