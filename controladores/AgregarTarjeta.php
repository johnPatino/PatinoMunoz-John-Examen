<?php
if (!empty($_POST)) {
    $alert = '';
    include '../config/conexionDB.php';
    $numero_tarjeta = $_POST['numero'];
    $nombre_tarjeta = mb_strtoupper($_POST["nombreTitutlar"]);
    $fecha_Vencimiento = $_POST["fecha"];
    $cvv = $_POST["cvv"];

    $sql = "INSERT INTO tarjeta VALUES ($numero_tarjeta,'$nombre_tarjeta','$fecha_Vencimiento ',$cvv)";
    if ($conn->query($sql) == true) {
        header("location: ../vista/agregar_tarjeta.php");
    }
    
}
