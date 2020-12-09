<?php
include '../config/conexionDB.php';

if ($_GET != '') {
    $sql = "SELECT * FROM comida WHERE nombre = '" . $_GET['key']  . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<td colspan="2"><input type="text" name="txt_producto" id="txt_producto" onkeypress="javascript:buscar_onkeypress(event,this);" value='. $row["nombre"] .'> </td>';
            echo '<td id="txt_precio" class ="textright">$ '. $row["precio"] .'</td>';
            echo '<td id="txt_precio_total" class ="textright">$ '. $row["precio"] .'</td>';
            echo "<td>";
            echo "<form action='../controladores/agregar.php' method='post'>";
                echo "<input type='hidden' name='txtId' value=". $row["id"] .">";
                echo "<input type='hidden' name='txtNombre' value='".$row["nombre"] ."'>";
                echo "<input type='hidden' name='txtPrecio' value='".$row["precio"]."'>";
                echo '<input type="text" name="txt_cant_producto" id="txt_cant_producto" value="1" min="1" disables onkeyup=calcularSubtotal(this,'. $row["precio"] .');>';
                echo "<button  type='submit' name='btnAnadir' value='Añadir'> Agregar Pedido";
            echo "</form>";
            echo "</td>";
        }
    } else {
        echo '<td colspan="2"><input type="text" name="txt_producto" id="txtproducto" onkeypress="javascript:buscar_onkeypress(event,this);"  > </td>
        <td><input type="text" name="txt_cant_producto" id="txt_cant_producto" value="0" min="1" disables></td>
        <td id="txt_precio" class ="textright">0.00</td>
        <td id="txt_precio_total" class ="textright">0.00</td>
        <td colspan="2"><a href ="#" id="add_product_venta" class="link_add"><i class ="fas fa-plus"></i></a>Agregar</td>';

    }
    $conn->close();
} else {

}

?>