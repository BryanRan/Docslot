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
    $route->post('appointment/annuler/(:num)', 'Patient\AppointmentController::annulerRDV/$1');
    
    $route->get('consult', 'Patient\ConsultationController::consult');
    $route->get('consult/(:num)', 'Patient\ConsultationController::consult/$1');
    $route->post('reserver/(:num)', 'Patient\ConsultationController::reserver/$1');
    $route->get('doctor', 'Patient\DoctorController::doctor');
    $route->get('profile', 'Patient\ProfileController::profile');
    $route->post('changePassword', 'Patient\ProfileController::changePassword'); // Ajout de la route POST
    $route->get('deleteAccount', 'Patient\ProfileController::deleteAccount');
    $route->get('logout', 'AuthController::logout');
});

$routes->group('admin', function ($routes) {
    $routes->get('login', 'AdminAuthController::login');
    $routes->post('login', 'AdminAuthController::attemptLogin');
    $routes->get('logout', 'AdminAuthController::logout');

    $routes->group('', ['filter' => 'adminAuth'], function ($routes) {
        // Dashboard
        $routes->get('dashboard', 'Admin\DashboardController::index');
        $routes->post('updateStatus/(:num)', 'Admin\DashboardController::updateStatus/$1');

        // Gestion des créneaux
        $routes->get('creneaux/index', 'Admin\CreneauxController::index');
        $routes->get('creneaux/create', 'Admin\CreneauxController::create');
        $routes->post('creneaux/store', 'Admin\CreneauxController::store');
        $routes->get('creneaux/edit/(:num)', 'Admin\CreneauxController::edit/$1');
        $routes->post('creneaux/update/(:num)', 'Admin\CreneauxController::update/$1');
        $routes->get('creneaux/delete/(:num)', 'Admin\CreneauxController::delete/$1');

        // Gestion des médecins
        $routes->get('medecins/index', 'Admin\MedecinsController::index');
        $routes->get('medecins/create', 'Admin\MedecinsController::create');
        $routes->post('medecins/store', 'Admin\MedecinsController::store');
        $routes->get('medecins/edit/(:num)', 'Admin\MedecinsController::edit/$1');
        $routes->post('medecins/update/(:num)', 'Admin\MedecinsController::update/$1');
        $routes->get('medecins/delete/(:num)', 'Admin\MedecinsController::delete/$1');
    });
});
