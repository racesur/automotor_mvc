<?php

namespace Model;

class Coche extends ActiveRecord
{
    protected static $tabla = 'coches';
    protected static $columnasDB = ['id', 'titulo', 'marca', 'modelo', 'precio', 'imagen', 'puertas', 'plazas', 'potencia', 'descripcion', 'vendedorId', 'creado']; //Con esto mapeamos los datos para que se emparejen con las columnas de la bbdd


    public $id;
    public $titulo;
    public $marca;
    public $modelo;
    public $precio;
    public $imagen;
    public $puertas;
    public $plazas;
    public $potencia;
    public $descripcion;
    public $vendedorId;
    public $creado;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null; //En el caso de que no esté presente este valor, le pondremos por defecto un valor null
        $this->titulo = $args['titulo'] ?? '';
        $this->marca = $args['marca'] ?? '';
        $this->modelo = $args['modelo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->puertas = $args['puertas'] ?? '';
        $this->plazas = $args['plazas'] ?? '';
        $this->potencia = $args['potencia'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->vendedorId = $args['vendedorId'] ?? '';
        $this->creado = date('Y/m/d') ?? '';
    }

    public function validar()
    {
        if (!$this->titulo) {
            self::$errores[] = "debes añadir un título"; //Va colocando la información (el valor) al final del array llamado $errores
        }

        if (!$this->marca) {
            self::$errores[] = "debes añadir una marca";
        }

        if (!$this->modelo) {
            self::$errores[] = "debes añadir un modelo";
        }

        if (!$this->precio) {
            self::$errores[] = "debes añadir un precio";
        }

        if (strlen($this->descripcion) < 50) {
            self::$errores[] = "la descripción es obligatoria y debe tener al menos 50 caracteres";
        }

        if (!$this->puertas) {
            self::$errores[] = "debes añadir el número de puertas";
        }

        if (!$this->plazas) {
            self::$errores[] = "debes añadir el número de plazas";
        }

        if (!$this->potencia) {
            self::$errores[] = "debes añadir la potencia";
        }

        if (!$this->vendedorId) {
            self::$errores[] = "debes elegir un vendedor";
        }

        if (!$this->imagen) {
            self::$errores[] = "la imagen es obligatoria";
        }

        return self::$errores;
    }
}
