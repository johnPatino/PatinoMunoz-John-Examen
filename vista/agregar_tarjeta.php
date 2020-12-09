
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include "../controladores/scripts.php"; ?>
    <title>Agregar Tarjeta</title>
    </title>
</head>

<body>
    <?php include "../controladores/header.php"; ?>

    <section id="container">
        <div class="form_register">
            <h1 id="agT"><i class="fas fa-credit-card"></i> Agregar Tarjeta</h1>
            <hr>
            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
            <form action="../controladores/AgregarTarjeta.php" method="POST">
                <hr>
                <label for="numero">Numero de Tarjeta</label>
                <br>
                <input type="text" name="numero" id="numero" value="" placeholder="Numero Tarjeta">
                <label for="nombreTitutlar">Nombre Titular</label>
                <br>
                <input type="text" name="nombreTitutlar" id="nombreTitutlar" value="" placeholder="Nombre Titular">
                <label for="fecha">Fecha de Caducidad</label>
                <br>
                <input type="text" name="fecha" id="fecha" value="" placeholder="fecha">
                <label for="cvv">Cvv</label>
                <br>
                <input type="text" name="cvv" id="cvv" value="" placeholder="cvv">
                <button type="submit" class=btn_save><i class="fas fa-plus-square"></i> Agregar</button>
            </form>
        </div>
        <br>

    </section>
</body>

</html>