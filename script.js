
function mostrarFechaHora() {
    let reloj = document.getElementById('reloj');
    if (reloj) {
        let fecha = new Date();
       
        reloj.innerHTML = "Hoy es: " + fecha.toLocaleString('es-MX', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit' });
    }
}

setInterval(mostrarFechaHora, 1000);


function validarFormulario() {
    let nombre = document.getElementById('nombre').value;
    let apellidos = document.getElementById('apellidos').value;

    if (nombre === "" || apellidos === "") {
        alert("Error: Debes escribir tu nombre y tus apellidos.");
        return false; 
    }
    alert("¡Formulario enviado correctamente!");
    return true; 
}


function convertirPesos() {
    let dolares = document.getElementById('dolares').value;
    let pesos = dolares * 19.50; // Tipo de cambio 
    document.getElementById('resultadoConvertidor').innerHTML = "$" + pesos.toFixed(2) + " MXN";
}


function calcular() {
    let n1 = parseFloat(document.getElementById('num1').value);
    let n2 = parseFloat(document.getElementById('num2').value);
    let op = document.getElementById('operacion').value;
    let res = 0;

    if (op === "+") res = n1 + n2;
    if (op === "-") res = n1 - n2;
    if (op === "*") res = n1 * n2;
    if (op === "/") res = n1 / n2;

    document.getElementById('resultadoCalculadora').innerHTML = "Resultado: " + res;
}


function revisarCuestionario() {
    let p1 = document.getElementById('preg1').value.toLowerCase();
    let p2 = document.getElementById('preg2').value.toLowerCase();
    let puntaje = 0;

    if (p1 === "tizimín" || p1 === "tizimin") puntaje++;
    if (p2 === "uady") puntaje++;

    alert("Tu calificación es: " + puntaje + " de 2 puntos.");
}

