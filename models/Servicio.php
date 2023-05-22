<?php

namespace Model;

class Servicio extends ActiveRecord
{
    protected static $tabla = 'servicios';
    protected static $columnasDB = ['id', 'nombre', 'precio', 'descripcion', 'mecanicoId']; //Con esto mapeamos los datos para que se emparejen con las columnas de la bbdd

    public $id;
    public $nombre;
    public $precio;
    public $descripcion;
    public $mecanicoId;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null; //En el caso de que no esté presente este valor, le pondremos por defecto un valor null
        $this->nombre = $args['nombre'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->mecanicoId = $args['mecanicoId'] ?? '';
    }


    public function validar() //hereda el metodo
    {
        if (!$this->nombre) {
            self::$errores[] = "debes añadir un nombre de servicio";
        }

        if (!$this->precio) {
            self::$errores[] = "debes añadir un precio";
        }

        //Validamos que el campo precio sólo pueda contener números con la funcion is_numeric
        if (!is_numeric($this->precio)) {
            self::$errores[] = 'El precio no es válido';
        }

        if (strlen($this->descripcion) < 50) {
            self::$errores[] = "la descripción es obligatoria y debe tener al menos 50 caracteres";
        }

        if (!$this->mecanicoId) {
            self::$errores[] = "debes elegir un(a) mecánico(a)";
        }

        return self::$errores;
    }
}
