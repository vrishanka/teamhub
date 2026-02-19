<?php
$routes->get('/register', 'AuthController::register');
$routes->post('/store', 'AuthController::store');

$routes->get('/login', 'AuthController::login');
$routes->post('/authenticate', 'AuthController::authenticate');

$routes->get('/logout', 'AuthController::logout');

