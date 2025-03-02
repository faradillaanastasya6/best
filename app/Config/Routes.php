<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Admin::index');
$routes->get('/pegawai/tambah', 'Pegawai::tambah');
$routes->post('/pegawai/tambah', 'Pegawai::add');
$routes->get('/pegawai/edit/(:any)', 'Pegawai::edit/$1');
$routes->post('/pegawai/edit/(:any)', 'Pegawai::update/$1');
$routes->get('/pegawai/delete/(:any)', 'Pegawai::delete/$1');
$routes->get('/voter', 'Voter::index');
$routes->get('/login', 'Login::index');
