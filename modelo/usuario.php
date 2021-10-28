<?php
class Usuario{
    private $nombre;
    private $clave;

    public function __construct($nombre, $clave)
    {
        $this->nombre = $nombre;
        $this->clave = $clave;
    }
    public function GetNombre(){
        return $this->nombre;
    }
    public function SetNombre($nombre){
        $this->nombre = $nombre;
    }
    public function GetClave(){
        return $this->clave;
    }
    public function SetClave($clave){
        $this->clave = $clave;
    }
}