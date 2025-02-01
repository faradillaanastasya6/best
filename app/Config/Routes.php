<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Admin::index');
$routes->get('/karyawan/tambah', 'Karyawan::tambah');
$routes->get('/voter', 'Voter::index');
