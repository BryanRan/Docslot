<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'HomeController::index');

$routes->group('auth', function( RouteCollection $route) {
    $route->match(['get','post'],'login','AuthController::login');
    $route->match(['get','post'],'signup','AuthController::signup');
    $route->get('logout','AuthController::logout');
});

$routes->group('patient',['filter'=>'authFilter'],function (RouteCollection $route) {
    $route->get('dashboard', 'Patient\DashboardController::dashboard');
    $route->get('appointment', 'Patient\AppointmentController::appointment');
    $route->get('consult', 'Patient\ConsultationController::consult');
    $route->get('doctor', 'Patient\DoctorController::doctor');
    $route->get('profile', 'Patient\ProfileController::profile');
    $route->post('changePassword', 'Patient\ProfileController::changePassword'); // Ajout de la route POST
    $route->get('deleteAccount', 'Patient\ProfileController::deleteAccount');
    $route->get('logout', 'AuthController::logout');
});

$routes->group('admin', function (RouteCollection $route) {
    $route->get('dashboard', 'Admin\DashboardController::index');
});