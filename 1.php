
<?php

include_once "htmlcon.php";

$sql = "SELECT * From SH ";
$Rta = $conn->query($sql);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registrar</title>
    <link rel="stylesheet" href="css/Reg.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
</head>
<body>
        <div class="login-box">
          <img src="img/Santi2.jpeg" class="avatar" alt="Avatar Image">
          <br>
          <h1>Registrarse</h1>

          <form  action="actualizar.php"  method="post" target=""  style="width:80%; margin-left: 10%;" class="finicio row g-1 needs-validation" novalidate >

<table>

  <th>
            <!-- USERNAME INPUT -->
            <label for="username">nombres</label>
            <input type="text" placeholder="Ingrese Nombres" class="form-control" id="validationCustom01" name="Nombre">
            
            <!-- PASSWORD INPUT -->
            <label for="text">Apellidos</label>
            <input type="text" placeholder="Ingrese Apellidos" class="form-control" id="validationCustom01" name="Apellido">

  
             <!-- PASSWORD INPUT -->
            <label for="text">Numero Documento</label>
            <input type="number" placeholder="CC" class="form-control" id="validationCustom01" name="ID">

        
            <!-- USERNAME INPUT -->
            <label for="text">Email</label>
            <input type="text" placeholder="Email" class="form-control" id="validationCustom01" name="Email">


          </th>
          <th>
            <!-- Dir INPUT -->
            <label for="text">Ingrese Direccion</label>
            <input type="text" placeholder="Ej:Carrera 1#1-1" class="form-control" id="validationCustom01" name="Dir">

           
    
             <!-- PASSWORD INPUT -->
            <label for="PASSWORD">Contraseña</label>
            <input type="password" placeholder="Ingrese Contraseña" class="form-control" id="validationCustom01" name="Pass">

           
            <!-- cel INPUT -->
            <label for="text">Telefono</label>
            <input type="number" placeholder="Ingrese numero de telefono" class="form-control" id="validationCustom01" name="Tel">

            
            <!-- Date INPUT -->
            <label for="text">Fecha nacimiento</label>
            <input type="Date" name="Fec" class="form-control" id="validationCustom01">

           
          </th>
          </table>

            <div class="col-12">
              <button class="btn btn-primary" type="submit">crear usuario</button>
            </div>
    
            <!-- Ingresar con una cuenta -->
            <a href="SantiGr.html">tengo una cuenta</a><br>


            <script type="text/javascript">

              // Example starter JavaScript for disabling form submissions if there are invalid fields
            (() => {
              'use strict'
            
              // Fetch all the forms we want to apply custom Bootstrap validation styles to
              const forms = document.querySelectorAll('.needs-validation')
            
              // Loop over them and prevent submission
              Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                  if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                  }
                  form.classList.add('was-validated')
                }, false)
              })
            })()

            </script>

          </form>
        </div>
      </body>
    </html>