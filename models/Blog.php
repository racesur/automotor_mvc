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
}
