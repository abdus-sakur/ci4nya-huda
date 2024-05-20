<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->group('login', function ($routes) {
    $routes->get('', 'UserController::login');
    $routes->post('', 'UserController::prosesLogin');
});

$routes->get('logout', 'UserController::logout');
$routes->get('/', 'DashboardController::index');

$routes->group('blog', function ($routes) {
    $routes->get('', 'BlogController::index');
    $routes->get('create', 'BlogController::create');
    $routes->get('edit/(:any)', 'BlogController::edit/$1');
    $routes->post('', 'BlogController::insert'); //method post untuk insert
    $routes->put('(:num)', 'BlogController::update/$1'); //method put dan patch untuk update
    $routes->delete('', 'BlogController::delete'); //method put dan patch untuk update
});

$routes->group('comment', function ($routes) {
    $routes->get('', 'CommentController::index');
    $routes->get('(:num)', 'CommentController::ajaxComment/$1');
    $routes->get('datatable', 'CommentController::datatableComment');
    $routes->post('', 'CommentController::save');
    $routes->delete('', 'CommentController::delete');
});
