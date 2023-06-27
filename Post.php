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

$Nombre = $_POST["Nombre"];
$Apell = $_POST["Apellido"];
$No_id = $_POST["ID"];
$Email = $_POST["Email"];
$Direc = $_POST["Dir"];
$Pass = $_POST["Pass"];
$tel = $_POST["Tel"];
$fec = $_POST["Fec"];
$cargo = $_POST["rol"];

$sql = "INSERT INTO SH (Nombre, Apellido, ID, Email, Dir, Pass, Tel, Fec,rol) VALUES ('$Nombre','$Apell','$No_id', '$Email', '$Direc', '$Pass', '$tel', '$fec','$cargo')";

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