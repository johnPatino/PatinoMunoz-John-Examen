<!DOCTYPE html>
<html lang="es">

<head>
    <?php include "../controladores/scripts.php"; ?>
    <title>Registro Comida</title>
</head>

<body>

    <?php include "../controladores/header.php"; ?>

    <section id="container">
        <div class="form_register">
            <h1 id="agT"><i class="fas fa-hamburger"></i></i> Agregar Comida</h1>
            <hr>
            <div class="alert"></div>
            <form action="../controladores/AgregarComida.php" method="POST">
                
                <label for="nombreP">Nombre</label>
                <input type="text" name="nombreP" id="nombreP" value="" placeholder="Nombre del Producto" >
                <br>
                <label for="Precio">Precio</label>
                <input type="number" step="0.01" name="Precio" id="Precio" value="" placeholder="Precio">
                
                
                <button type="submit" class=btn_save><i class="fas fa-plus-square"></i> Agregar</button>
            </form>
        </div>
        <br>

    </section>
</body>

</html>