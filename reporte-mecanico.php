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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
        <?php
            
                $mecanico = $_GET['mecanico'];

                $query = "SELECT nombre FROM mecanico WHERE id_mecanico= '$mecanico'";
                $ejecutar = mysqli_query($enlace,$query);
                $resultado = mysqli_fetch_assoc($ejecutar);
                $nombre = $resultado['nombre'];
                echo "<h1> Reporte de resultados de: " .$nombre."</h1>";
                
                $query = "SELECT COUNT(*) AS total FROM servicio WHERE id_mecanico='$mecanico';";
                $ejecutar = mysqli_query($enlace,$query);
                $resultado = mysqli_fetch_assoc($ejecutar);
                $total = $resultado['total'];
               
                
                $query = "SELECT COUNT(*) AS enProceso FROM servicio WHERE fecha_salida IS NULL AND id_mecanico='$mecanico';";
                $ejecutar = mysqli_query($enlace,$query);
                $resultado = mysqli_fetch_assoc($ejecutar);
                $enProceso =$resultado['enProceso'];
                
                
                $query = "SELECT COUNT(*) AS terminado FROM servicio WHERE fecha_salida IS NOT NULL AND id_mecanico='$mecanico';";
                $ejecutar = mysqli_query($enlace,$query);
                $resultado = mysqli_fetch_assoc($ejecutar);
                $terminado =$resultado['terminado'];
                

                $query = "SELECT SUM(total) AS generado FROM dinero_mecanico WHERE id_mecanico ='$mecanico';";
                $ejecutar = mysqli_query($enlace,$query);
                $resultado = mysqli_fetch_assoc($ejecutar);
                $generado =$resultado['generado'];
                
        ?>
        <div class="datos">
            <div class="conjunto-datos">
                <?php
                    echo "<p class='biggerp'>Este mecánico ha generado: $" . $generado."</p>";
                     echo "<p>Total de servicios atendidos:" . $total."</p>";
                     echo "<p>Servicios en proceso es: " . $enProceso."</p>";
                     echo "<p>Servicios terminados es: " . $terminado."</p>";
                ?>
            </div>
            <div class="contenedor-grafica">
                <canvas id="serviciosGrafica"></canvas>
            </div>
            <div>
                <h2>Autos en reparación:</h2>
                <table>
                <tr>
                    <th>Auto</th>
                    <th>Dueño</th>
                </tr>   
                <?php
                    $consulta = "SELECT * FROM carros_meca WHERE fecha_salida IS NULL AND id_mecanico= '$mecanico'";
                $resultado = mysqli_query($enlace, $consulta);

                if($resultado->num_rows >0){
                    while($fila = $resultado->fetch_assoc()){
                        echo "<tr><td>".$fila['marca']." ".$fila['modelo']."</td><td>".$fila["nombre_cliente"]."</td></tr>";
                    }
                }
                ?>
                </table>
            </div>
            <div>
                <h2>Autos Reparados:</h2>
                <table>
                <tr>
                    <th>Auto</th>
                    <th>Dueño</th>
                </tr>   
                <?php
                    $consulta = "SELECT * FROM carros_meca WHERE fecha_salida IS NOT NULL AND id_mecanico= '$mecanico'";
                $resultado = mysqli_query($enlace, $consulta);

                if($resultado->num_rows >0){
                    while($fila = $resultado->fetch_assoc()){
                        echo "<tr><td>".$fila['marca']." ".$fila['modelo']."</td><td>".$fila["nombre_cliente"]."</td></tr>";
                    }
                }
                ?>
                </table>
            </div>
        </div>

        </main>
        
        <script>
        const enProceso = <?php echo $enProceso; ?>;
        const terminado = <?php echo $terminado; ?>;
        
        </script>
        <script>
    const ctx = document.getElementById('serviciosGrafica').getContext('2d');
    const serviciosGrafica = new Chart(ctx, {
        type: 'pie', // Gráfica circular
        data: {
            labels: ['En proceso', 'Terminados'], // Etiquetas de los segmentos
            datasets: [{
                label: 'Servicios',
                data: [enProceso, terminado], // Los datos obtenidos de PHP
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)', // Color para "En proceso"
                    'rgba(75, 192, 192, 0.2)'  // Color para "Terminados"
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',    // Borde para "En proceso"
                    'rgba(75, 192, 192, 1)'     // Borde para "Terminados"
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw;
                        }
                    }
                }
            }
        }
    });
</script>


    <footer>
        <p>Avenida Andrés Molina Enríque S/N</p>
        <p>55 100 97293</p>
    </footer>
</body>
<script src="js/errores.js"></script>
<script src="js/hamb.js"></script>
</html>