<?php
    if(isset($_POST['guardar']) || isset($_POST['guardar_imprimir'])){
        if($_POST['formulario']=='carro'){
            $cliente = $_POST['cliente'];
            $placa = $_POST['placa'];
            $ano = $_POST['ano'];
            $modelo = $_POST['modelo'];
            $marca = $_POST['marca'];
            $version = $_POST['version'];
    
            $query = "INSERT INTO carro VALUES ('','$cliente','$placa','$ano','$modelo','$marca','$version')";
            $ejecutar = mysqli_query($enlace,$query);
            if ($ejecutar) {
                echo "<div class='exito' id='mensaje'><span>Registro guardado exitosamente</span><span id='cerrar-mensaje'>X</span></div>";
            } else {
                echo "<div class='error' id='mensaje'><span>Error al guardar el registro: " . mysqli_error($enlace) . "</span><span id='cerrar-mensaje'>X</span></div>";
            }
        }

        if($_POST['formulario']=='cliente'){
            $domicilio = $_POST['domicilio'];
            $nombre = $_POST['nombre'];
            $telefono = $_POST['telefono'];
            $correo = $_POST['correo'];
            $rfc = $_POST['rfc'];
            $query = "INSERT INTO cliente VALUES ('','$domicilio','$nombre','$telefono','$correo','$rfc')";
            $ejecutar = mysqli_query($enlace,$query);
            if ($ejecutar) {
                echo "<div class='exito' id='mensaje'><span>Registro guardado exitosamente</span><span id='cerrar-mensaje'>X</span></div>";
            } else {
                echo "<div class='error' id='mensaje'><span>Error al guardar el registro: " . mysqli_error($enlace) . "</span><span id='cerrar-mensaje'>X</span></div>";
            }
        }

        if($_POST['formulario']=='mecanico'){
            $nombre = $_POST['nombre'];
            $carrera = $_POST['carrera'];
            $curp = $_POST['curp'];
            $rfc = $_POST['rfc'];
            $correo = $_POST['correo'];
            $telefono = $_POST['telefono'];
            $domicilio = $_POST['domicilio'];
            
            $query = "INSERT INTO mecanico VALUES ('','$nombre','$carrera','$curp','$rfc','$correo','$domicilio','$telefono')";
            $ejecutar = mysqli_query($enlace,$query);
            if ($ejecutar) {
                echo "<div class='exito' id='mensaje'><span>Registro guardado exitosamente</span><span id='cerrar-mensaje'>X</span></div>";
            } else {
                echo "<div class='error' id='mensaje'><span>Error al guardar el registro: " . mysqli_error($enlace) . "</span><span id='cerrar-mensaje'>X</span></div>";
            }
        }

        if($_POST['formulario']=='cajero'){
            $nombre = $_POST['nombre'];
            $telefono = $_POST['telefono'];
            $correo = $_POST['correo'];
            
            
            $query = "INSERT INTO cajero VALUES ('','$nombre','$telefono','$correo')";
            $ejecutar = mysqli_query($enlace,$query);
            if ($ejecutar) {
                echo "<div class='exito' id='mensaje'><span>Registro guardado exitosamente</span><span id='cerrar-mensaje'>X</span></div>";
            } else {
                echo "<div class='error' id='mensaje'><span>Error al guardar el registro: " . mysqli_error($enlace) . "</span><span id='cerrar-mensaje'>X</span></div>";
            }
        }

        if($_POST['formulario']=='nota'){
            $servicio = $_POST['servicio'];
            $cliente = $_POST['cliente'];
            $fecha = $_POST['fecha'];
            $hora = $_POST['hora'];
            $cajero = $_POST['cajero'];
            $pago = $_POST['pago'];
            $total = $_POST['total'];
            
            $query = "INSERT INTO nota VALUES ('','$servicio','$cliente','$fecha','$hora','$cajero','$pago','$total')";
            $ejecutar = mysqli_query($enlace,$query);
            if(isset($_POST['guardar'])){
                if ($ejecutar) {
                    echo "<div class='exito' id='mensaje'><span>Registro guardado exitosamente</span><span id='cerrar-mensaje'>X</span></div>";
                } else {
                    echo "<div class='error' id='mensaje'><span>Error al guardar el registro: " . mysqli_error($enlace) . "</span><span id='cerrar-mensaje'>X</span></div>";
                }
            }
            if(isset($_POST['guardar_imprimir'])){
                $ultimo_id = mysqli_insert_id($enlace);
                header("Location: imprimir.php?id_nota=" . $ultimo_id);
            }
        }
        if($_POST['formulario']=='servicio'){
            $cliente = $_POST['cliente'];
            $mecanico = $_POST['mecanico'];
            $carro = $_POST['carro'];
            $fingreso = $_POST['fingreso'];
            $falla = $_POST['falla'];
    
            
            $query = "INSERT INTO servicio VALUES ('','$cliente','$mecanico','$carro','$fingreso',NULL,'$falla')";
            $ejecutar = mysqli_query($enlace,$query);
            if(isset($_POST['guardar'])){
                if ($ejecutar) {
                    echo "<div class='exito' id='mensaje'><span>Registro guardado exitosamente</span><span id='cerrar-mensaje'>X</span></div>";
                } else {
                    echo "<div class='error' id='mensaje'><span>Error al guardar el registro: " . mysqli_error($enlace) . "</span><span id='cerrar-mensaje'>X</span></div>";
                }
            }
            if(isset($_POST['guardar_imprimir'])){
                $ultimo_id = mysqli_insert_id($enlace);
                header("Location: imprimir.php?id_nota=" . $ultimo_id);
            }
        }

        

        if($_POST['formulario']=='mecanico-mandar'){
            $id_mecanico = $_POST['mecanico'];
            header("Location: reporte-mecanico.php?mecanico=" . $id_mecanico);
        }
    }
?>