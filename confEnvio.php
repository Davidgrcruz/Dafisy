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
        <button type="submit" class="inc"> <a href="CRUD.php">usuarios</a></button><br>
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

$sql = "SELECT * FROM SH";

echo '<table class"Ti">
    <tr>
    <th>Nombre</th>
    <th>Apellidos</th>
    <th>ID</th>
    <th>email</th>
    <th>direccion</th>
    <th>contraseña</th>
    <th>telefono</th>
    <th>fecha nacimiento</th>
    <th>Actualizar</th>
    <th>Eliminar</th>
    </tr>';

    if ($rta = $conn->query($sql)){
        while ($row = $rta->fetch_assoc()){
            $Nombre = $row ["Nombre"];
            $Apell = $row ["Apellido"];
            $No_id = $row ["ID"];
            $Email = $row ["Email"];
            $Direc= $row ["Dir"];
            $Pass = $row ["Pass"];
            $Tel= $row ["Tel"];
            $fec= $row ["Fec"];
            
            
            echo "
            <tr>
            <td>$Nombre</td>
            <td>$Apell</td>
            <td>$No_id</td>
            <td>$Email</td>
            <td>$Direc</td>
            <td>$Pass</td>
            <td>$Tel</td>
            <td>$fec</td>
            <td><a href='CRUD.php?ID=$No_id'>Actualizar</a></td>
            <td> <a href=''>Eliminar</a> </td>
            </tr>";
    }
   
    $rta -> free();
}?>

<br>

</table>

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