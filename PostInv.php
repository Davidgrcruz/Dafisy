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
                    <a href="PagP.html" class="Bt">inicio</a>
                    <a href="ventas" class="Bt">ventas</a>
                    <a href="Inventario.php" class="Bt">inventario</a>
                    <a href="#" class="Bt">Contactenos</a>
                </nav>
                </th>
    </table>
    
</header>
<main>

<?php

include_once "htmlcon.php";

$Nombre = $_POST["Nombre_producto"];
$Ctec= $_POST["C_tecnicas"];
$No_id = $_POST["ID_producto"];
$marca = $_POST["marca"];
$Cat = $_POST["categoria"];
$Precio = $_POST["Precio"];
$estado = $_POST["estado_P"];
$stock = $_POST["stock"];


$sql = "INSERT INTO producto (Nombre_producto,C_tecnicas,ID_producto,marca,categoria,Precio,estado_P,stock) VALUES ('$Nombre', '$Ctec', '$No_id', '$marca', '$Cat', '$Precio', '$estado','$stock')";

if ($conn->query($sql)) {
    echo "Registro exitoso";
} else {
    echo "Error fatal: " . $conn->error;
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