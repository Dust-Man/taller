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
    <h1>Nuevo Servicio</h1>
        <input type="text" name="formulario" value="servicio" hidden>
        
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

        <label for="mecanico">Mecánico:</label>
        <select name="mecanico" id="mecanico">
            <option value="0" disabled selected>Seleccione una opción</option>
            <?php
                $consulta = "SELECT id_mecanico, nombre FROM mecanico";
                $resultado = mysqli_query($enlace, $consulta);

                if($resultado->num_rows >0){
                    while($fila = $resultado->fetch_assoc()){
                        echo "<option value='".$fila["id_mecanico"]."'>".$fila['nombre']."</option>";
                    }
                }
            ?>
        </select>

        <label for="carro">Auto:</label>
        <select name="carro" id="carro">
            <option value="0" disabled selected>Seleccione una opción</option>
            <?php
                $consulta = "SELECT id_carro, placa, modelo, marca FROM carro";
                $resultado = mysqli_query($enlace, $consulta);

                if($resultado->num_rows >0){
                    while($fila = $resultado->fetch_assoc()){
                        echo "<option value='".$fila["id_carro"]."'>".$fila['placa']." | ".$fila['marca']." ".$fila['modelo']."</option>";
                    }
                }
            ?>
        </select>

        <label for="fingreso">Fecha de Ingreso:</label>
        <input type="date" name="fingreso" id="fingreso">


        <label for="falla">Falla:</label>
        <input  type="text" name="falla" id="falla">


        <div class="contenedor-submit">
            <button type="submit" value="guardar" name="guardar">Resgistrar Servicio</button>
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