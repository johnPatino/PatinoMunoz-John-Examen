
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <?php include "../controladores/scripts.php"; ?>
    <title>Lista de Comidas</title>
</head>

<body>
    <?php include "../controladores/header.php"; ?>
    <section id="container">
        <h1><i class="fas fa-list-alt"></i></i> Lista de Comidas</h1>

        <table>
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Precio Unitario</th>
                    
                </tr>
            </thead>
            <tbody id="data">
                <?php
                include '../config/conexionDB.php';
                $sql = "SELECT * FROM comida";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["nombre"] . "</td>";
                        echo "<td> $ " . $row["precio"] . "</td>";
                        echo "</tr>";
                    }
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </section>

</body>

</html>