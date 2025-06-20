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
$routes->get('/voter/(:any)', 'Voter::vote/$1'); //untuk vote_carousel dengan parameter
$routes->post('/voter/poll', 'Voter::voteAction');
$routes->post('voter/simpan', 'VoteSimpan::simpan');
$routes->get('rekap', 'RekapController::index');
$routes->get('/login', 'Login::index');
$routes->post('/login/auth', 'Login::auth');
$routes->get('/logout', 'Login::logout');
