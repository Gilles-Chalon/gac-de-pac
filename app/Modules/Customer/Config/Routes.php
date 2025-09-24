<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('profile', ['namespace' => 'App\Modules\Customer\Controllers', 'filter' => 'session'], function ($routes) {
    $routes->get('/', 'ProfileController::index');
    $routes->get('edit', 'ProfileController::edit');
    $routes->get('password', 'ProfileController::password');
});
