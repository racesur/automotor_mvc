<?php

function conectarDB(): mysqli
{
    $db = new mysqli('localhost', 'root', '', 'automotor_mvc'); // Realizamos la conexión mediante POO
    if (!$db) {
        echo "Error, no se ha podido conectar";
        exit;
    }

    return $db;
}