<?php
    include "conexion.php";
    $id = $_GET['id'];
    $sql = "DELETE FROM `productos` WHERE id = $id";
    $resultado = mysqli_query($conn,$sql);

    if ($resultado) {
        header("Location: index.php?msg=Registro eliminado");
    }else{
        echo "Error: " . mysqli_error($conn);
    }

?>













