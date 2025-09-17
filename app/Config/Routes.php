<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('auth', function( RouteCollection $route) {
    $route->match(['get','post'],'login','AuthController::login');
    $route->match(['get','post'],'signup','AuthController::signup');
    $route->get('logout','AuthController::logout');
});

$routes->group('patient',['filter'=>'authFilter'],function (RouteCollection $route) {
    $route->get('dashboard', 'Patient\DashboardController::dashboard');
    $route->get('profile', 'Patient\ProfileController::profile');
});