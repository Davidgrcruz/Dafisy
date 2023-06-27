<?php
include_once "htmlcon.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["agregar"])) {
        $Nombre = $_POST["Nombre_producto"];
        $Ctec = $_POST["C_tecnicas"];
        $No_id = $_POST["ID_producto"];
        $marca = $_POST["marca"];
        $Cat = $_POST["categoria"];
        $Precio = $_POST["Precio"];
        $estado = $_POST["estado_P"];
        $stock = $_POST["stock"];

        $sql = "INSERT INTO producto (Nombre_producto, C_tecnicas, ID_producto, marca, categoria, Precio, estado_P, stock)
                VALUES ('$Nombre', '$Ctec', '$No_id', '$marca', '$Cat', '$Precio', '$estado', '$stock')";

        if ($conn->query($sql)) {
            echo "Producto agregado exitosamente";
        } else {
            echo "Error al agregar el producto: " . $conn->error;
        }
    } else {
        $Nombre = $_POST["Nombre_producto"];
        $Ctec = $_POST["C_tecnicas"];
        $No_id = $_POST["ID_producto"];
        $marca = $_POST["marca"];
        $Cat = $_POST["categoria"];
        $Precio = $_POST["Precio"];
        $estado = $_POST["estado_P"];
        $stock = $_POST["stock"];

        $sql = "UPDATE producto SET ";

        $updates = [];
        if (!empty($Nombre)) {
            $updates[] = "Nombre_producto = '$Nombre'";
        }

        if (!empty($Ctec)) {
            $updates[] = "C_tecnicas = '$Ctec'";
        }

        if (!empty($No_id)) {
            $updates[] = "ID_producto = '$No_id'";
        }

        if (!empty($marca)) {
            $updates[] = "marca = '$marca'";
        }
        if (!empty($Cat)) {
            $updates[] = "categoria = '$Cat'";
        }
        if (!empty($Precio)) {
            $updates[] = "Precio = '$Precio'";
        }
        if (!empty($estado)) {
            $updates[] = "estado_P = '$estado'";
        }
        if (!empty($stock)) {
            $updates[] = "stock = '$stock'";
        }

        $sql .= implode(", ", $updates);
        $sql .= " WHERE ID_producto = '$No_id'";

        if ($conn->query($sql)) {
            echo "Actualización exitosa";
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
        <table class="Ti">
            <tr>
                <th>Nombre</th>
                <th>Caracteristicas</th>
                <th>ID producto</th>
                <th>marca</th>
                <th>categoria</th>
                <th>Precio de unidad</th>
                <th>estado</th>
                <th>Stock</th>
            </tr>

            <?php
            $sql = "SELECT * FROM producto";

            if ($rta = $conn->query($sql)) {
                while ($row = $rta->fetch_assoc()) {
                    $Nombre = $row["Nombre_producto"];
                    $Ctec = $row["C_tecnicas"];
                    $No_id = $row["ID_producto"];
                    $marca = $row["marca"];
                    $Cat = $row["categoria"];
                    $Precio = $row["Precio"];
                    $estado = $row["estado_P"];
                    $stock = $row["stock"];


                    echo "
                    <tr>
                        <td>$Nombre</td>
                        <td>$Ctec</td>
                        <td>$No_id</td>
                        <td>$marca</td>
                        <td>$Cat</td>
                        <td>$Precio</td>
                        <td>$estado</td>
                        <td>$stock</td>
                    </tr>";
                }

                $rta->free();
            }
            ?>
        </table>

        <br>
        <!-- Formulario para actualizar los datos del producto -->
        <table class="Formulario">
            <tr>
                <td colspan="4">
                    <form action="Inventario.php" method="post">
                        <label for="Nombre_P">Nombre producto:</label>
                        <input type="text" name="Nombre_producto" id="Nombre_Producto">
                        <br>
                        <label for="C_tec">Caracteristicas:</label>
                        <input type="text" name="C_tecnicas" id="C_tecnicas">
                        <br>
                        <label for="ID_P">ID producto:</label>
                        <input type="number" name="ID_producto" id="ID_producto">
                        <br>
                        <label for="marca">Marca:</label>
                        <input type="text" name="marca" id="marca">
                        <br>
                        <label for="Cat">Categoria:</label>
                        <input type="text" name="categoria" id="categoria">
                        <br>
                        <label for="Precio">Precio unidad:</label>
                        <input type="number" name="Precio" id="Precio">
                        <br>
                        <label for="estado">Estado:</label> <br>
                        <select name="estado_P" id="estado_P">
                            <option value="Existente">Existente</option>
                            <option value="Agotado">Agotado</option>
                        </select>
                        <br>
                        <label for="stock">Stock:</label>
                        <input type="number" name="stock" id="stock">
                        <br>
                        <button class="Sti" type="submit">Actualizar</button>
                        <button class="Sti" type="submit" name="agregar">Agregar</button>
                    </form>
                </td>
            </tr>
        </table>
    </main>

    <footer>
        <!-- ... Resto del código ... -->
    </footer>
</body>

</html>
