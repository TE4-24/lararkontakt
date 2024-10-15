<?php

use App\Controllers\HomeController;
use App\Controllers\pageController;
use App\Router;

$router = new Router();

$router->get('/', HomeController::class, 'homePage');
$router->get('/teachers', pageController::class, 'teachers');

$router->dispatch();