<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');

$routes->get('/spalten', 'Home::spalten');

$routes->get('/erstellen', 'Home::erstellen');
