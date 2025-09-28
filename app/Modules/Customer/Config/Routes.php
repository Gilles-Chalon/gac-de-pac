<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('profile', ['namespace' => 'App\Modules\Customer\Controllers', 'filter' => 'session'], function ($routes) {
    $routes->get('/', 'ProfileController::dashboard');
    // Edit Profile
    $routes->get('edit', 'ProfileController::edit');
    $routes->post('update', 'ProfileController::update');
    // Change Password
    $routes->get('password', 'ProfileController::password');
    $routes->post('update-password', 'ProfileController::updatePassword');
    // Command History
    $routes->get('history', 'ProfileController::history');
});
