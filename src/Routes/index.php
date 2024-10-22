<?php

use App\Controllers\HomeController;
use App\Controllers\pageController;
use App\Controllers\scheduleController;
use App\Router;

$router = new Router();

$router->get('/', HomeController::class, 'homePage');
$router->get('/teachers', pageController::class, 'teachers');
$router->get('/fetch_schedule', 'App\Controllers\ScheduleController', 'fetchSchedule');

$router->dispatch();