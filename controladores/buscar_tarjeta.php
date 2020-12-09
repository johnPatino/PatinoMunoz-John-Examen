<?php

session_start();
include '../config/conexionDB.php';

if ($_GET != '') {
    $sql = "SELECT * FROM tarjeta WHERE numero = '" . $_GET['key']  . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<td colspan="2"><input type="text" name="numeroTarjeta" id="numeroTarjeta" value='. $row["numero"] .' onkeypress="javascript:buscarTarjeta(event,this);"  > </td> <td colspan="2" id="propietario" class ="textright">'. $row["propietario"] .'</td><td id="fechaCaducidad" class ="textright">'. $row["fechaCaducidad"] .'</td>';
            $_SESSION["tarjeta"] = $row["numero"];
        }
        
    } else {
        echo '<td colspan="2"><input type="text" name="numeroTarjeta" id="numeroTarjeta" onkeypress="javascript:buscarTarjeta(event,this);"  > </td>
        <td colspan="2" id="propietario" class ="textright"></td>
        <td id="fechaCaducidad" class ="textright"></td>';
    }
    $conn->close();
} else {

}

?>