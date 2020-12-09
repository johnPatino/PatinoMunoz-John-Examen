<?php
$cantidad = $_POST["txt_cant_producto"];
$nombre = $_POST["txtNombre"];
$precio = $_POST["txtPrecio"];
$id = $_POST["txtId"];

session_start();
if(isset($_SESSION["carrito"])){
    $carrito = $_SESSION["carrito"];
}else{
    $carrito = array();
}
$comida=array("id"=> $id,"nombre" => $nombre,"precio" => $precio, "cantidad"=>$cantidad);
array_push($carrito, $comida);
$_SESSION["carrito"] = $carrito;
header("location: ../vista/generar_pedido.php");
?>