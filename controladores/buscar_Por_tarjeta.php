<?php
session_start();
include '../config/conexionDB.php';

if ($_GET != '') {
    $sql = "SELECT * FROM venta WHERE tarjeta = '" . $_GET['key']  . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["cliente"] . "</td>";
            echo "<td>" . $row["fecha"] . "</td>";
            echo "<td>" . $row["observaciones"] . "</td>";
            echo "<td>" . $row["total"] . "</td>";
            echo "<td>" . $row["tarjeta"] . "</td>";
            echo '<td>  <a class="link_add" href="detalle.php?key='.$row["id"]. '"><i class="fas fa-search-plus"></i> Ver detalles </a> </td>';
            echo "</tr>";
        }
        
    } else {
        echo "<tr>";
        echo '<td colspan="7" class="db_null"><p>No existen ventas que coincidad con la busqueda</p><i class="fas fa-exclamation-circle"></i></td>';
        echo "</tr>";

    }
    $conn->close();
} else {

}

?>