<?php
include_once "htmlcon.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Nombre = $_POST["Nombre"];
    $Apell = $_POST["Apellido"];
    $No_id = $_POST["ID"];
    $Email = $_POST["Email"];
    $Direc = $_POST["Dir"];
    $Pass = $_POST["Pass"];
    $tel = $_POST["Tel"];
    $fec = $_POST["Fec"];
    $carg = $_POST["rol"];
    $est = $_POST["estado"];

    $sql = "UPDATE SH SET ";

    $updates = [];
    if (!empty($Nombre)) {
        $updates[] = "Nombre = '$Nombre'";
    }
    if (!empty($Apell)) {
        $updates[] = "Apellido = '$Apell'";
    }
    if (!empty($Email)) {
        $updates[] = "Email = '$Email'";
    }
    if (!empty($Direc)) {
        $updates[] = "Dir = '$Direc'";
    }
    if (!empty($Pass)) {
        $updates[] = "Pass = '$Pass'";
    }
    if (!empty($tel)) {
        $updates[] = "Tel = '$tel'";
    }
    if (!empty($fec)) {
        $updates[] = "Fec = '$fec'";
    }
    if (!empty($carg)) {
      $updates[] = "rol = '$carg'";
  }
  if (!empty($est)) {
    $updates[] = "estado = '$est'";
}

    $sql .= implode(", ", $updates);
    $sql .= " WHERE ID = '$No_id'";

    if ($conn->query($sql)) {
        echo "Actualización exitosa";
    } else {
        echo "Error fatal: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DAFISY</title>
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="https://cdn.lineicons.com/4.0/lineIcons.css">
    <script src="https://unpkg.com/xlsx@0.16.9/dist/xlsx.full.min.js"></script>
    <script src="https://unpkg.com/file-saverjs@latest/FileSaver.min.js"></script>
    <script src="https://unpkg.com/tableexport@latest/dist/js/tableexport.min.js"></script>
</head>

<body>
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
                    <a href="PagP.html" class="Bt">inicio</a>
                    <a href="venta.php" class="Bt">ventas</a>
                    <a href="Inventario.php" class="Bt">inventario</a>
                    <a href="#" class="Bt">Contactenos</a>
                </nav>
                </th>
    </table>
    
</header>

    <main>
        <table class="Ti" id="tabla">
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>ID</th>
                <th>Email</th>
                <th>Dirección</th>
                <th>Contraseña</th>
                <th>Teléfono</th>
                <th>Fecha de nacimiento</th>
                <th>Cargo</th>
                <th>estado</th>

            </tr>

            <?php
            $sql = "SELECT * FROM SH";

            if ($rta = $conn->query($sql)) {
                while ($row = $rta->fetch_assoc()) {
                    $Nombre = $row["Nombre"];
                    $Apell = $row["Apellido"];
                    $No_id = $row["ID"];
                    $Email = $row["Email"];
                    $Direc = $row["Dir"];
                    $Pass = $row["Pass"];
                    $Tel = $row["Tel"];
                    $fec = $row["Fec"];
                    $carg = $row["rol"];
                    $est = $row["estado"];

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
                        <td>$carg</td>
                        <td>$est</td>
                   
                    </tr>";
                }

                $rta->free();
            }
            ?>
        </table>

        <br>
<!-- Formulario para actualizar los datos del usuario -->

<table class="Formulario">
  <form action="CRUD.php" method="post">
    <tr>
      <td>
        <label for="Nombre">Nombres:</label>
        <input type="text" name="Nombre" id="Nombre">
        <br>
        <label for="Apellido">Apellidos:</label>
        <input type="text" name="Apellido" id="Apellido">
      </td>
      <td>
        <label for="ID">ID:</label>
        <input type="text" name="ID" id="ID">
        <br>
        <label for="Email">Email:</label>
        <input type="text" name="Email" id="Email">
      </td>
      <td>
        <label for="Dir">Dirección:</label>
        <input type="text" name="Dir" id="Dir">
        <br>
        <label for="Pass">Contraseña:</label>
        <input type="password" name="Pass" id="Pass">
      </td>
      <td>
        <label for="Tel">Teléfono:</label>
        <input type="text" name="Tel" id="Tel">
        <br>
        <label for="Fec">Fecha:</label>
        <input type="Date" name="Fec" id="Fec">
      </td>
    </tr>
    <tr>
        <td colspan="1">
        <label for="estado">cargo:</label> <br>
        <select name="rol" id="estado">
          <option value="administrador">Administrador</option>
          <option value="Empleado">Empleado</option>
        </select>
        <td colspan="1">
        <label for="estado">Estado:</label> <br>
        <select name="estado" id="estado">
          <option value="activo">Activo</option>
          <option value="inactivo">Inactivo</option>
        </select>
      </td>
      </td>
    </tr>
     
    <tr>
      <td colspan="4"><button class="Sti" type="submit" >Actualizar</button></td><br>
      
    </tr>
    <td colspan="4">
    <button id="btnExportar" class="Sti">
                <i class="fas fa-file-excel"></i> Generar Excel
            </button></td>
  </form>
</table>




    <footer>
    

            <script>
    const $btnExportar = document.querySelector("#btnExportar"),
        $tabla = document.querySelector("#tabla");

    $btnExportar.addEventListener("click", function() {
        let tableExport = new TableExport($tabla, {
            exportButtons: false, // No queremos botones
            filename: "Reporte", //Nombre del archivo de Excel
            sheetname: "Empleados", //Título de la hoja
        });
        let datos = tableExport.getExportData();
        let preferenciasDocumento = datos.tabla.xlsx;
        tableExport.export2file(preferenciasDocumento.data, preferenciasDocumento.mimeType, preferenciasDocumento.filename, preferenciasDocumento.fileExtension, preferenciasDocumento.merges, preferenciasDocumento.RTL, preferenciasDocumento.sheetname);
    });
</script>
    </footer>
</body>

</html>