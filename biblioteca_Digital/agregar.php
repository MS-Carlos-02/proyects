<?php
include "db.php";
$foto = '';

if (isset($_POST['submiT'])){
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

    $sql = "INSERT INTO `libro`(`id`, `anio`, `autor`, `titulo`, `imagen`, `url`, `especialidad`, `editorial`) VALUES (NULL,'$anio','$autor','$titulo', '$imagen', '$url', '$especialidad', '$editorial')";

    $resultado = mysqli_query($conn,$sql);

    if ($resultado) {
        header("Location: historial.php?msg=El libro .$titulo. se registro exitosamente");
    }else{
        echo "Error: " . mysqli_error($conn);
    }
}

?>



<?php include "incluides/header.php"; ?>

<body>

    <section style="border-bottom: grey"; >
        
    </section>

    <div class="container  mt-5 shadow">
        <div class="text-center">
            <h2>Añadir libro</h2>
            <p class="text-muted">Completar todos los campos respectivamente.</p>
        </div>
        <div class="container d-flex justify-content-center mt-4">
            <form action="agregar.php" method="POST" enctype="multipart/form-data" style="width:50vw; min-width:300px;">
                
                <div class="row">
                    <div class="col">
                        <label for="">Año:</label>
                        <input type="text" class="form-control" name="anio" placeholder="Ingrese el año" autofocus>
                    </div>
                    <div class="col">
                        <label for="">Autor:</label>
                        <input type="text" class="form-control"  name="autor" placeholder="Nombre del autor">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label for="">Título:</label>
                        <input type="text" class="form-control"  name="titulo" placeholder="Ingrese el título">
                    </div>
                    <div class="col">
                        <label for="">Imagen:</label>
                        <input type="file" class="form-control"  name="imagen" accept="image/png, .jpeg, .jpg">
                    </div>
                </div>
                <div class="mt-3">
                    <label for="">URL:</label>
                    <input type="text" class="form-control"  name="url" placeholder="Ingrese URL"                            >
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label for="">Especialidad:</label>
                        <input type="text" class="form-control"  name="especialidad" placeholder="Ingrese la especialidad"                            >
                    </div>
                    <div class="col">
                        <label for="">Editorial:</label>
                        <input type="text" class="form-control"  name="editorial" placeholder="Ingrese la editorial"                            >
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-success mt-2 mb-4" name="submiT">Agregar</button>
                    <a href="agregar.php" class="btn btn-danger mt-2 mb-4">Cancelar</a>
                    <a href="historial.php" type="submit" class="btn btn-primary mt-2 mb-4 " name="submit" style="float:right">Ver registros</a>
                </div>
            </form>
        </div>
    </div>
    <?php include "incluides/footer.php"; ?>
</body>
</html>































