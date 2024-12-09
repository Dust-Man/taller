<?php
    include("./php/conexion.php");
?>
<?php
        include("./php/guardar.php")
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
    <h1>Nueva Nota</h1>
        <input type="text" name="formulario" value="nota" hidden>
        
        <label for="servicio">Servicio:</label>
        <select name="servicio" id="servicio">
            <option value="0" disabled selected>Seleccione una opción</option>
<?php
                $consulta = "SELECT * FROM servicio_cliente";
                $resultado = mysqli_query($enlace, $consulta);

                if($resultado->num_rows >0){
                    while($fila = $resultado->fetch_assoc()){
                        echo "<option value='".$fila["id_servicio"]."'>".$fila['nombre_cliente']." | ".$fila['falla']."</option>";
                    }
                }
?>
        </select>
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

        

        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" id="fecha">


        <label for="hora">Hora:</label>
        <input  type="time" name="hora" id="hora">

        <label for="cajero">Cajero:</label>
        <select name="cajero" id="cajero">
            <option value="0" disabled selected>Seleccione una opción</option>
<?php
                $consulta = "SELECT id_cajero , nombre FROM cajero";
                $resultado = mysqli_query($enlace, $consulta);

                if($resultado->num_rows >0){
                    while($fila = $resultado->fetch_assoc()){
                        echo "<option value='".$fila["id_cajero"]."'>".$fila['nombre']."</option>";
                    }
                }
?>
        </select>

        <label for="pago">Forma de pago:</label>
        <select name="pago" id="pago">
            <option value="0" disabled selected>Seleccione una opción</option>
<?php
                $consulta = "SELECT id_forma_pago , forma FROM forma_pago";
                $resultado = mysqli_query($enlace, $consulta);

                if($resultado->num_rows >0){
                    while($fila = $resultado->fetch_assoc()){
                        echo "<option value='".$fila["id_forma_pago"]."'>".$fila['forma']."</option>";
                    }
                }
?>
        </select>

        <label for="total">Total:</label>
        <input type="number" name="total" id="total">


        <div class="contenedor-submit">
            <button type="submit" value="guardar" name="guardar">Guardar Nota</button>
            <button type="submit" value="guardar_imprimir" name="guardar_imprimir">Guardar e Imprimir</button>
        </div>

    </form>

    <footer>
        <p>Avenida Andrés Molina Enríque S/N</p>
        <p>55 100 97293</p>
    </footer>
</body>
<script src="js/errores.js"></script>
<script src="js/hamb.js"></script>
</html>