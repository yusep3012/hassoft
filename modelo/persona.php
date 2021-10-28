<?php
class Persona{
    private $cedula;
    private $pNombre;
    private $sNombre;
    private $pApellido;
    private $sApellido;
    private $celular;
    private $correo;
    private $finca;
    private $perfil;
    private $estado;


    public function __construct($cedula, $pNombre, $sNombre, $pApellido, $sApellido, $celular, $correo, $finca, $perfil, $estado){

        $this->cedula = $cedula;
        $this->pNombre = $pNombre;
        $this->sNombre = $sNombre;
        $this->pApellido = $pApellido;
        $this->sApellido = $sApellido;
        $this->celular = $celular;
        $this->correo = $correo;
        $this->finca = $finca;
        $this->perfil = $perfil;
        $this->estado = $estado;
    }
  
    public function GetCedula(){
        return $this->cedula;
    }
    public function SetCedula($cedula){
        $this->cedula = $cedula;
    }
    public function GetPNombre(){
        return $this->pNombre;
    }
    public function SetPNombre($pNombre){
        $this->pNombre = $pNombre;
    }
    public function GetSNombre(){
        return $this->sNombre;
    }
    public function SetSNombre($sNombre){
        $this->sNombre = $sNombre;
    }
    public function GetPApellido(){
        return $this->pApellido;
    }
    public function SetPApellido($pApellido){
        $this->pApellido = $pApellido;
    }
    public function GetSApellido(){
        return $this->sApellido;
    }
    public function SetSApellido($sApellido){
        $this->sApellido = $sApellido;
    }
    public function GetCelular(){
        return $this->celular;
    }
    public function SetCelular($celular){
        $this->celular = $celular;
    }    
    public function GetFinca(){
        return $this->finca;
    }
    public function SetFinca($finca){
        $this->finca = $finca;
    }
    public function GetCorreo(){
        return $this->correo;
    }
    public function SetCorreo($correo){
        $this->correo = $correo;
    }
    public function GetPerfil(){
        return $this->perfil;
    }
    public function SetPerfil($perfil){
        $this->perfil = $perfil;
    }
    public function GetEstado(){
        return $this->estado;
    }
    public function SetEstado($estado){
        $this->estado = $estado;
    }
}