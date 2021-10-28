<?php
class Perfil{
    private $descripcion;
    private $estado;

    public function __construct($descripcion, $estado)
    {
        $this->descripcion = $descripcion;
        $this->estado = $estado;
    }

    public function GetDescripcion(){
        return $this->descripcion;
    }
    public function SetDescripcion($estado){
        $this->estado = $estado;
    }
    public function GetEstado(){
        return $this->estado;
    }
    public function SetEstado($estado){
        $this->estado = $estado;
    }
}