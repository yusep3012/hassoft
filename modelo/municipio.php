<?php
class Municipio{
    private $nombre;
    private $codPostal;
    private $descripcion;
    private $estado;
    private $codDepartamento;

    public function __construct($nombre, $codPostal, $descripcion, $estado, $codDepartamento){
        $this->nombre = $nombre;
        $this->codPostal = $codPostal;
        $this->descripcion = $descripcion;
        $this->estado = $estado;
        $this->codDepartamento = $codDepartamento;
    }

    public function GetNombre(){
        return $this->nombre;

    }
    public function SetNombre($nombre){
        $this->nombre = $nombre;
    }
    public function GetCodPostal(){
        return $this->codPostal;
    }
    public function SetCodPostal($codPostal){
        $this->codPostal = $codPostal;
    }
    public function GetDescripcion(){
        return $this->descripcion;
    }
    public function SetDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }
    public function GetEstado(){
        return $this->estado;
    }
    public function SetEstado($estado){
        $this->estado = $estado;
    }
    public function GetCodDepartamento(){
        return $this->codDepartamento;
    }
    public function SetCodDepartamento($codDepartamento){
        $this->codDepartamento = $codDepartamento;
    }
    
}