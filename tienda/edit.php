<?php

error_reporting(1);

include "db.php";
$id = $_GET['id'];

if (isset($_POST['submit'])) {;
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


    $sql = "UPDATE `producto` SET `nombre`='$nombr',`precio`='$precio',`descripcion`='$descripcion', `imagen` = '$imagen' WHERE id = $id LIMIT 1";

    $resultado = mysqli_query($conn,$sql);

    if ($resultado) {
        header("Location: edit.php?msg=Producto actualizado");
    }else{
        echo "Error: " . mysqli_error($conn);
    }
}
?>


<?php include "incluides/header.php"; ?>

<body>
    <section style="border-bottom: grey"; >
        
    </section>

    <div class="container  mt-5">
        <div class="text-center">
            <h2 class="text-center mb-4 font-weight-bold text-primary">Actualizar producto</h2>
            <p class="text-muted">Actualizar los datos necesarios.</p>
        </div>

        <?php
            $sql = "SELECT * FROM `producto` WHERE id = $id LIMIT 1";
            $resultado = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($resultado);
        ?>

        <div class="container d-flex justify-content-center">
            <form action="" method="POST" enctype="multipart/form-data" style="width:50vw; min-width:300px;">
                
                <div class="row">
                    <div class="col">
                        <label for="">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" placeholder="" autofocus value="<?php echo $row['nombre'] ?>" >
                    </div>
                    <div class="col">
                        <label for="">Precio:</label>
                        <input type="text" class="form-control"  name="precio" placeholder="" value="<?php echo 's/.'.$row['precio'] ?>">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label for="">Descripción:</label>
                        <input type="text" class="form-control"  name="descripcion" placeholder="" value="<?php echo $row['descripcion'] ?>" >
                    </div>
                    <div class="col">
                        <label for="">Imagen:</label>
                        <div class="d-flex">
                            <input type="file" class="form-control"  name="imagen" accept="image/png, .jpeg, .jpg" value="<?php echo $row['imagen'] ?>"> 
                            <img class="ml-2" src="<?php echo $row['imagen'] ?>" alt="" width=40px height=60px style="background-size: cover; background-position: center;">  
                        </div>
                        
                    </div>
                </div>
                
                <div class="mt-3">
                    <button type="submit" class="btn btn-success mr-2" name="submit">Actualizar</button>
                    <a href="edit.php" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
    <?php include "incluides/footer.php"; ?>
</body>
</html>
























