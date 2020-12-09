
<?php
//codigoque actualiza el precio lo que hace es multiplicar las variables que estoy recuperando del metodo get y guardando
// en una variable total he imprimir para que cuando yo ingre masde 1producto me calcule el precio total 
include '../config/conexionDB.php';

if ($_GET != '') {
    $total=$_GET['cantidad']*$_GET['precio'];
    echo "$total";
    $conn->close();
} else {

}

?>