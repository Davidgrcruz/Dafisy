
<?php
include_once "htmlcon.php";

$codigoCompra = isset($_GET['codigo_compra']) ? $_GET['codigo_compra'] : '';

if (!empty($codigoCompra)) {
    $sql = "CALL FiltrarVentas(?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $codigoCompra);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $sql = "SELECT ventas.codigo_compra, ventas.valor_compra, ventas.fecha_compra, clientes.*
            FROM ventas
            INNER JOIN clientes ON ventas.ID_cliente = clientes.ID_cliente";
    $result = $conn->query($sql);
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
                   <a href="#" class="Bt">inventario</a>
                   <a href="Clientes.php" class="Bt">Clientes</a>
               </nav>
           </th>
       </table>

   </header>

    <main>
        <h2>Verfifique sus ventas</h2>

        
        <form method="GET" action="">
            <label for="codigo_compra">Digite el codigo de la compra:</label> <br>
            <br>
            <input  type="text" name="codigo_compra" id="codigo_compra" value="<?php echo $codigoCompra; ?>">
            <input type="submit" value="Filtrar">
        </form>
     
        

        <table class="Ti" id="tabla">
            <tr>
                <th><label for="Cod">Codigo de compra</label></th>
                <th><label for="Com">Valor de compra</label></th>
                <th><label for="Fcom">Fecha de compra</label></th>
                <th><label for="ID_Cli">ID del cliente</label></th>
                <th><label for="Nomb">Nombre del cliente</label></th>
                <th><label for="Tel">Telefono del cliente</label></th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['codigo_compra'] . "</td>";
                    echo "<td>" . $row['valor_compra'] . "</td>";
                    echo "<td>" . $row['fecha_compra'] . "</td>";
                    echo "<td>" . $row['ID_cliente'] . "</td>";
                    echo "<td>" . $row['nombre_cliente'] . "</td>";
                    echo "<td>" . $row['telefono_cliente'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No se encontraron resultados.</td></tr> ";
            }
            ?>
            
             <td colspan="3">
    <button id="btnExportar" class="Sti">
                <i class="fas fa-file-excel"></i> Generar Excel
            </button></td>
        </table>

        <?php
        if (!empty($codigoCompra)) {
            $stmt->close();
        }
        $conn->close();
        ?>
    </main>

    <footer>
    
            <script>
    const $btnExportar = document.querySelector("#btnExportar"),
        $tabla = document.querySelector("#tabla");

    $btnExportar.addEventListener("click", function() {
        let tableExport = new TableExport($tabla, {
            exportButtons: false, // No queremos botones
            filename: "Reporte", //Nombre del archivo de Excel
            sheetname: "Ventas", //Título de la hoja
        });
        let datos = tableExport.getExportData();
        let preferenciasDocumento = datos.tabla.xlsx;
        tableExport.export2file(preferenciasDocumento.data, preferenciasDocumento.mimeType, preferenciasDocumento.filename, preferenciasDocumento.fileExtension, preferenciasDocumento.merges, preferenciasDocumento.RTL, preferenciasDocumento.sheetname);
    });
</script>

    </footer>
</body>

</html>
