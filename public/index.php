<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\PaginasController;
use Controllers\LoginController;
use Controllers\AdminPanelController;


$router = new Router(); // Creamos una nueva instancia de Router


//Zona Pública
$router->get('/', [PaginasController::class, 'index']);
$router->get('/nosotros', [PaginasController::class, 'nosotros']);
$router->get('/coches', [PaginasController::class, 'coches']);
$router->get('/coche', [PaginasController::class, 'coche']);
$router->get('/blog', [PaginasController::class, 'blog']);
$router->get('/entrada', [PaginasController::class, 'entrada']);
$router->get('/contacto', [PaginasController::class, 'contacto']);

//Login y autenticación
$router->get('/login', [LoginController::class, 'login']); //mostrar el formulario
$router->post('/login', [LoginController::class, 'login']); // usamos post porque queremos mandar los datos del formulario
$router->get('/logout', [LoginController::class, 'logout']);

//Zona Protegida
$router->get('/admin', [AdminPanelController::class, 'index']);

$router->comprobarRutas();
