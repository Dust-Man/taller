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
    <main>
        <h1>Ventas del año en curso: </h1>
<?php

        $anio_actual = date("Y");
        $sql = "SELECT SUM(total) AS suma_total FROM nota WHERE YEAR(fecha)='$anio_actual'";
        $resultado = $enlace->query($sql);

// Paso 3: Guardar el valor en una variable
        if ($resultado->num_rows > 0) {
            // Obtener el valor de la suma
            $fila = $resultado->fetch_assoc();
            $suma_total = $fila['suma_total']; // Guardar la suma en una variable PHP
            echo "<h2>Este año se han generado: $" . $suma_total."</h2>";
        } else {
            echo "No se encontraron resultados.";
        }


        $sql = "SELECT MONTH(fecha) AS mes, SUM(total) AS suma_total FROM nota WHERE YEAR(fecha)='$anio_actual' GROUP BY MONTH(fecha)";
        $resultado = $enlace->query($sql);
        
        if ($resultado->num_rows > 0) {
            $totales_por_mes = array_fill(1, 12, 0); // Inicializar un arreglo con 12 elementos en 0
        
            while ($fila = $resultado->fetch_assoc()) {
                $mes = $fila['mes'];
                $suma_total = $fila['suma_total'];
                $totales_por_mes[$mes] = $suma_total; // Almacenar la suma en el mes correspondiente
            }
        
            $meses = json_encode(array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'));
            $totales = json_encode(array_values($totales_por_mes));
        } else {
            echo "No se encontraron resultados.";
        }
        
        
?>

    <div>
        <canvas id="totalesGrafica"></canvas>
    </div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const meses = <?php echo $meses; ?>; // Meses del año
    const totales = <?php echo $totales; ?>; // Totales por mes

    const ctx = document.getElementById('totalesGrafica').getContext('2d');
    const totalesGrafica = new Chart(ctx, {
        type: 'bar', // Gráfico de barras
        data: {
            labels: meses, // Etiquetas de los meses
            datasets: [{
                label: 'Total por Mes',
                data: totales, // Datos de los totales
                backgroundColor: 'rgba(75, 192, 192, 0.2)', // Color de las barras
                borderColor: 'rgba(75, 192, 192, 1)', // Color del borde de las barras
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true // Comenzar el eje Y desde cero
                }
            },
            plugins: {
                legend: {
                    display: true,
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

    </main>


    <footer>
        <p>Avenida Andrés Molina Enríque S/N</p>
        <p>55 100 97293</p>
    </footer>
</body>
<script src="js/errores.js"></script>
<script src="js/hamb.js"></script>

</html>