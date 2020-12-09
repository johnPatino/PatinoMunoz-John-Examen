<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <?php include "../controladores/scripts.php"; ?>
    <title>Lista Detalle</title>
</head>

<body>
    <?php include "../controladores/header.php"; ?>
    <section id="container">
        <h1><i class="fas fa-clipboard-list"> </i>Detalles del pedido # <?php echo $_GET['key']  ?> </h1>
       
        <table>
            <thead>
                <tr>
                    <th># pedido</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>SubTotal</th>
                </tr>
            </thead>
            <tbody id="listaDetalles">
                <?php
                    include '../config/conexionDB.php';
                    $sql = "SELECT * FROM detalle d INNER JOIN comida c ON d.producto = c.id WHERE d.venta =".$_GET['key']."";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {

                            echo "<tr>";
                            echo "<td>" . $row["venta"] . "</td>";
                            echo "<td>" . $row["nombre"] . "</td>";
                            echo "<td>" . $row["cantidad"] . "</td>";
                            echo "<td> $ " . $row["subTotal"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr>";
                        echo '<td colspan="4" class="db_null"><p>No Ventas</p><i class="fas fa-exclamation-circle"></i></td>';
                        echo "</tr>";
                    }
                    $conn->close();
                ?>

            </tbody>
        </table>
    </section>

</body>

</html>