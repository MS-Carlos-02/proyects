<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP CRUD</title>

        <!-- BOOTSTRAP 5.2-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/f6442d1870.js" crossorigin="anonymous"></script>

</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5"
    style="background-color: #A0CBEC;">
        <h1>Aplicación Crud en PHP</h1> 
    </nav>
    <div class="container">

        <?php
            if (isset($_GET['msg'])) {
                $msg = $_GET['msg'];
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
               '.$msg.'
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
            }
        ?>

        <a href="agregar.php" class="btn btn-primary mb-4">Agregar</a>

        <table class="table table-hover text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Email</th>
                    <th scope="col">Acciones</th> 
                </tr>
            </thead>
            <tbody> 
                <?php
                    include "conexion.php";
                    $sql = "SELECT * FROM `productos`";
                    $resultado = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($resultado)){
                        ?>
                        <tr>
                            <td scope="row"><?php echo $row['id'] ?></td>
                            <td><?php echo $row['nombre'] ?></td>
                            <td><?php echo $row['apellido'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td class="">
                                <a href="editar.php?id=<?php echo $row['id'] ?>" class="link-dark"><i class="fa fa-marker btn btn-secondary"></i></a>
                                <a href="eliminar.php?id=<?php echo $row['id'] ?>" class="link-dark"><i class="fa fa-trash-alt btn btn-danger"></i></a>
                            </td>
                        </tr>
                        <?php
                    }
                ?>

                
            </tbody>
        </table>


    </div>
   
     <!-- script --> 
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>
</html>