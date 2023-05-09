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

    public function validar() //hereda el metodo
    {
        if (!$this->nombre) {
            self::$errores[] = "debes añadir un nombre";
        }
        if (!$this->apellido) {
            self::$errores[] = "debes añadir un apellido";
        }
        if (!$this->puesto) {
            self::$errores[] = "debes añadir un puesto";
        }
        if (!$this->telefono) {
            self::$errores[] = "debes añadir un teléfono";
        }

        if (!preg_match('/[0-9]{9}/', $this->telefono)) { //Ejecuta un código de una expresion regular o patron dentro de un taxto. Con / le decimos que el tmño sea fijo, y con 0-9 que los valores q acepta son de 0 a 9, y con las llaves le indicamos el tamaño del numero y el segundo argumento que revise el contenido del campo telefono
            self::$errores[] = "debes añadir un teléfono válido";
        }

        if (!$this->imagen) {
            self::$errores[] = "la imagen es obligatoria";
        }

        return self::$errores;
    }
}