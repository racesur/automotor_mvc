<?php

namespace Model;

class Blog extends ActiveRecord
{
    protected static $tabla = 'blogs';
    protected static $columnasDB = ['id', 'titulo', 'subtitulo', 'descripcion', 'creado', 'imagen', 'vendedorId']; //Con esto mapeamos los datos para que se emparejen con las columnas de la bbdd


    public $id;
    public $titulo;
    public $subtitulo;
    public $descripcion;
    public $creado;
    public $imagen;
    public $vendedorId;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null; //En el caso de que no esté presente este valor, le pondremos por defecto un valor null
        $this->titulo = $args['titulo'] ?? '';
        $this->subtitulo = $args['subtitulo'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->creado = date('Y/m/d') ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->vendedorId = $args['vendedorId'] ?? '';
    }

    public function validar()
    {
        if (!$this->titulo) {
            self::$errores[] = "debes añadir un título"; //Va colocando la información (el valor) al final del array llamado $errores
        }

        if (!$this->subtitulo) {
            self::$errores[] = "debes añadir un subtítulo";
        }

        if (strlen($this->descripcion) < 50) {
            self::$errores[] = "la descripción es obligatoria y debe tener al menos 50 caracteres";
        }

        if (!$this->vendedorId) {
            self::$errores[] = "debes elegir un autor";
        }

        if (!$this->imagen) {
            self::$errores[] = "la imagen es obligatoria";
        }

        return self::$errores;
    }
}