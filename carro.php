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
<header>
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
    <form action="" method="post">
    <h1>Registrar Auto</h1>
        <input type="text" name="formulario" value="carro" hidden>
        
        <label for="cliente">Cliente:</label>
        <select name="cliente" id="cliente">
            <option value="0" disabled selected>Seleccione una opción</option>
            <?php
                $consulta = "SELECT id_cliente , nombre_completo FROM cliente";
                $resultado = mysqli_query($enlace, $consulta);

                if($resultado->num_rows >0){
                    while($fila = $resultado->fetch_assoc()){
                        echo "<option value='".$fila["id_cliente"]."'>".$fila['nombre_completo']."</option>";
                    }
                }
            ?>
        </select>

        <label for="placa">Placa:</label>
        <input type="placa" name="placa" id="placa">


        <label for="ano">Año:</label>
        <input  type="number" name="ano" id="ano">

        <label for="modelo">Modelo:</label>
        <input type="modelo" name="modelo" id="modelo">

        <label for="marca">Marca:</label>
        <input type="text" name="marca" id="marca">

        <label for="version">Version:</label>
        <input type="text" name="version" id="version">

        <div class="contenedor-submit">
            <button type="submit" value="guardar" name="guardar">Resgistrar Auto</button>
        </div>

    </form>

    <?php
        include("./php/guardar.php")
    ?>
    <footer>
        <p>Avenida Andrés Molina Enríque S/N</p>
        <p>55 100 97293</p>
    </footer>
</body>
<script src="js/errores.js"></script>
<script src="js/hamb.js"></script>
</html>