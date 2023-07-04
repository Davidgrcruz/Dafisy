<?php
include_once "htmlcon.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Si se ha enviado el formulario para actualizar un cliente existente
    if (isset($_POST["btnActualizar"])) {
        $No_id = $_POST["ID_cliente"];
        $Nombre = $_POST["nombre_cliente"];
        $Tel = $_POST["telefono_cliente"];

        $sql = "UPDATE clientes SET ";

        $updates = [];
        if (!empty($Nombre)) {
            $updates[] = "nombre_cliente = '$Nombre'";
        }
        if (!empty($Tel)) {
            $updates[] = "telefono_cliente = '$Tel'";
        }

        $sql .= implode(", ", $updates);
        $sql .= " WHERE ID_cliente = '$No_id'";

        if ($conn->query($sql)) {
            echo "Actualización exitosa";
        } else {
            echo "Error fatal: " . $conn->error;
        }
    }

    // Si se ha enviado el formulario para agregar un nuevo cliente
    if (isset($_POST["btnAgregar"])) {
        $No_id = $_POST["ID_cliente"];
        $Nombre = $_POST["nombre_cliente"];
        $Tel = $_POST["telefono_cliente"];

        // Realizar la inserción en la base de datos
        $sql = "INSERT INTO clientes (ID_cliente, nombre_cliente, telefono_cliente) VALUES ('$No_id', '$Nombre', '$Tel')";

        if ($conn->query($sql)) {
            echo "Cliente agregado exitosamente";
        } else {
            echo "Error fatal: " . $conn->error;
        }
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
        <button type="submit" class="inc"><a href="CRUD.php">usuarios</a></button><br>
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
            <th>ID cliente</th>
            <th>Nombre</th>
            <th>Teléfono</th>
        </tr>

        <?php
        $sql = "SELECT * FROM clientes";

        if ($rta = $conn->query($sql)) {
            while ($row = $rta->fetch_assoc()) {
                $No_id = $row["ID_cliente"];
                $Nombre = $row["nombre_cliente"];
                $Tel = $row["telefono_cliente"];

                echo "
                    <tr>
                        <td>$No_id</td>
                        <td>$Nombre</td>
                        <td>$Tel</td>
                    </tr>";
            }

            $rta->free();
        }
        ?>
    </table>

    <br>

    <!-- Formulario para actualizar o agregar un cliente -->
    <table class="Formulario">
        <form action="Clientes.php" method="post">
            <tr>
                <th>
                    <label for="Nombre">No_ID</label>
                    <input type="text" name="ID_cliente" id="ID_cliente">
                </th>
                <th>
                    <label for="Apellido">Nombre</label>
                    <input type="text" name="nombre_cliente" id="nombre_cliente">
                </th>
                <th>
                    <label for="ID">Tel:</label>
                    <input type="text" name="telefono_cliente" id="telefono_cliente">
                </th>
            </tr>
            <tr>
                <td colspan="4">
                    <button class="Sti" type="submit" name="btnActualizar">Actualizar</button>
                    <button class="Sti" type="submit" name="btnAgregar">Agregar cliente</button>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <button id="btnExportar" class="Sti">
                        <i class="fas fa-file-excel"></i> Generar Excel
                    </button>
                </td>
            </tr>
        </form>
    </table>
</main>

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
