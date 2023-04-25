<?php

namespace Model;

class Mecanico extends ActiveRecord
{
    protected static $tabla = 'mecanicos';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'puesto', 'telefono', 'imagen']; //Con esto mapeamos los datos para que se emparejen con las columnas de la tabla que tenemos en la bbdd

    public $id;
    public $nombre;
    public $apellido;
    public $puesto;
    public $telefono;
    public $imagen;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null; //En el caso de que no esté presente este valor, le pondremos por defecto un valor null
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->puesto = $args['puesto'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
    }
}
