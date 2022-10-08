<?php

session_start();

$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'biblioteca_digital'
);

//Para comprobar conexion
/*if (isset($conn)){
    echo "Connecting to DB";
}*/

?>