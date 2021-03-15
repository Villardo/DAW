window.onload = iniciar;

function iniciar() {
    let intentos = 1 , envios=0;
    leerCookie();
    document.getElementById("btnEnviar").addEventListener('click', function (e) {
        e.preventDefault();
        // Creo que stá mal expresado https://i.imgur.com/nQihLT7.png ya que la cookie corresponde a los intentos
        sumarCookie(intentos);
        limpiarErrores();
        intentos++;
        if (validaNombre() & validaEdad() & validaPass() & validaPass2() & validaNif() & validaEmail() & validaGenero() & validaTelefono() & validaFrutas() && confirm("Pulsa aceptar si deseas enviar el formulario")) {
            limpiarErrores();            
            alert("Enviado");
            envios++;
            document.getElementById("intentos").innerHTML += " y se ha enviado "+envios+" vez/veces";
        }
    });
    document.getElementById("txtNombre").addEventListener("blur", () => {
        let texto = document.getElementById("txtNombre").value;
        document.getElementById("txtNombre").value = texto.toUpperCase();
    });
    document.getElementById("btnEnviar").disabled = true;
    document.getElementById("chkPrivacidad").addEventListener("change", () => {
        let checkbox = document.getElementById("chkPrivacidad");
        if (checkbox.checked) {
            document.getElementById("btnEnviar").disabled = false;
        } else {
            document.getElementById("btnEnviar").disabled = true;
        }
    });
}

function validaNombre() {
    let inputNombre = document.getElementById("txtNombre");
    let regexEspaciosNombre = new RegExp(/^\S*$/);
    if (inputNombre.value != "" && regexEspaciosNombre.test(inputNombre.value)) {
        return true;
    }
    document.getElementById("errores").innerHTML += "El nombre es obligatorio <br>";
    return false;
}

function validaEdad() {
    let edad = document.getElementById("txtEdad");
    let regexEdad = new RegExp(/^(1[8-9]|[2-9][0-9]|1[0-1][0-9]|120)$/);
    if (edad.value != "" && regexEdad.test(edad.value)) {
        return true;
    }
    document.getElementById("errores").innerHTML += "La edad debe estar comprendida entre 18 y 120 años <br>";
    return false;
}

function validaPass() {
    let password = document.getElementById("txtPass1");
    let regexCaracteresPass = new RegExp(/^.{6,}$/);
    if (password.value != "" && regexCaracteresPass.test(password.value)) {
        return true;
    }
    document.getElementById("errores").innerHTML += "La contraseña debe tener al menos 6 caracteres <br>";
    return false;
}

function validaPass2() {
    let password = document.getElementById("txtPass1");
    let password2 = document.getElementById("txtPass2");
    if (password.value == password2.value) {
        return true;
    } else {
        document.getElementById("errores").innerHTML += "Las contraseñas introducidas deben coincidir <br>";
        return false;
    }
}

function validaNif() {
    let nif = document.getElementById("txtNIF");
    let regexNif = new RegExp(/^\d{8}[A-Z]{1}$/);
    if (nif.value != "" && regexNif.test(nif.value)) {
        return true;
    }
    document.getElementById("errores").innerHTML += "El NIF debe contener 8 números seguidos de una letra mayúscula <br>";
    return false;
}

function validaEmail() {
    let email = document.getElementById("txtEmail");
    let regexEmail = new RegExp(/^[a-zA-Z0-9_.+-]+(@ciclosmontecastelo)\.com$/);
    if (email.value != "" && regexEmail.test(email.value)) {
        return true;
    }
    document.getElementById("errores").innerHTML += "El correo electrónico debe pertenecer al dominio ciclosmontecastelo.com <br>";
    return false;
}

function validaGenero() {
    let radios = document.getElementsByName("genero");
    for (let i = 0; i < radios.length; i++) {
        if (radios[i].checked) {
            return true;
        } else {
            document.getElementById("errores").innerHTML += "Debe seleccionar un género <br>";
            return false;
        }
    }
}

function validaTelefono() {
    let telefono = document.getElementById("txtTelf");
    let regexTelf = new RegExp(/^\d{9}$/);
    if (telefono.value != "" && regexTelf.test(telefono.value)) {
        return true;
    }
    document.getElementById("errores").innerHTML += "Debe introducir un número de teléfono de 9 cifras <br>";
    return false;
}

function validaFrutas() {
    let select = document.querySelector("select");
    if (select.selectedOptions.length < 2 || select.selectedOptions.length > 3) {
        document.getElementById("errores").innerHTML += "Debe seleccionar dos o tres frutas <br>";
        return false;
    }
    return true;
}

function limpiarErrores() {
    document.getElementById("errores").innerHTML = "";
}

function leerCookie() {
    let contIntentos = 0;
    document.getElementById("intentos").innerHTML = "Se ha enviado el formulario " + contIntentos + " veces";
}

function sumarCookie(contIntentos) {
    document.cookie = contIntentos;
    document.getElementById("intentos").innerHTML = "Se ha intentado enviar el formulario " + contIntentos + " vez/veces";
}
