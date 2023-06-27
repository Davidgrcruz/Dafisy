
<?php

$servername = "localhost";
$username = "root";
$password = "";
$database="usuario";


$conn = mysqli_connect("$servername","$username","$password","$database");


    if (!$conn){
        die ("error faltal". mysqli_connect_error()); 
    }else{

    }
       echo "Registro Exitoso:";
?>