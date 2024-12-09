<?php
    error_reporting(0);

    include("./php/conexion.php");
    if(isset($_POST['guardar'])){
        $servicio = $_POST['id-servicio'];
        $query = "UPDATE servicio SET fecha_salida = '2024-10-19' WHERE id_servicio ='$servicio'";

        $ejecutar = mysqli_query($enlace,$query);
        if ($ejecutar) {
            
            echo "<div class='exito' id='mensaje'><span>Se marco como terminado</span><span id='cerrar-mensaje'>X</span></div>";
            
        } else {
            echo "<div class='error' id='mensaje'><span>Error al guardar el registro: " . mysqli_error($enlace) . "</span><span id='cerrar-mensaje'>X</span></div>";
        }
    }
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
        <h1>Autos en Reparación</h1>

        <form class="no-mtop" action="" method="post">
            <label for="filtrado">Filtrar por:</label>
            <select name="filtrado" id="filtrado">
                <option value="0" disabled selected>Seleccione una opción</option>
                <option value="1">Mecánico</option>
                <option value="2">Cliente</option>
                <option value="3">Auto</option>

            </select>

            <div id="mecanico-container" class="input-container" style="display: none;">
                <select name="mecanico" id="mecanico">
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

            </div>

            <div id="cliente-container" class="input-container" style="display: none;">
                <select name="cliente" id="cliente">
                    <?php
                    $consulta = "SELECT id_cliente, nombre_completo FROM cliente";
                    $resultado = mysqli_query($enlace, $consulta);
            
                    if($resultado->num_rows >0){
                        while($fila = $resultado->fetch_assoc()){
                            echo "<option value='".$fila["id_cliente"]."'>".$fila['nombre_completo']."</option>";
                        }
                    }
                ?>
                </select>
            </div>

            <div id="auto-container" class="input-container" style="display: none;">
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
            </div>
            <button type="submit" name="filtrar">Filtrar</button>
        </form>
        <?php
            if(isset($_POST['filtrar'])){
                $opcion_de_filtrado = $_POST['filtrado'];
                $id_mecanico = $_POST['mecanico'];
                $id_cliente = $_POST['cliente'];
                $id_auto = $_POST['carro'];
            }
        ?>

        <div class="gridos">
            <?php
                if(isset($opcion_de_filtrado) and $opcion_de_filtrado=="1"){
                    $consulta = "SELECT * FROM carros_meca WHERE fecha_salida IS NULL AND id_mecanico = '$id_mecanico'";
                    $resultado = mysqli_query($enlace, $consulta);
                }
                elseif(isset($opcion_de_filtrado) and $opcion_de_filtrado=="2"){
                    $consulta = "SELECT * FROM carros_meca WHERE fecha_salida IS NULL AND id_cliente = '$id_cliente'";
                    $resultado = mysqli_query($enlace, $consulta);
                }
                elseif(isset($opcion_de_filtrado) and $opcion_de_filtrado=="3"){
                    $consulta = "SELECT * FROM carros_meca WHERE fecha_salida IS NULL AND id_carro = '$id_auto'";
                    $resultado = mysqli_query($enlace, $consulta);
                }
                else{
                    $consulta = "SELECT * FROM carros_meca WHERE fecha_salida IS NULL";
                    $resultado = mysqli_query($enlace, $consulta);
                }
                
    
                if($resultado->num_rows >0){
                    while($fila = $resultado->fetch_assoc()){
                        echo "<div><p>Auto: ".$fila['marca']." ".$fila['modelo']."</p><p>Servicio: ".$fila['falla']."</p><p>Mecánico: ".$fila['nombre_mecanico']."</p><p>Cliente: ".$fila['nombre_cliente']."</p>";
                        echo "<form method='post' class='hidden-form'><input hidden type='text' name='id-servicio' value='".$fila['id_servicio']." '>";
                        echo "<button type='submit' name='guardar'>Marcar como terminado</button></form></div>"; 
                    }     
                }else{
                    echo "<div class='normal' id='mensaje'><span>No hay autos que coincidan con ese filtro</span><span id='cerrar-mensaje'>X</span></div>";
                }
                ?>
        </div>
    </main>
    <footer>
        <p>Avenida Andrés Molina Enríque S/N</p>
        <p>55 100 97293</p>
    </footer>
</body>
<script src="js/errores.js"></script>
<script src="js/hamb.js"></script>
<script src="js/opcionesfiltrado.js"></script>

</html>