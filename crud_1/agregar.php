<?php
include "conexion.php";

if (isset($_POST['submit'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];

    $sql = "INSERT INTO `productos`(`id`, `nombre`, `apellido`, `email`) VALUES (NULL,'$nombre','$apellido','$email')";

    $resultado = mysqli_query($conn,$sql);

    if ($resultado) {
        header("Location: index.php?msg=Registro satisfactorio");
    }else{
        echo "Error: " . mysqli_error($conn);
    }

}

?>






<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP CRUD</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5"
    style="background-color: #A0CBEC;">
        <h1>Aplicación Crud en PHP</h1> 
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h2>Agregar Persona</h2>
            <p class="text-muted">Complete los campos requeridos para agregar una persona.</p>
        </div>
        <div class="container d-flex justify-content-center">
            <form action="" method="POST" style="width:50vw; min-width:300px;">
                
                <div class="row">
                    <div class="col">
                        <label for="">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Ingrese nombre">
                    </div>
                    <div class="col">
                        <label for="">Apellido:</label>
                        <input type="text" class="form-control"  name="apellido" placeholder="Ingrese apellido">
                    </div>
                </div>
                <div class="mt-3">
                    <label for="">Email:</label>
                    <input type="email" class="form-control"  name="email" placeholder="Ingrese correo"                            >
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-success" name="submit">Agregar</button>
                    <a href="index.php" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </div>




</body>
</html>