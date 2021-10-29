<?php
require_once 'modelo/persona.php';

class controlPersona{
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
    public function registroPersona($persona){
        try{
            $sql = "insert into persona (cedula , primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, celular, correo, cod_finca, cod_perfil, estado) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $prep= $this->cnx->prepare($sql);
            $prep->execute([
                $persona->GetCedula(),
                $persona->GetPNombre(),
                $persona->GetSNombre(),
                $persona->GetPApellido(),
                $persona->GetSApellido(),
                $persona->GetCelular(),
                $persona->GetCorreo(),
                $persona->GetFinca(),
                $persona->GetPerfil(),
                $persona->GetEstado()
            ]);
        }catch(PDOException $ex){
            die($ex->getMessage());
        }
    }
    public function consultaPersona(){
        try{
            $sql = "select * from persona";
            $prep = $this->cnx->prepare($sql);
            $prep->execute();
            $personas = $prep->fetchAll(PDO::FETCH_OBJ);
        }catch(PDOException $ex){
            die($ex->getMessage());
        }
        return $personas;
    }

    public function consultaPersonaPorId($id){
        try{
            $sql = "select * from persona where cedula = $id";
            $prep= $this->cnx->prepare($sql);
            $prep->execute();
            $persona = $prep->fetchAll(PDO::FETCH_OBJ);
        }catch(PDOException $ex){
            die($ex->getMessage());
        }
        return $persona;
    }
    public function actualizarPersona($persona){
        try{
            $sql = "update persona set cedula = ?, primer_nombre = ?, ";
        }catch(PDOException $ex){
            die($ex->getMessage());
        }
    }
}