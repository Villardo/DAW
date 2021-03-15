/*

DUDAS (Ejercicio 1):
    1- Se podría hacer con multiples ternarias ? Algo como:

    document.getElementById("txtColor").value == colores[0] ? coleccionSpan[i].style.color = "red" : coleccionSpan[i].style.color = "";
    document.getElementById("txtColor").value == colores[1] ? coleccionSpan[i].style.color = "green" : coleccionSpan[i].style.color = "";
    document.getElementById("txtColor").value == colores[2] ? coleccionSpan[i].style.color = "blue" : coleccionSpan[i].style.color = "";
    document.getElementById("txtColor").value == colores[3] ? coleccionSpan[i].style.color = "yellow" : coleccionSpan[i].style.color = "";     

    2- Como hacer que salte el alert solo 1 vez
    
--------------

El usuario puede teclear uno de cuatro posibles colores: rojo, verde, azul y amarillo.
Cuando se pulsa el botón Cambiar, la palabra Yellow debe mostrarse en el color
introducido por el usuario (tanto en el encabezado como en el párrafo).

En caso de que el usuario introduzca un color distinto de los cuatro soportados, el
navegador mostrará el siguiente aviso: Color no soportado.

*/

window.addEventListener("load", ejerc1);
window.addEventListener("load", ejerc2);
window.addEventListener("load", setlibase);
window.addEventListener("load", ejerc3anadir);
window.addEventListener("load", ejerc3borrar);
window.addEventListener("load", ejerc4);

let colores = ["rojo", "verde", "azul", "amarillo"], flag = true;

function ejerc1() {
    document.getElementById("btnColor").addEventListener("click", event => {
        if (colores.includes(document.getElementById("txtColor").value)) {
            let coleccionSpan = document.getElementsByClassName("color_submarino");
            for (let i = 0; i < coleccionSpan.length; i++) {
                if (document.getElementById("txtColor").value == colores[0]) coleccionSpan[i].style.color = "red";
                else if (document.getElementById("txtColor").value == colores[1]) coleccionSpan[i].style.color = "green";
                else if (document.getElementById("txtColor").value == colores[2]) coleccionSpan[i].style.color = "blue";
                else if (document.getElementById("txtColor").value == colores[3]) coleccionSpan[i].style.color = "yellow";
                else coleccionSpan[i].style.color = "";
            }
        } else {
            alert("Color no soportado");
        }
    });
}

/*
Si se hace clic sobre el encabezado h4 de este apartado, se muestra una tabla
HTML con los valores almacenadas en el array incluido en cumbres.js. La tabla se
situará dentro del div cuyo id es cumbres.

La tabla debe generarse de modo dinámico, de tal modo que el código funcione
para cualquier contenido del array.

La tabla se crea una única vez. Una vez mostrada, pulsaciones sucesivas sobre el
encabezado deben ser ignoradas.
*/

let nombresTabla = ["Nombre", "Altura", "País"];

function ejerc2() {
    document.getElementById("heaCumbres").addEventListener("click", event => {
        if (document.getElementById("cumbres").innerText == "") {
            let tabla = document.createElement('table');
            tabla.id = "tabla";
            tabla.setAttribute('border', '1');
            tabla.style.marginBottom = '10px';

            for (let i = 0; i < nombresTabla.length; i++) {
                let tHead = document.createElement('th');
                tabla.appendChild(tHead);
                tHead.textContent = nombresTabla[i];
            }

            for (let j = 0; j < cumbres.length; j++) {
                let tRow = document.createElement('tr');
                let tDataNombre = document.createElement('td');
                let tDataAltura = document.createElement('td');
                let tDataPais = document.createElement('td');
                tDataNombre.textContent = cumbres[j].nombre;
                tDataAltura.textContent = cumbres[j].altura;
                tDataPais.textContent = cumbres[j].pais;
                tRow.appendChild(tDataNombre);
                tRow.appendChild(tDataAltura);
                tRow.appendChild(tDataPais);
                tabla.appendChild(tRow);
            }
            document.getElementById("cumbres").appendChild(tabla);
        }
    });
}

/*
El botón Añadir permite añadir a la lista de actividades un nuevo elemento con el
texto introducido en la caja de texto situada a la izquierda del botón.

El botón Borrar permite eliminar de la lista de actividades el elemento cuyo texto
coincida con el introducido en la caja de texto situada a la izquierda del botón.

Si se pulsa el botón con el campo en blanco, no se debe introducir una nueva
entrada en la lista
*/

function setlibase() {
    let liBase = document.querySelector("li");
    liBase.setAttribute('id', liBase.textContent);
}

function ejerc3anadir() {
    document.getElementById("btnAnadir").addEventListener("click", event => {
        let ul = document.getElementById("listaActividades");
        let textAnadir = document.getElementById("txtAnadir");
        let li = document.createElement("li");
        li.setAttribute('id', textAnadir.value);
        li.appendChild(document.createTextNode(textAnadir.value));
        ul.appendChild(li);
    });
}

function ejerc3borrar() {
    document.getElementById("btnBorrar").addEventListener("click", event => {
        let ul = document.getElementById("listaActividades");
        let textBorrar = document.getElementById("txtBorrar");
        let item = document.getElementById(textBorrar.value);
        ul.removeChild(item);
    });
}

/*
El programa funciona como un convertidor de euros a dólares y viceversa. Cada vez
que se teclea un número en una caja de texto, en concreto en el momento de soltar
la tecla, se actualiza el valor en la otra caja.

Los valores decimales se mostrarán con dos cifras.

En el momento en el que se introduzca en alguna caja de texto un valor no
numérico, la otra caja debe vaciarse, ya que no se puede realizar la conversión.
*/

function ejerc4() {

    let regexpNumero = /^\d+$/, regexpDecimal = /^\d+.\d+$/;

    document.getElementById("txtEuro").addEventListener("keyup", event => {
        if (regexpNumero.test(document.getElementById("txtEuro").value) || regexpDecimal.test(document.getElementById("txtEuro").value)) {
            document.getElementById("txtDolar").value = (document.getElementById("txtEuro").value * 1.12).toFixed(2);
        } else {
            isNaN(document.getElementById("txtEuro").value);
            document.getElementById("txtDolar").value = "";
        }
    });

    document.getElementById("txtDolar").addEventListener("keyup", event => {
        if (regexpNumero.test(document.getElementById("txtDolar").value) || regexpDecimal.test(document.getElementById("txtDolar").value)) {
            document.getElementById("txtEuro").value = (document.getElementById("txtDolar").value / 1.12).toFixed(2);
        } else {
            isNaN(document.getElementById("txtDolar").value);
            document.getElementById("txtEuro").value = "";
        }
    });
}