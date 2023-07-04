<?php
include_once "htmlcon.php";

$message = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $No_id = $_POST["ID_producto"];
    $stock = $_POST["stock"];
    $ID_cliente = $_POST["ID_cliente"];

    $checkQuery = "SELECT * FROM producto WHERE ID_producto = '$No_id'";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        $row = $checkResult->fetch_assoc();
        $stockExistente = $row["stock"];
        $precioUnidad = $row["Precio"];

        if ($stockExistente >= $stock) {
            $newStock = $stockExistente - $stock;
            $valorCompra = $stock * $precioUnidad;

            $sql = "UPDATE producto SET stock = '$newStock' WHERE ID_producto = '$No_id'";

            if ($conn->query($sql)) {
                $getCodigoQuery = "SELECT MAX(codigo_compra) AS max_codigo FROM ventas";
                $codigoResult = $conn->query($getCodigoQuery);
                $row = $codigoResult->fetch_assoc();
                $codigoCompra = $row['max_codigo'] + 1;

                $insertQuery = "INSERT INTO ventas (ID_cliente, codigo_compra, valor_compra) VALUES ('$ID_cliente', '$codigoCompra', '$valorCompra')";

                if ($conn->query($insertQuery)) {
                    $message = "Venta registrada exitosamente.";
                } else {
                    $error = "Error al registrar la venta: " . $conn->error;
                }
            } else {
                $error = "Error al actualizar el stock: " . $conn->error;
            }
        } else {
            $error = "No hay suficiente stock disponible.";
        }
    } else {
        $error = "El producto con el ID ingresado no existe.";
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
                    <a href="ventas" class="Bt">ventas</a>
                    <a href="Inventario.php" class="Bt">inventario</a>
                    <a href="Clientes.php" class="Bt">Clientes</a>
                </nav>
            </th>
        </table>
    </header>

    <body>
        <header>
            <h1>Registrar una venta</h1>
        </header>

        <main>
            <?php if (!empty($message)) : ?>
                <div class="success"><?php echo $message; ?></div>
            <?php endif; ?>

            <?php if (!empty($error)) : ?>
                <div class="error"><?php echo $error; ?></div>
            <?php endif; ?>

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

                <table class="Formulario">
                    <tr>
                        <th>
                            <label for="ID_producto">ID del producto a seleccionar:</label>
                        </th>
                        <td>
                            <input type="number" name="ID_producto" id="ID_producto" required>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <label for="stock">Cantidad de Productos:</label>
                        </th>
                        <td>
                            <input type="number" name="stock" id="stock" required>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <label for="ID_cliente">ID del cliente:</label>
                        </th>
                        <td>
                            <input type="number" name="ID_cliente" id="ID_cliente" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button type="submit" class="Sti">registrar</button>
                            <div class="consulta-button">
        <a href="PAventa.php" class="Mi">Consultar ventas</a>
    </div>
                        </td>
                    </tr>
                    

                </table>

            </form>
           
        </main>
    </body>

</html>
