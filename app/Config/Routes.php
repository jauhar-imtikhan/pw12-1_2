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
$routes->setDefaultController('Basis');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override(function () {
    return view("halerror");
});

$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Basis::index');
$routes->get('/bookdata', 'Basis::data');
$routes->get('/about', 'Basis::tentang');
$routes->post('/adddatabuku', 'Basis::AddBuku');
$routes->get('/tugas', 'Basis::tugas');
$routes->get('/getbuku', 'Basis::getDataBuku');
$routes->get('/getbuku/(:any)', 'Basis::getDataBukuId/$1');
$routes->post('updateBuku', 'Basis::update');
$routes->delete('/deleteBuku/(:any)', 'Basis::delete/$1');
$routes->get('/barang', 'Basis::barang');
$routes->get('/pdfdinamis', 'Basis::pdfdinamis');
$routes->get('/pdfstatis', 'Basis::pdfstatis');
$routes->get('/excelstatis', 'Basis::excelstatis');
$routes->get('/exceldinamis', 'Basis::exceldinamis');
$routes->get('grafik/(:any)', 'Basis::getGrafik/$1');
$routes->get('/rekapdashboard/(:any)', 'Basis::RekapDashboard/$1');
$routes->get('getTugas', 'Basis::geTugas');


if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
