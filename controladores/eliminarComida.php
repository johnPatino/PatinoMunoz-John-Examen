<?php
$index = $_GET["in"];
session_start();

if(isset($_SESSION["carrito"])){
    $carrito = $_SESSION["carrito"];
    unset($carrito[$index]);
    $carrito = array_values($carrito);

    $_SESSION["carrito"] = $carrito;

header("location: ../vista/generar_pedido.php");
}
?>

