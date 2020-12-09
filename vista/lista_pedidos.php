<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <?php include "../controladores/scripts.php"; ?>
    <title>Lista Pedidos</title>
</head>

<body>
    <?php include "../controladores/header.php"; ?>
    <section id="container">
        <h1><i class="fas fa-pallet"></i> Lista Pedidos</h1>
        <div class="form_search">
        <input type="search" id="busqueda" placeholder="Buscar Tarjeta" onkeypress="javascript:buscarPorTarjeta(event,this);">
        <input type="button" value="Buscar" class="btn_search" onkeypress="javascript:buscarPorTarjeta(event,this);">
        </div>
        <table>
            <thead>
                <tr>
                    <th>Numero</th>
                    <th>Cliente</th>
                    <th>Fecha</th>
                    <th>Observaciones</th>
                    <th>Total</th>
                    <th>Tarjeta</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody id="listaPedidos">
                <?php
                    include '../config/conexionDB.php';
                    $sql = "SELECT * FROM venta";
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
                        echo '<td colspan="7" class="db_null"><p>No Ventas</p><i class="fas fa-exclamation-circle"></i></td>';
                        echo "</tr>";
                    }
                    $conn->close();
                    ?>

            </tbody>
        </table>
    </section>

</body>

</html>