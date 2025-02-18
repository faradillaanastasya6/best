<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Admin::index');
$routes->get('/pegawai', 'Admin::pegawai');
$routes->get('/karyawan/tambah', 'Karyawan::tambah');
$routes->get('/karyawan/edit/(:any)', 'Karyawan::edit/$1');
$routes->get('/voter', 'Voter::index');
$routes->get('/login', 'Login::index');
