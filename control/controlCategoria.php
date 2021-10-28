<?php
require_once 'modelo/categoria.php';
class ControlCategoria{
    private $cnx;
    
 public function __construct(){
     require_once 'conexion/Db.php';
     try{
         $this->cnx = Db::conectar();
     }
     catch(PDOException $ex){
         die($ex->getMessage());
     }
 }
 public function registroCategoria($categoria){
     try{
        $sql = "insert into categoria (nombre, peso_inicial, peso_final, descripcion, estado) values (?, ?, ?, ?, ?)";
        $prep = $this->cnx->prepare($sql);
        $prep->execute([
            $categoria->GetNombre(),
            $categoria->GetPesoI(),
            $categoria->GetPesoF(),
            $categoria->GetDescripcion(),
            $categoria->GetEstado()
        ]);
     }catch(PDOException $ex){
         die($ex->getMessage());
     }
 }
}