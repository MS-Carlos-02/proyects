<?php
    include "db.php";
    $id = $_GET['id'];
    $sql = "DELETE FROM `producto` WHERE id = $id";
    $resultado = mysqli_query($conn,$sql);

    if ($resultado) {
        header("Location: index.php?msg=Producto eliminado...!");
        unlink("../tienda/productos/".$imagen);
    
    }else{
        echo "Error: " . mysqli_error($conn);
    }

?>
























