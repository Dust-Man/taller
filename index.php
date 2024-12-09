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
        <div class="mainrepo">
            <div class="card-container">
                <div class="card">
                    <div class="card-image-container">
                        <img src="https://servitechapp.com/wp-content/uploads/2023/03/MECANICOS-TALLER.jpg" alt="">
                    </div>
                    <p>Desempeño de Mecánicos</p>
                    <a href="mecanico-mandar.php">Ir</a>
                </div>
                <div class="card">
                    <div class="card-image-container">
                        <img src="https://www.sistemaimpulsa.com/blog/wp-content/uploads/2019/02/aumentarlasventascrecer-es-63-696x538.jpg" alt="">
                    </div>
                    <p>Reporte de ventas</p>
                    <a href="reporte-ventas.php">Ir</a>
                </div>
                <div class="card">
                    <div class="card-image-container">
                        <img src="https://cdn.forbes.com.mx/2023/09/mantenimiento-auto-reparacion-automotriz.vehiculo-640x360.webp" alt="">
                    </div>
                    <p>Autos en reparación</p>
                    <a href="autos-en-reparacion.php">Ir</a>
                </div>
            </div>
        </div>
    <footer>
        <p>Avenida Andrés Molina Enríque S/N</p>
        <p>55 100 97293</p>
    </footer>
</body>
<script src="js/errores.js"></script>
<script src="js/hamb.js"></script>
</html>