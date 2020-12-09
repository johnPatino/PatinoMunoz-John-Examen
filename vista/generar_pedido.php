<!DOCTYPE html>
<html lang="es">

<head>
    <?php include "../controladores/scripts.php"; ?>
    <link rel="stylesheet"  href="../css/style.css"/>
    <title>Generar pedido</title>
    </title>
</head>

<body>
<?php include "../controladores/header.php"; ?>
    <section id="container">

        <div class="title_page">
            <h1><i class="fas fa-shopping-cart"></i></i>Nuevo Pedido</h1>
        </div>
       
        <table class="tbl_venta">
            <thead>
                <tr>
                    <th colspan="2">Nombre</th>
                    <th class="textrigth">Precio</th>
                    <th width="100px">Precio Total</th>
                    <th colspan="2">Acciones</th>
                </tr>
                <tr id="buscaComida">
                    <td colspan="2"><input type="text" name="txt_producto" id="txtproducto" onkeypress="javascript:buscar_comida(event,this);"  > </td>
                    <td id="txt_precio" class ="textright">0.00</td>
                    <td id="txt_precio_total" class ="textright">0.00</td>
                    <td colspan="2">
                    <input type="text" name="txt_cant_producto" id="txt_cant_producto" value="0" min="1" disables onkeypress="javascript:calcularSubtotal(event,this);">
                    </td>
                </tr>
                <tr>
                    <th colspan="2">Nombre</th>
                    <th>Cantidad</th>
                    <th class="textright">Precio</th>
                    <th class="textright">Precio Total</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody id="detalle_venta">
            <?php
            //forech no es un buble es un constructor y solo puede iterar en array y objetos
            session_start();
            $total = 0;
            if(isset($_SESSION["carrito"])){
            $carrito = $_SESSION["carrito"];
            $i=0;
            foreach($carrito as $valor) {
                echo '<tr>
                <td colspan="2">' . $valor['nombre'] . '</td>
                <td class="textcenter">' . $valor['cantidad'] . ' </td>
                <td class="textright"> $ ' .  $valor['precio'] . ' </td>
                <td class="textright"> $ ' . $valor['precio'] *  $valor['cantidad'] . ' </td>
                <td class="">
                <a class="link_delete" href ="../controladores/eliminarComida.php?in='.$i.'"><i class ="far fa-trash-alt"></i> Eliminar</a>
                </td>
                </tr>';
                $total += $valor['precio'] *  $valor['cantidad'] ;
                $i++;   
                }
            }
            ?>

            </tbody>

            <tfoot>
            <?php
               echo ' <tr>
                    <td colspan="5" class="textright">Total  </td>
                    <td class="textright"> '. $total .' </td></tr> ';
            ?>
            </tfoot>
        </table>


        <table class="tbl_venta">
            <thead>
                <tr>
                    <th colspan="2">Numero Tarjeta</th>
                    <th class="textrigth">Propietrio</th>
                    <th width="100px">Fecha Caducidad</th>
                </tr>
                <tr id="tarjetaBusqueda">
                    <td colspan="2"><input type="text" name="numeroTarjeta" id="numeroTarjeta" onkeypress="javascript:buscarTarjeta(event, this);"> </td>
                    <td colspan="2" id="propietario" class ="textright"></td>
                    <td id="fechaCaducidad" class ="textright"></td>
                </tr>
            </thead>
        </table>



        <br>
        <div class = "datos_cliente">
        <form name="form_new_client_ventana" id="form_new_cliente_venta" class="datos" method="POST" action="../controladores/generar_pedido.php">
           
            <div class="wd100">
                <labe>Nombre Cliente</labe>
                <input type="text" name="nombreCliente" id="nombreCliente" >
            </div>
          
            <div class="wd100">
                <labe>Observaciones</labe>
                <input type="text" name="observaciones" id="observaciones">
            </div>
            <?php
            echo "<input type='hidden' name='totalPedido' value=". $total .">";
            ?>

            <div id="acciones_venta">
            <br>
            <input type='submit' value='Comprar'>
            </div>
            
        </form>
        </div>

    </section>
   
</body>

</html>