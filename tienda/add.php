<?php
include "db.php";
$foto = '';


if (isset($_POST['submiT'])){
    $id = $_POST['id'];
    $nombr = $_POST['nombre'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    #foto del producto
    $file = $_FILES['imagen'];
    $nombre = $file['name'];
    $tipo = $file['type'];
    $ruta_provisional = $file['tmp_name'];
    $size = $file['size'];
    $dimensiones = getimagesize($ruta_provisional);
    $width = $dimensiones[0];
    $height = $dimensiones[1];
    $carpeta = "productos/";

    if($size > 2*1024*1024){
        echo "Error el tamaño máximo permitido es un 2MB";
    }else{
        $src = $carpeta.$nombre;
        move_uploaded_file($ruta_provisional, $src);
        $imagen="productos/".$nombre;
    }

    $sql = "INSERT INTO `producto`(`id`, `nombre`, `precio`, `descripcion`, `imagen`) VALUES (NULL,'$nombr','$precio','$descripcion', '$imagen')";

    $resultado = mysqli_query($conn,$sql);

    if ($resultado) {
        header("Location: index.php?msg=El producto .$nombr. se registro exitosamente");
    }else{
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<?php include "incluides/header.php"; ?>

<body>

    <section style="border-bottom: grey"; >
        
    </section>

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

    <div class="container  mt-5 shadow">
        <div class="text-center">
            <h2 class="text-center mb-4 font-weight-bold text-primary">Registrar Producto</h2>
            <p class="text-muted">Rellenar todos los campos.</p>
        </div>
        <div class="container d-flex justify-content-center mt-4">
            <form action="add.php" method="POST" enctype="multipart/form-data" style="width:50vw; min-width:300px;">
                
                <div class="row">
                    <div class="col">
                        <label for="">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" placeholder="" autofocus>
                    </div>
                    <div class="col">
                        <label for="">Precio:</label>
                        <input type="text" class="form-control"  name="precio" placeholder="">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label for="">Descripción:</label>
                        <input type="text" class="form-control"  name="descripcion" placeholder="">
                    </div>
                    <div class="col">
                        <label for="">Imagen:</label>
                        <input type="file" class="form-control"  name="imagen" accept="image/png, .jpeg, .jpg, .jfif">
                    </div>
                </div>
                </div>
                <div class="d-flex mt-3 justify-content-center">
                    <button type="submit" class="btn btn-success mt-2 mb-4 mr-3" name="submiT">Agregar</button>
                    <a href="add.php" class="btn btn-danger mt-2 mb-4">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
    <?php include "incluides/footer.php"; ?>
</body>
</html>































