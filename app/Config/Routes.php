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

$routes->group('patient', ['filter' => 'authFilter', 'namespace' => 'App\Controllers\Patient'], function($routes) {
    $routes->get('dashboard', 'DashboardController::dashboard');
    $routes->get('appointment', 'AppointmentController::appointment');
    $routes->get('consult', 'ConsultationController::consult');
    $routes->get('doctor', 'DoctorController::doctor');
    $routes->get('profile', 'ProfileController::profile'); 
    $routes->get('settings', 'ProfileController::settings');
    $routes->post('change-password', 'ProfileController::changePassword'); // Ajout de la route POST
    $routes->get('delete-account', 'ProfileController::deleteAccount'); // Route GET pour la confirmation de suppression
    $routes->get('logout', 'AuthController::logout');
});