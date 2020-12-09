<?php
if (!empty($_POST)) {
    $nombre = mb_strtoupper($_POST['nombreP']);
    $precio_unitario = $_POST['Precio'];

    include '../config/conexionDB.php';

    $sql = "INSERT INTO comida VALUES (0,'$nombre',$precio_unitario)";
    if ($conn->query($sql) == true) {
        header("location: ../vista/agregar_comida.php");
    }
}

?>


