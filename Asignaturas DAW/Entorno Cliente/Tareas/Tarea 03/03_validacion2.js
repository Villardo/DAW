window.addEventListener('load', configuracionInicial, false);

function configuracionInicial() {
    document.getElementById("btnEnviar").addEventListener('click', validar, false);
    document.getElementById("txtNombre").addEventListener('blur', focoNombre, false);
    if (document.getElementById("chkPrivacidad").checked)
        document.getElementById("btnEnviar").disabled = false;
    else document.getElementById("btnEnviar").disabled = true;
    document.getElementById("chkPrivacidad").addEventListener('change', privacidad, false);
    setCookie("intentos", "0", 1);
}

function getCookie(nombre) {
    var nom = nombre + "=";
    var array = document.cookie.split(";");
    for (var i = 0; i < array.length; i++) {
        var c = array[i];
        while (c.charAt(0) == " ") {
            c = c.substring(1);
        }
        if (c.indexOf(nombre) == 0) {
            return c.substring(nom.length, c.length);
        }
    }
    return "";
}

function setCookie(nombre, valor, expiracion) {
    var d = new Date();
    d.setTime(d.getTime() + expiracion * 24 * 60 * 60 * 1000);
    var expiracion = "expires=" + d.toUTCString();
    document.cookie = nombre + "=" + valor + ";" + expiracion + ";path=/";
}

function validar(e) {
    // Gestión cookies: apartado 14
    let num_intentos = Number(getCookie("intentos"));
    num_intentos++;
    setCookie("intentos", num_intentos, 1);
    // Eliminar mensajes anteriores: apartado 12
    document.getElementById("errores").innerHTML = "";
    // Validación (con confirmación: apartado 11)
    validaNombre(); validaEdad(); validaPassword(); validaNIF(); validaEmail(); validaGenero(); validaTelf(); validaFrutas();
    if ((document.getElementById("errores").innerHTML == "") && confirm("¿Desea enviar el formulario?")) {
        return true;
    } else {
        e.preventDefault();
        return false;
    }
}

// apartado 1
function validaNombre() {
    let nombre = String(document.getElementById("txtNombre").value);
    if (nombre.includes(" ")) {
        document.getElementById("errores").innerHTML += "<br>El nombre no puede incluir espacios";
        return false;
    } else  if (nombre == "") {
        document.getElementById("errores").innerHTML += "<br>El nombre es obligatorio";
        return false;
    }
    return true;
}

// apartado 2
function focoNombre() {
    let nombre = String(document.getElementById("txtNombre").value);
    document.getElementById("txtNombre").value = nombre.toUpperCase();
}

// apartado 3
function validaEdad() {
    var edad = Number(document.getElementById("txtEdad").value);
    if ((edad > 18) && (edad < 120)) {
        return true;
    } else {
        document.getElementById("errores").innerHTML += "<br>La edad debe estar comprendida entre 18 y 120 años";
        return false
    }
}

// apartados 4 y 5
function validaPassword() {
    var pass1 = document.getElementById("txtPass1").value;
    var pass2 = document.getElementById("txtPass2").value;
    if ((pass1 != pass2)) {
        document.getElementById("errores").innerHTML += "<br>Las contraseñas no coinciden";
        return false
    }
    if (pass1.length < 6) {
        document.getElementById("errores").innerHTML += "<br>La contraseña debe contener al menos 6 caracteres";
        return false
    }
    return true;
}

// apartado 6
function validaNIF() {
    let nif = document.getElementById("txtNIF").value;
    let valido = /[0-9]{8}[A-Z]/.test(nif);
    if (!valido) {
        document.getElementById("errores").innerHTML += "<br>El NIF debe contener 8 números seguidos de una letra mayúscula";
    }
    return valido;
}

// apartado 7
function validaEmail() {
    let email = String(document.getElementById("txtEmail").value);
    if (email.endsWith("ciclosmontecastelo.com")) {
        return true;
    }
    document.getElementById("errores").innerHTML += "<br>El correo electrónico debe pertenecer al dominio ciclosmontecastelo.com";
    return false;
}

// apartado 8
function validaGenero() {
    let radios = document.querySelectorAll("[name=genero]");
    // for (let radio of Array.from(radios))
    for (let radio of radios) {
        if (radio.checked)
            return true;
    }
    document.getElementById("errores").innerHTML += "<br>Debe seleccionar un género";
    return false;
}

// apartado 9
function validaTelf() {
    var strTelf = String(document.getElementById("txtTelf").value);
    var numTelf = Number(strTelf);
    if (isNaN(numTelf) || (strTelf.length != 9)) {
        document.getElementById("errores").innerHTML += "<br>Debe introducir un número de teléfono de 9 cifras";
        return false
    } else {
        return true;
    }
}

// apartado 10
function validaFrutas() {
    let frutas = document.querySelector("#frutas");
    let contador = 0;
    for (let fruta of frutas.options) {
        if (fruta.selected)
            contador++;
    }
    if ((contador == 2) || (contador == 3)) {
        return true;
    }
    document.getElementById("errores").innerHTML += "<br>Debe seleccionar dos o tres frutas";
    return false;
}

// apartado 13
function privacidad() {
    if (document.getElementById("chkPrivacidad").checked)
        document.getElementById("btnEnviar").disabled = false;
    else document.getElementById("btnEnviar").disabled = true;
}