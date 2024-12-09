<?php
    include("./php/conexion.php");
?>
<?php
            include("./php/guardar.php");
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
    <main>
        <h1 style="text-align: center;">Desempeño de Mecánicos</h1>
        <form class="notop" method="POST" >
        <input type="text" name="formulario" value="mecanico-mandar" hidden>
            <label for="mecanico">Selecciona un mecánico:</label>
            <select required name="mecanico" id="mecanico">
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
            <button type="submit" value="guardar" name="guardar">Generar reporte</button>
        </form>
        
        
    </main>
    <footer>
        <p>Avenida Andrés Molina Enríque S/N</p>
        <p>55 100 97293</p>
    </footer>
</body>
<script src="js/errores.js"></script>
<script src="js/hamb.js"></script>
</html>