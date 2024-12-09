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
    <h1>Registrar Cajero</h1>
        <input type="text" name="formulario" value="cajero" hidden>


        <label for="nombre">Nombre completo:</label>
        <input type="text" name="nombre" id="nombre">

        <label for="telefono">Telefono:</label>
        <input type="tel" name="telefono" id="telefono">

        <label for="correo">Correo:</label>
        <input type="email" name="correo" id="correo">
        
        

        
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