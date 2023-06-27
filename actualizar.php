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

$sql = "UPDATE SH SET Nombre = '$Nombre', Apellido = '$Apell', Email = '$Email', Dir = '$Direc', Pass = '$Pass', Tel = '$tel', Fec = '$fec' WHERE ID = '$No_id'";

if ($conn->query($sql)) {
    echo "Actualizacion Exitosa";
} else {
    echo "Error fatal: " . $conn->error;
}

?>
