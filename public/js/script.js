/* INICIO SCRIPT PARA VISTA ADMIN (LAYOUT) */
function carritoCompras(){
    var div1 = document.getElementById('div1');
    var div2 = document.getElementById('div2');

    div1.style.visibility = 'visible';
    div2.style.visibility = 'visible';
}

function ocultarCarrito(){
    var div1 = document.getElementById('div1');
    var div2 = document.getElementById('div2');

    div1.style.visibility = 'hidden';
    div2.style.visibility = 'hidden';
}

function mostrarNoti(){
    var noti = document.getElementById("notiCarrito");
    var valorNoti = document.querySelector("#valorNoti").value;

    if (valorNoti == 0) {
        
    }else{
        noti.style.visibility = 'visible';
    }
}
/* FIN SCRIPT PARA VISTA ADMIN (LAYOUT) */

/* INICIO SCRIPT PARA VISTA INDEX (PAGAR) */
var divBoletos = document.querySelector(".divBoletos");
var divPagar = document.querySelector(".divPagar");

function mostrarBoleto()
{
    divBoletos.style.display = 'flex';
    divPagar.style.display = 'none';
}

function mostrarPagar()
{
    divBoletos.style.display = 'none';
    divPagar.style.display = 'block';
}