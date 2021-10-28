<?php
session_start();
$varsesion = $_SESSION['usuario'];
error_reporting(0);
if ($varsesion == null || $varsesion == '') {
    echo '<script type="text/javascript"> alert("USTED NO TIENE AUTORIZACION")</script>';
    die();
    header('location:index.php');
}
$errores = "";
if(isset($_POST['Registrar'])){
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $inicial = $_POST['inicial'];
    $final = $_POST['final'];
    $estado = $_POST['estado'];

    if(!empty($nombre)){
        $nombre = trim($nombre);
        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
    }else{
        $errores .= "DEBE DILIGENCIAR EL NOMBRE";
    }
    if(!empty($descripcion)){
        $descripcion = trim($descripcion);
        $descripcion = filter_var($descripcion, FILTER_SANITIZE_STRING);
    }else{
        $errores .= "DEBE DILIGENCIAR LA DESCRIPCION";
    }
    if(!empty($inicial)){
        $inicial = trim($inicial);
        $inicial = filter_var($inicial, FILTER_SANITIZE_NUMBER_FLOAT);
    }else{
        $errores .= "DEBE INGRESAR EL PESO INICIAL";
    }
    if(!empty($final)){
        $final = trim($final);
        $final = filter_var($final, FILTER_SANITIZE_NUMBER_FLOAT);
    }else{
        $errores .= "DEBE INGRESAR EL PESO FINAL";
    }
    if($estado == ""){
        $errores .= "DEBE SELECCIONAR EL ESTADO";
    }

    if(!$errores){
        require_once 'control/controlCategoria.php';
        $controlCategoria = new ControlCategoria();
        $categoria = new Categoria($nombre, $inicial, $final, $descripcion, $estado);
        $controlCategoria->registroCategoria($categoria);
        echo '<script type="text/javascript"> alert("REGISTRO ALMACENADO CON EXITO")</script>';
    }else{
        echo '<script type="text/javascript"> alert("POR FAVOR DILIGENCIE TODOS LOS CAMPOS")</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <title>HASSOFT</title>
</head>

<body>
    <header id="header">
        <div class="sesion">
            <h3>Usuario: <?php echo $varsesion ?></h3>
            <a href="cerrarsesion.php" class="btn-sesion">Cerrar Sesión</a>
        </div>
        <div class="center">
            <!--Logo-->
            <div id="logo">
                <img src="images/Hassoft.PNG" class="app-logo" alt="logotipo">
                <span id="brand"><strong>HASSOFT</span>

            </div>

            <!--LIMPIAR FLOTADOS-->
            <div class="clearfix"></div>
        </div>
    </header>
    <div id="slider" class="slider-big">
        <!--Menu-->
        <nav id="menu">
            <ul>
                <li><a href="paginaPpal.php">Inicio</a></li>
                <li><a href="persona.php">Persona</a></li>
                <li><a href="categoria.php">Categoria</a></li>
                <li><a href="finca.php">Finca</a></li>
                <li><a href="perfil.php">Perfiles</a></li>
            </ul>
        </nav>
    </div>
    <div class="clearfix"></div>
    <div class="bloque">
        <form action="" method="post" class="form">
            <h3><a href=""><i class="far fa-id-card"></i></a>CATEGORIA</h3>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre">
            <label for="descripcion">Descripción</label>
            <input type="text" name="descripcion" id="descripcion" placeholder="Descripción">
            <label for="inicial">Peso Inicial</label>
            <input type="number" name="inicial" id="inicial" placeholder="Peso Inicial">
            <label for="final">Peso Final</label>
            <input type="number" name="final" id="final" placeholder="Peso Final">
            <label for="estado">Estado</label>
            <select name="estado" id="estado">
                <option value="" disabled selected>--Seleccione--</option>
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
            </select>
            <input type="submit" value="REGISTRAR" name="Registrar" class="btn-sesion">
        </form>
    </div>


    <footer id="footer">
        <div class="center">
            <p>&copy; HASSOFT TODOS LOS DERECHOS RESERVADOS</p>
        </div>

    </footer>
</body>

</html>