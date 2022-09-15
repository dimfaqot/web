<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
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
$routes->get('/', 'Home::index');
$routes->post('/', 'Home::index/$1');
$routes->get('berita/(:any)', 'Home::berita/$1');


$routes->get('dashboard', 'Dashboard::index');
$routes->post('dashboard', 'Dashboard::index/$1');
$routes->get('dashboard/artikel', 'Dashboard::artikel');
$routes->get('dashboard/kategori', 'Dashboard::kategori');

$routes->get('login', 'Login::index');
$routes->post('login', 'Login::auth');
$routes->get('login/logout', 'Login::logout');

$routes->get('single/(:any)', 'Single::index/$1');
$routes->post('single/edit', 'Single::edit');
$routes->post('single/artikel', 'Single::artikel');
$routes->post('single/kategori', 'Single::kategori');
$routes->post('single/delete', 'Single::delete');

$menu = \App\Models\Menus::class;
$menu = new $menu;
$wherenotin = $wherenotin = ['Dashboard'];
$q = $menu->whereNotIn('menu', $wherenotin)->where('role', session('role'))->find();
foreach ($q as $i) {
    $routes->get('/' . strtolower(str_replace(" ", "", $i['menu'])), static function () {

        $menu = \App\Models\Menus::class;
        $menu = new $menu;
        $wherenotin = $wherenotin = ['Dashboard'];
        $q = $menu->whereNotIn('menu', $wherenotin)->find();

        $request = \Config\Services::request();
        $url = $request->uri->getSegment(1);

        $akses = false;
        foreach ($q as $i) {
            $m = strtolower(str_replace(" ", "", $i['menu']));
            if ($m == $url) {
                $akses = true;
            }
        }
        $session = session('id');
        if (!$session) {
            session()->setFlashdata('gagal', 'Anda belum login!.');
            return redirect()->to(base_url('login'));
        }

        if (!$akses) {
            session()->setFlashdata('gagal', 'Akses dilindungi!.');
            return redirect()->to(base_url('dashboard'));
        }

        echo 'Login';
    });
}

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
