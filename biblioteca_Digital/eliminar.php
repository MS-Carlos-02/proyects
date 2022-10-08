<?php
    include "db.php";
    $id = $_GET['id'];
    $sql = "DELETE FROM `libro` WHERE id = $id";
    $resultado = mysqli_query($conn,$sql);

    if ($resultado) {
        header("Location: historial.php?msg=Libro eliminado...!");
    }else{
        echo "Error: " . mysqli_error($conn);
    }

?>