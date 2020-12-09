
function buscar_comida(event,criterio){
    if (event.keyCode == 13 || event.which == 13){
        let comida = criterio.value.trim();
        let inserta ="buscaComida";
        let enlace =  "../controladores/buscar_comida.php?key=" + comida;
        buscarAjax(inserta,enlace);
    }
}


function calcularSubtotal(criterio,precio){
        let cantidad = criterio.value.trim();
        if(cantidad>0){
            let inserta ="txt_precio_total";
            let enlace =  `../controladores/actulizar_precio.php?cantidad=${cantidad}&precio=${precio}`;
            buscarAjax(inserta,enlace);
        }
}

function buscarTarjeta(event,criterio){
    if (event.keyCode == 13 || event.which == 13){
    let numeroTarjeta = criterio.value.trim();
    let inserta = "tarjetaBusqueda";
    let enlace =  `../controladores/buscar_tarjeta.php?key=${numeroTarjeta}`;
    buscarAjax(inserta,enlace);
    }
}

function buscarPorTarjeta(event,criterio){
    if (event.keyCode == 13 || event.which == 13){
    let numeroTarjeta = criterio.value.trim();
    let inserta = "listaPedidos";
    let enlace =  `../controladores/buscar_Por_tarjeta.php?key=${numeroTarjeta}`;
    buscarAjax(inserta,enlace);
    }
}


function buscarAjax(insertar, enlace) {
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById(insertar).innerHTML = this.responseText;
        }
    };
        xmlhttp.open("GET", enlace, true);
        xmlhttp.send();
}
