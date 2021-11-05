<?php
require_once 'control/controlFinca.php';
require_once 'control/controlMunicipio.php';
$controlMunicipio = new ControlMunicipio();
$controlFinca = new ControlFinca();
$fincas = $controlFinca->consultaFinca();
session_start();
$varsesion = $_SESSION['usuario'];
error_reporting(0);
if ($varsesion == null || $varsesion == '') {
    echo '<script type="text/javascript"> alert("USTED NO TIENE AUTORIZACIÓN")</script>';
    die();
    header('location:index.php');
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
                <li><a href="categoria.php">Categoría</a></li>
                <li><a href="finca.php">Finca</a></li>
                <li><a href="perfil.php">Perfiles</a></li>
            </ul>
        </nav>
    </div>
    <div class="clearfix"></div>
    <div class="separacion">
        <table class="tabla">
            <h2 id="titulo">Consulta Categorias</h2>
            <tr class="celdas">
                <th>Nombres</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Número Hectáreas</th>
                <th>Municipio</th>
                <th>estado</th>
                <th>modificar</th>
            </tr>

            <?php foreach ($fincas as $finca) :
                $id = $finca->cod_finca;
                $municipios = $controlMunicipio->consultaMunicipioPorId($id);?>
                <tr class="filas">
                    <td><?= $finca->nombre ?></td>
                    <td><?= $finca->direccion ?></td>
                    <td><?= $finca->telefono?></td>
                    <td><?= $finca->correo?></td>
                    <td><?= $finca->nro_hectareas_cultivadas?></td>
                    <?php foreach($municipios as $municipio):?>
                    <td><?= $municipio->nombre?></td>
                    <?php endforeach; ?>
                    <td><?= $finca->estado ? 'ACTIVO' : 'NO' ?></td>
                    <td><a href="modificaFinca.php?codFinca=<?= $finca->cod_finca ?>" class="btn-table">Modificar</a></td>
                </tr>
            <?php endforeach; ?>

        </table>
    </div>
    <div class="clearfix"></div>


    <footer id="footer">
        <div class="center">
            <p>&copy; HASSOFT TODOS LOS DERECHOS RESERVADOS</p>
        </div>

    </footer>
</body>

</html>
