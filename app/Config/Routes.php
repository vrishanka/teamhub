<?php
$routes->get('/register', 'AuthController::register');
$routes->post('/store', 'AuthController::store');

$routes->get('/login', 'AuthController::login');
$routes->post('/authenticate', 'AuthController::authenticate');

$routes->get('/logout', 'AuthController::logout');
$routes->get('/dashboard', 'DashboardController::index');
$routes->get('/teams/create', 'TeamController::create');
$routes->post('/teams/store', 'TeamController::store');
$routes->get('/teams/(:num)', 'TeamController::show/$1');

$routes->get('/projects/create/(:num)', 'ProjectController::create/$1');
$routes->post('/projects/store', 'ProjectController::store');
$routes->get('/projects/(:num)', 'ProjectController::show/$1');

$routes->post('/tasks/store', 'TaskController::store');
$routes->get('/tasks/update-status/(:num)/(:any)', 'TaskController::updateStatus/$1/$2');
$routes->post('/tasks/update', 'TaskController::update');
$routes->get('/tasks/delete/(:num)', 'TaskController::delete/$1');




