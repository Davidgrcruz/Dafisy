<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DAFISY</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.lineicons.com/4.0/lineIcons.css">
</head>

<body>
    <!-- Navbar Start -->
    <header>
        <div class="Ses">
        <button type="submit" class="inc"> <a href="SantiGr.php">Acceder</a></button><br>
        </div>
        <table class="Ti">
                <th>
                    <img src="img/Santi.png" class="avatar" style="width: 90px; height: 100px;">
                </th>
                <th>
                    <h1>DAFISY</h1>
                </th>
                <th>
                    <nav class="Mi">
                        <a href="PagP.html" class="Bt">Inicio</a>
                        <a href="quienessomos.html" class="Bt">Quienes somos</a>
                        <a href="servicios.html" class="Bt">servicios</a>
                        <a href="#" class="Bt">Contactenos</a>
                    </nav>
                </th>
    </table>
    
</header>
<main>

<?php
include_once "htmlcon.php";

if (isset($_POST['agregar'])) {
    $ID_cliente = $_POST['ID_cliente'];
    $nombre_cliente = $_POST['nombre_cliente'];
    $telefono_cliente = $_POST['telefono_cliente'];
    $codigo_compra = $_POST['codigo_compra'];
    $valor_compra = $_POST['valor_compra'];
    $fecha_compra = $_POST['fecha_compra'];
    $ID_producto = $_POST['ID_producto'];

    $sql_cliente = "INSERT INTO clientes (ID_cliente, nombre_cliente, telefono_cliente) 
                    VALUES ('$ID_cliente', '$nombre_cliente', '$telefono_cliente')";

    $sql_venta = "INSERT INTO ventas (codigo_compra, valor_compra, fecha_compra, ID_cliente, ID_producto) 
                  VALUES ('$codigo_compra', '$valor_compra', '$fecha_compra', '$ID_cliente', '$ID_producto')";

    if ($conn->query($sql_cliente) && $conn->query($sql_venta)) {
        echo "Datos insertados correctamente en las tablas clientes y ventas.";
    } else {
        echo "Error al insertar datos en las tablas clientes y ventas: " . $conn->error;
    }
}
?>
<br>



</main>

<footer>
        
        <h4 class="Con">Contactenos</h4>
        <p>Bogota, Colombia, Dafisy</p>
        <p>+57 3227048263</p>
        <p class="RD1">davidgarciacruz13@gmail.com</p>

        <div class="F9">
            <h4>Redes</h4>
            <p>No contamos con redes en el momento</p>
        </div>
        
            <div class="social-container">
                <a href="#" class="social"><i class="lni lni-facebook-fill"></i></a>
                <a href="#" class="social"><i class="lni lni-google"></i></a>
                <a href="#" class="social"><i class="lni lni-linkedin-original"></i></a>
            </div>

                <h4 class="Sug">Sugerencias</h4>
                <p>ayudenos a mejorar para una mejor experiencia</p>
                    <div class="input-group">
                        <input type="text" class="box" style="padding: 25px;"
                            placeholder="Sugerencia"><br>
                        <div class="input-group-append">
                            <button class="btn">Enviar</button>
                        </div>
                    </div>
    </footer>




</body>
</html>