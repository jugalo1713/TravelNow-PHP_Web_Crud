<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('Home2', 'LoginController::irHome');

$routes->get('login', 'LoginController::index'); 
$routes->get('login/registrarse', 'LoginController::registrarse'); 
$routes->post('login/registrarse', 'UsersController::addUser');
$routes->post('login', 'LoginController::comprobarUsuario');

$routes->get('usuarios/misDatos', 'UsersController::datosUsuario'); 
$routes->get('usuarios/eliminar', 'UsersController::deleteUser');
$routes->get('usuarios', 'UsersController::index');
$routes->get('usuario/reservas', 'ReservasController::listarReservas');
$routes->get('usuario/eliminarReserva', 'ReservasController::eliminarReserva');


$routes->get('apartamentos', 'ApartamentoController::index');
$routes->get('apartamentos/registrar', 'ApartamentoController::registrarApartamento');
$routes->post('apartamentos/registrar', 'ApartamentoController::addApartamento');
$routes->get('apartamentos/eliminar', 'ApartamentoController::deleteApartamento');
$routes->get('apartamentos/registrados', 'ApartamentoController::apartamentosxUsuario');
$routes->get('apartamentos/fotos', 'ApartamentoController::verFotosxApartamento');
$routes->post('apartamentos/fotos', 'ApartamentoController::guardarFotoApartamento');
$routes->get('apartamentos/verApartamento', 'ApartamentoController::verApartamento'); 
$routes->post('apartamentos/verApartamento', 'ReservasController::reservarApartamento'); 

$routes->get('buscarApartamentos', 'ReservasController::index'); 
$routes->post('buscarApartamentos', 'ReservasController::buscarApartamentos'); 




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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

