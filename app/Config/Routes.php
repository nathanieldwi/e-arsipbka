<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('HomeController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'HomeController::index', ['filter' => 'redirectIfAuthenticated']);
$routes->get('tentang-sekolah', 'HomeController::tentang_sekolah', ['filter' => 'redirectIfAuthenticated']);

$routes->get('auth', 'AuthController::index', ['filter' => 'authenticate']);
$routes->post('cek_login', 'AuthController::cek_login', ['filter' => 'authenticate']);
$routes->get('logout', 'AuthController::logout', ['filter' => 'redirectIfAuthenticated']);

$routes->get('profile', 'HomeController::profile', ['filter' => 'redirectIfAuthenticated']);
$routes->get('edit_profile', 'HomeController::edit_profile', ['filter' => 'redirectIfAuthenticated']);
$routes->post('update_profile', 'HomeController::update_profile', ['filter' => 'redirectIfAuthenticated']);
$routes->get('edit_password', 'HomeController::edit_password', ['filter' => 'redirectIfAuthenticated']);
$routes->post('update_password', 'HomeController::update_password', ['filter' => 'redirectIfAuthenticated']);

$routes->get('jenis', 'JenisController::index', ['filter' => 'redirectIfAuthenticated']);
$routes->get('jenis/create', 'JenisController::create', ['filter' => 'redirectIfAuthenticated']);
$routes->post('jenis/store', 'JenisController::store', ['filter' => 'redirectIfAuthenticated']);
$routes->get('jenis/edit/(:any)', 'JenisController::edit/$1', ['filter' => 'redirectIfAuthenticated']);
$routes->post('jenis/update/(:any)', 'JenisController::update/$1', ['filter' => 'redirectIfAuthenticated']);
$routes->delete('jenis/delete/(:any)', 'JenisController::delete/$1', ['filter' => 'redirectIfAuthenticated']);

$routes->get('surat-masuk', 'SuratMasukController::index', ['filter' => 'redirectIfAuthenticated']);
$routes->get('surat-masuk/create', 'SuratMasukController::create', ['filter' => 'redirectIfAuthenticated']);
$routes->post('surat-masuk/store', 'SuratMasukController::store', ['filter' => 'redirectIfAuthenticated']);
$routes->get('surat-masuk/edit/(:any)', 'SuratMasukController::edit/$1', ['filter' => 'redirectIfAuthenticated']);
$routes->post('surat-masuk/update/(:any)', 'SuratMasukController::update/$1', ['filter' => 'redirectIfAuthenticated']);
$routes->delete('surat-masuk/delete/(:any)', 'SuratMasukController::delete/$1', ['filter' => 'redirectIfAuthenticated']);
$routes->get('surat-masuk/preview/(:any)', 'SuratMasukController::preview/$1', ['filter' => 'redirectIfAuthenticated']);

$routes->get('surat-keluar', 'SuratKeluarController::index', ['filter' => 'redirectIfAuthenticated']);
$routes->get('surat-keluar/create', 'SuratKeluarController::create', ['filter' => 'redirectIfAuthenticated']);
$routes->post('surat-keluar/store', 'SuratKeluarController::store', ['filter' => 'redirectIfAuthenticated']);
$routes->get('surat-keluar/edit/(:any)', 'SuratKeluarController::edit/$1', ['filter' => 'redirectIfAuthenticated']);
$routes->post('surat-keluar/update/(:any)', 'SuratKeluarController::update/$1', ['filter' => 'redirectIfAuthenticated']);
$routes->delete('surat-keluar/delete/(:any)', 'SuratKeluarController::delete/$1', ['filter' => 'redirectIfAuthenticated']);
$routes->get('surat-keluar/preview/(:any)', 'SuratKeluarController::preview/$1', ['filter' => 'redirectIfAuthenticated']);

$routes->get('user', 'UserController::index', ['filter' => 'redirectIfAuthenticated']);
$routes->get('user/create', 'UserController::create', ['filter' => 'redirectIfAuthenticated']);
$routes->post('user/store', 'UserController::store', ['filter' => 'redirectIfAuthenticated']);
$routes->get('user/edit/(:any)', 'UserController::edit/$1', ['filter' => 'redirectIfAuthenticated']);
$routes->post('user/update/(:any)', 'UserController::update/$1', ['filter' => 'redirectIfAuthenticated']);
$routes->delete('user/delete/(:any)', 'UserController::delete/$1', ['filter' => 'redirectIfAuthenticated']);
$routes->get('user/password/(:any)', 'UserController::password/$1', ['filter' => 'redirectIfAuthenticated']);
$routes->post('user/change_password/(:any)', 'UserController::change_password/$1', ['filter' => 'redirectIfAuthenticated']);

$routes->get('laporan-surat-masuk', 'LaporanController::surat_masuk_index', ['filter' => 'redirectIfAuthenticated']);
$routes->post('cetak-surat-masuk', 'LaporanController::surat_masuk_cetak', ['filter' => 'redirectIfAuthenticated']);
$routes->get('laporan-surat-masuk/preview/(:any)', 'LaporanController::preview_masuk/$1', ['filter' => 'redirectIfAuthenticated']);
$routes->get('laporan-surat-keluar', 'LaporanController::surat_keluar_index', ['filter' => 'redirectIfAuthenticated']);
$routes->get('laporan-surat-keluar/preview/(:any)', 'LaporanController::preview_keluar/$1', ['filter' => 'redirectIfAuthenticated']);
$routes->post('cetak-surat-keluar', 'LaporanController::surat_keluar_cetak', ['filter' => 'redirectIfAuthenticated']);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
