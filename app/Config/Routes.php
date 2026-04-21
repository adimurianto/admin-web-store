<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::index');

// Auth routes
$routes->get('/auth', 'Auth::index');
$routes->post('/auth/login', 'Auth::login');
$routes->get('/auth/logout', 'Auth::logout');

// Grouped routes with Auth filter
$routes->group('', ['filter' => 'auth'], function($routes) {
    
    $routes->get('/dashboard', 'Dashboard::index');

    // Items
    $routes->get('/items', 'Items::index');
    // Gudang & Admin can create/edit items
    $routes->get('/items/new', 'Items::new', ['filter' => 'role:Admin,Gudang']);
    $routes->post('/items/create', 'Items::create', ['filter' => 'role:Admin,Gudang']);
    $routes->get('/items/edit/(:segment)', 'Items::edit/$1', ['filter' => 'role:Admin,Gudang']);
    $routes->post('/items/update/(:segment)', 'Items::update/$1', ['filter' => 'role:Admin,Gudang']);

    // Categories
    $routes->get('/categories', 'Categories::index');
    // Only Admin can create/edit categories
    $routes->get('/categories/new', 'Categories::new', ['filter' => 'role:Admin']);
    $routes->post('/categories/create', 'Categories::create', ['filter' => 'role:Admin']);
    $routes->get('/categories/edit/(:segment)', 'Categories::edit/$1', ['filter' => 'role:Admin']);
    $routes->post('/categories/update/(:segment)', 'Categories::update/$1', ['filter' => 'role:Admin']);

    // Users
    // Only Admin can access Users
    $routes->group('users', ['filter' => 'role:Admin'], function($routes) {
        $routes->get('/', 'Users::index');
        $routes->get('new', 'Users::new');
        $routes->post('create', 'Users::create');
        $routes->get('edit/(:segment)', 'Users::edit/$1');
        $routes->post('update/(:segment)', 'Users::update/$1');
    });

});
