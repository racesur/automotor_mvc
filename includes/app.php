<?php

//** ESTE ARCHIVO ES UN ARCHIVO PPAL CON TODAS LAS CLASES PARA QUE ESTÉN DISPONIBLES EN TODO EL SITIO WEB Y NO TENGAMOS QUE IMPORTARLAS EN CADA PÁGINA, POR ESO AÑADIMOS AQUÍ LA CONEXIÓN A LA BBDD, LAS FUNCIONES QUE TENGAMOS Y EL AUTOLOAD DE COMPOSER*/

require 'funciones.php';
require 'config/database.php';
require __DIR__ .  '/../vendor/autoload.php';

// Nos conectamos a la BBDD
$db = conectarDB();

use Model\ActiveRecord;

ActiveRecord::setDB($db);
