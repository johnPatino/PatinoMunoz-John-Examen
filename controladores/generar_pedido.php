<?php
session_start();
if (!empty($_POST)) {
include '../config/conexionDB.php';
$cliente = $_POST["nombreCliente"];
$observaciones = $_POST["observaciones"];
$total = $_POST["totalPedido"];

$carrito = $_SESSION["carrito"];
$tarjeta = $_SESSION["tarjeta"];

$sql = "INSERT INTO venta VALUES (0,'$cliente',NOW(),$total,'$observaciones','$tarjeta')";
if ($conn->query($sql) == true) {
    $sqlVenta = "SELECT MAX(id) AS id  FROM venta;";
    $result = $conn->query($sqlVenta);
    $row = $result->fetch_assoc();
    $id = ($row['id']);
   
    foreach($carrito as $valor) {
        $total=$valor['precio'] * $valor['cantidad'];
        $sqlDetalle = 'INSERT INTO detalle VALUES (0,' . $id . ',' .  $valor['id'] . ',' .  $valor['cantidad'] . ',' .  $total . ')';
        echo $sqlDetalle;
        $conn->query($sqlDetalle);
    }
    unset($_SESSION["carrito"]);
    header("location: ../vista/lista_pedidos.php");
}     

}

?>