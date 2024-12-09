<?php
    include("./php/conexion.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tallerin</title>
    <link rel="icon" type="image/png" href="img/logocf.png">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/67ae9cb33f.js" crossorigin="anonymous"></script>
</head>

<body>
    <header id="header">
        <div class="logo-container">
            <a href="index.html">
                <img src="img/logo.png" alt="logo">
            </a>
        </div>
        <nav class="nav" id="nav">
            <ul class="nav-list">
                <li><a href="carro.php">Registrar auto</a></li>
                <li><a href="cliente.php">Registrar cliente</a></li>
                <li><a href="mecanico.php">Registrar mecánico</a></li>
                <li><a href="cajero.php">Registrar cajero</a></li>
                <li><a href="nota.php">Nueva nota</a></li>
                <li><a href="servicio.php">Nuevo servicio</a></li>
                <li><a class="areportes" href="reportes.php">Reportes</a></li>
               
            </ul>
        </nav>
        <button id="hamb" class="hamb"><i class="fa-solid fa-bars"></i></button>
        </div>
    </header>
<div class="contenedor-impresion">
    <div class="header-impresiones">
        <div class="contenedor-logo-impresiones">
            <img src="img/logocf.png" alt="logo">
        </div>
        <div>
            <h1>Nota de Servicio</h1>
            <p>Tallerin S.A. de C.V</p>
        </div>
    </div>
        <?php
    include("./php/conexion.php");
    
    if (isset($_GET['id_nota'])) {
        $id_nota = $_GET['id_nota'];
        $consulta = "SELECT * FROM info_notas WHERE id_nota = $id_nota";
        $resultado = mysqli_query($enlace, $consulta);
    
        if ($fila = mysqli_fetch_assoc($resultado)) {
            // Mostrar los datos de la nota para impresión
            echo "<p>Servicio: " . $fila['falla'] . "</p>";
            echo "<p>Cliente: " . $fila['nombre_cliente'] . "</p>";
            echo "<p>Fecha de ingreso: " . $fila['fecha_ingreso'] . "</p>";
            echo "<p>Fecha de salida: " . $fila['fecha'] . "</p>";
            echo "<p>Hora de expedición de nota: " . $fila['hora'] . "</p>";
            echo "<p>Cajero: " . $fila['nombre_cajero'] . "</p>";
            echo "<p>Forma de pago: " . $fila['forma'] . "</p>";
            echo "<p><b>Total</b>: $" . $fila['total'] . "</p>";
            // Agrega aquí más detalles si es necesario
        } else {
            echo "No se encontró la nota.";
        }
    } else {
        echo "ID de nota no proporcionado.";
    }
    ?>
    <button id="btn-imprimir" type="submit" value="imprimir" name="imprimir">Imprimir</button>

    
</div>


    <footer id="footer">
        <p>Avenida Andrés Molina Enríque S/N</p>
        <p>55 100 97293</p>
    </footer>
</body>
<script src="js/imprimir.js"></script>
<script src="js/errores.js"></script>
<script src="js/hamb.js"></script>

</html>