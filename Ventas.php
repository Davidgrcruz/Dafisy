<?php
include_once "htmlcon.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["registrar_venta"])) {
        // Obtener los datos del formulario
        $nombreCliente = $_POST["nombre_cliente"];
        $telefonoCliente = $_POST["telefono_cliente"];
        $fechaCompra = $_POST["fecha_compra"];
        $idProducto = $_POST["id_producto"];
        $cantidadProductos = $_POST["cantidad_productos"]; // Nuevo campo

        // Verificar si el producto existe en la base de datos
        $productoExistente = false;
        $stockSuficiente = false;

        $selectQuery = "SELECT * FROM producto WHERE ID_producto = '$idProducto'";
        $result = $conn->query($selectQuery);
        if ($result->num_rows > 0) {
            $productoExistente = true;
            $row = $result->fetch_assoc();
            $stockProducto = $row["stock"];

            // Verificar si hay suficiente stock del producto
            if ($stockProducto >= $cantidadProductos) { // Verificar si el stock es suficiente para la cantidad solicitada
                $stockSuficiente = true;

                // Actualizar el stock del producto
                $nuevoStock = $stockProducto - $cantidadProductos;
                $updateQuery = "UPDATE producto SET stock = $nuevoStock WHERE ID_producto = '$idProducto'";
                $conn->query($updateQuery);
            }
        }

        // Registrar la venta si el producto existe y hay suficiente stock
        if ($productoExistente && $stockSuficiente) {
            // Insertar los datos de la venta en la tabla ventas
            $insertQuery = "INSERT INTO clientes (nombre_cliente, telefono_cliente, fecha_compra, ID_producto, cantidad_productos) 
                            VALUES ('$nombreCliente', '$telefonoCliente', '$fechaCompra', '$idProducto', '$cantidadProductos')";
            if ($conn->query($insertQuery) === TRUE) {
                echo "Venta registrada correctamente";
            } else {
                echo "Error al registrar la venta: " . $conn->error;
            }
        } else {
            echo "No se pudo registrar la venta. Verifica que el producto exista y haya suficiente stock disponible.";
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
                    <a href="#" class="Bt">inventario</a>
                    <a href="#" class="Bt">Contactenos</a>
                </nav>
            </th>
        </table>

    </header>

    <main>
        <!-- Resto del código del contenido principal -->
        <table class="Formulario">
            <tr>
                <td colspan="4">
                    <form action="ventas.php" method="post">
                        <label for="nombre_cliente">Nombre del cliente:</label>
                        <input type="text" name="nombre_cliente" id="nombre_cliente" required><br>

                        <label for="telefono_cliente">Teléfono del cliente:</label>
                        <input type="text" name="telefono_cliente" id="telefono_cliente" required><br>

                        <label for="fecha_compra">Fecha de compra:</label>
                        <input type="date" name="fecha_compra" id="fecha_compra" required><br>

                        <label for="id_producto">ID del producto:</label>
                        <input type="text" name="id_producto" id="id_producto" required><br>

                        <label for="cantidad_productos">Cantidad de productos:</label>
                        <input type="number" name="cantidad_productos" id="cantidad_productos" min="1" required><br> <!-- Nuevo campo -->

                        <button class="Sti" type="submit" name="registrar_venta">Registrar Venta</button>
                    </form>
                </td>
            </tr>
        </table>
    </main>

    <footer>
        <!-- Resto del código del pie de página -->
    </footer>
</body>

</html>
