<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('auth', function( RouteCollection $route) {
    $route->match(['get','post'],'login','AuthController::login');
    $route->match(['get','post'],'signup','AuthController::signup');
});

$routes->get('dashboard','DashboardController::index');