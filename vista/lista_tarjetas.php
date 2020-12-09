<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <?php include "../controladores/scripts.php"; ?>
    <title> Lista de Tarejtas</title>
</head>

<body>
    <?php include "../controladores/header.php"; ?>
    <section id="container">
        <h1><i class="fas fa-list-alt"></i></i> Lista de Tarjetas</h1>
        </form>

        <table>
            <thead>
                <tr>
                    <th>Numero</th>
                    <th>Nombre</th>
                    <th>Fecha Caducidad</th>
                </tr>
            </thead>
            <tbody id="data">
                <?php
                    include '../config/conexionDB.php';
                    $sql = "SELECT * FROM tarjeta";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["numero"] . "</td>";
                    echo "<td>" . $row["propietario"] . "</td>";
                    echo "<td>" . $row["fechaCaducidad"] . "</td>";
                    echo "</tr>";}
                    }
                    $conn->close();
                ?>

            </tbody>
        </table>
    </section>

</html>