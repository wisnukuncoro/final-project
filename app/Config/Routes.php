<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Dashboard::index');
$routes->post('/dashboard', 'Dashboard::filter');
$routes->get('/forecast', 'Forecast::index');
$routes->get('/modelling', 'Modelling::index');