<?php
session_start();
include_once "htmlcon.php";

function redirigirUsuario($cargo, $estado) {
    if ($estado === "activo") {
        if ($cargo === "administrador") {
            header("Location: CRUD.php");
        } elseif ($cargo === "Empleado") {
            header("Location:Inventario.php");
        } else {
            header("Location: error 404.html");
        }
    } else {
        header("Location: error 500.html");
    }
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["Nombre"];
    $Pass = $_POST["Pass"];

    // Consulta SQL para verificar si el usuario y la contraseña existen en la base de datos
    $sql = "SELECT * FROM SH WHERE Nombre = '$user' AND Pass = '$Pass'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // El usuario y la contraseña son válidos, obtener el cargo y estado del usuario y redirigir
        $row = $result->fetch_assoc();
        $cargo = $row["rol"];
        $estado = $row["estado"];
        redirigirUsuario($cargo, $estado);
    } else {
        // El usuario y/o la contraseña no son válidos, mostrar mensaje de error
        $_SESSION["error_message"] = "Usuario y/o contraseña incorrectos";
    }
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SantiPr</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.lineicons.com/4.0/lineIcons.css">
    <link rel="stylesheet" href="css/master.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </head>
  <body>

    <div class="login-box">
      <img src="img/Santi2.jpeg" class="avatar" alt="Avatar Image">
      <h1>Bienvenido</h1>

      <?php if(isset($_SESSION["error_message"])): ?>
      <div class="alert alert-danger" role="alert">
        <?php echo $_SESSION["error_message"]; ?>
      </div>
      <?php unset($_SESSION["error_message"]); ?>
      <?php endif; ?>

      <form action="" style="width:80%; margin-left: 10%;" class="finicio row g-1 needs-validation" method="POST" novalidate >

        <!-- USERNAME INPUT -->

        <label for="username" class="poh">Ingrese usuario</label>
        <input type="text" class="form-control" id="validationCustom01" placeholder="ingrese nombre" value="" required name="Nombre">

        <div class="valid-feedback">
          Nombre digitado correctamente...!
        </div>
        <div class="invalid-feedback">
            POR FAVOR DIGITE UN DATO VALIDO :(
        </div>

        <!-- PASSWORD INPUT -->
        <label for="password">Contraseña</label>
        <input type="password" class="form-control" id="validationCustom01" placeholder="ingrese contraseña" value="" required name="Pass">
        
        <div class="valid-feedback">
          Nombre digitado correctamente...!
        </div>
        <div class="invalid-feedback">
            POR FAVOR DIGITE UN DATO VALIDO :(
        </div>

        <div class="col-12">
          <button class="btn btn-primary" type="submit">Entrar</button>
        </div>
        <div class="prey">
        <a href="olvido-contraseña.html">Olvide mi contraseña?</a><br>
        <a href="crearUss.html">crear una cuenta</a>

        <div class="social-container">
          <a href="#" class="social"><i class="lni lni-facebook-fill"></i></a>
          <a href="#" class="social"><i class="lni lni-google"></i></a>
          <a href="#" class="social"><i class="lni lni-linkedin-original"></i></a>
      </div>
      
      </div>
      </form>

      <script type="text/javascript">
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
          'use strict';

          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          const forms = document.querySelectorAll('.needs-validation');

          // Loop over them and prevent submission
          Array.from(forms).forEach((form) => {
            form.addEventListener('submit', (event) => {
              if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        })();
      </script>
    </div>
  </body>
</html>