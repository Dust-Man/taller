<?php
    include("./php/conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taller</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
        <div class="logo-container">
           <a href="index.html">
             <img src="img/logo.png" alt="logo">
           </a>
        </div>
        <h2>Taller Mecánico</h2>
        
        <nav>
            <a href="doctor.php" >Doctor</a>
            <a href="paciente.php" class="selected">Paciente</a>
            <a href="cita.php">Cita</a>
        </nav>
    </header>
    <form action="" method="post">
    <h1>Paciente</h1>
        <input type="text" name="formulario" value="paciente" hidden>
        
        <label for="paciente-nombre">Nombre: </label>
        <input type="text" name="paciente-nombre" id="paciente-nombre">

        <label for="paciente-nacimiento">Fecha de nacimiento:</label>
        <input type="date" name="paciente-nacimiento" id="doctor-nacimiento">

        <label for="paciente-curp">CURP</label>
        <input type="text" name="paciente-curp" id="paciente-curp">
        
        <label for="paciente-telefono">Teléfono:</label>
        <input type="tel" name="paciente-telefono" id="paciente-telefono">

        <label for="paciente-correo">Correo</label>
        <input type="email" name="paciente-correo" id="paciente-correo">

        <label for="paciente-domicilio">Domicilio</label>
        <input type="text" name="paciente-domicilio" id="paciente-domicilio">


        <div class="contenedor-submit">
            <button type="submit" value="guardar" name="guardar">Resgistrar Paciente</button>
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
</html>