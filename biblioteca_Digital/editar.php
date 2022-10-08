<?php

error_reporting(1);

include "db.php";
$id = $_GET['id'];

if (isset($_POST['submit'])) {
    
    $anio = $_POST['anio'];
    $autor = $_POST['autor'];
    $titulo = $_POST['titulo'];
    #foto del libro
    $file = $_FILES['imagen'];
    $nombre = $file['name'];
    $tipo = $file['type'];
    $ruta_provisional = $file['tmp_name'];
    $size = $file['size'];
    $dimensiones = getimagesize($ruta_provisional);
    $width = $dimensiones[0];
    $height = $dimensiones[1];
    $carpeta = "libros/";

    $url = $_POST['url'];
    $especialidad = $_POST['especialidad'];
    $editorial = $_POST['editorial'];

    if($size > 2*1024*1024){
        echo "Error el tamaño máximo permitido es un 2MB";
    }else{
        $src = $carpeta.$nombre;
        move_uploaded_file($ruta_provisional, $src);
        $imagen="libros/".$nombre;
    }


    $sql = "UPDATE `libro` SET `anio`='$anio',`autor`='$autor',`titulo`='$titulo', `imagen` = '$imagen', `url`='$url',`especialidad`='$especialidad',`editorial`='$editorial' WHERE id = $id LIMIT 1";

    $resultado = mysqli_query($conn,$sql);

    if ($resultado) {
        header("Location: editar.php?msg=Libro Actualizado");
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
            <h2>Actualizar libro</h2>
            <p class="text-muted">Actualizar los datos necesarios.</p>
        </div>

        <?php
            $sql = "SELECT * FROM `libro` WHERE id = $id LIMIT 1";
            $resultado = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($resultado);
        ?>



        <div class="container d-flex justify-content-center">
            <form action="" method="POST" enctype="multipart/form-data" style="width:50vw; min-width:300px;">
                
                <div class="row">
                    <div class="col">
                        <label for="">Año:</label>
                        <input type="text" class="form-control" name="anio" placeholder="Ingrese el año" autofocus value="<?php echo $row['anio'] ?>" >
                    </div>
                    <div class="col">
                        <label for="">Autor:</label>
                        <input type="text" class="form-control"  name="autor" placeholder="Nombre del autor" value="<?php echo $row['autor'] ?>">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label for="">Título:</label>
                        <input type="text" class="form-control"  name="titulo" placeholder="Ingrese el título" value="<?php echo $row['titulo'] ?>" >
                    </div>
                    <div class="col">
                        <label for="">Imagen:</label>
                        <div class="d-flex">
                            <input type="file" class="form-control"  name="imagen" accept="image/png, .jpeg, .jpg" value="<?php echo $row['imagen'] ?>"> 
                            <img class="ml-2" src="<?php echo $row['imagen'] ?>" alt="" width=100px height=60px style="background-size: cover; background-position: center;">  
                        </div>
                        
                    </div>
                </div>
                <div class="mt-3">
                    <label for="">URL:</label>
                    <input type="text" class="form-control"  name="url" placeholder="Ingrese URL"  value="<?php echo $row['url'] ?>" >
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label for="">Especialidad:</label>
                        <input type="text" class="form-control"  name="especialidad" placeholder="Ingrese la especialidad" value="<?php echo $row['especialidad'] ?>" >
                    </div>
                    <div class="col">
                        <label for="">Editorial:</label>
                        <input type="text" class="form-control"  name="editorial" placeholder="Ingrese la editorial" value="<?php echo $row['editorial'] ?>" >
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-success" name="submit">Actualizar</button>
                    <a href="editar.php" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
    <?php include "incluides/footer.php"; ?>
</body>
</html>
























