<?php

use App\Controllers\HomeController;
use App\Controllers\pageController;
use App\Router;

$router = new Router();

$router->get('/', HomeController::class, 'homePage');
$router->get('/pageone', pageController::class, 'pageOne');
$router->get('/pagetwo', pageController::class, 'pageTwo');
$router->get('/pagethree', pageController::class, 'pageThree');

$router->dispatch();