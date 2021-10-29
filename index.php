<?php
session_start();
$errores = '';

if(isset($_POST['Ingresar'])){
    $usuario = $_POST['usuario'];
    $clave = $_POST['contraseña'];
    
    if(!empty($usuario)){
        $usuario = trim($usuario);
        $usuario = filter_var($usuario, FILTER_SANITIZE_STRING);
    }else{
        $errores .= "Ingrese un Usuario";
    }
    if(!empty($clave)){
        $clave = trim($clave);
        $clave = filter_var($clave, FILTER_SANITIZE_STRING);
    }else{
        $errores .= "Ingrese la Clave";
    }
    require_once 'control/controlUsuario.php';
    $controlUsuario = new ControlUsuario();
    $users = $controlUsuario->consultaUsuario($usuario);

    foreach ($users as $user){
        $password = $user->clave;
        $nombre = $user->nombre;
    }
    if(($clave === $password)){
        $_SESSION['usuario'] = $nombre;
        header('location:paginaPpal.php');
    }else{
        echo '<script type="text/javascript"> alert("Ingrese Su Contraseña Correcta")</script>';
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <title>LOGIN HASSOFT</title>
</head>
<body class="cuerpo">
    <div class="article">
            <form class="formulario" method="post">
                <H1><p>HASSOFT</p></H1>
                <label for="usuario"><a href="" ><i class="fas fa-user" id="icon"></i></a>Usuario</label>
                <input type="text" name="usuario" id="usuario">
                <label for="contraseña"> <br><a href=""><i class="fas fa-unlock-alt" id="icon"></i></a>Contraseña</label>
                <input type="password" name="contraseña" id="contraseña">
                <input type="submit" value="Ingresar" name="Ingresar" id="btn">
            </form>
    </div>
    
</body>
</html>