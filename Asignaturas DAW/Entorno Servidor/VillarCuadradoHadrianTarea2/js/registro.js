$(document).ready(inicio);

function inicio() {
    $("#enun1").click(function () {
        $("#texto1").toggle();
    });

    $("#enun2").click(function () {
        $("#texto2").toggle();
    });

    $("#enun3").click(function () {
        $("#texto3").toggle();
    });

    document.getElementById("usuarioExistenteBoton").addEventListener('click', function (e) {
        e.preventDefault();
        // $("#btnModal").click(); //Mostrar formulario modal (no funciona: "form.show()", le hago click a un botón escondido)
    });

    $("#nuevoUsuarioBoton").click(function (e) {
        // e.preventDefault();
        nuevoUsuario();
        $("#btnModal").click(); //Mostrar formulario modal (no funciona: "form.show()", le hago click a un botón escondido)
        // e.currentTarget.submit(); //Debería de cancelar el preventDefault y mandar el formulario
    });

}

function nuevoUsuario() {
    let password = document.getElementById("passUsuarioNuevo1");
    let password2 = document.getElementById("passUsuarioNuevo2");
    let inputNombre = document.getElementById("usuarioNuevo");

    if (validaNombreUsuario(inputNombre) && validaPass(password) && validaPass(password2) && passRepetir(password, password2)) {
        mensajeModal(6);
    }
}

function validaPass(inputPass) {
    let regexCaracteresPass = new RegExp(/^.{6,}$/);
    if (inputPass.value != "" && regexCaracteresPass.test(inputPass.value)) {
        return true;
    }
    mensajeModal(3);
    return false;
}

function passRepetir(pass1, pass2) {
    if (pass1.value == pass2.value) {
        return true;
    }
    mensajeModal(4);
    return false;
}

function validaNombreUsuario(inputNombre) {
    let regexEspaciosNombre = new RegExp(/^[a-zA-Z0-9_-]{4,12}$/);
    if (inputNombre.value != "" && regexEspaciosNombre.test(inputNombre.value)) {
        return true;
    }
    mensajeModal(2);
    return false;
}

function mensajeModal(numero) {
    switch (numero) {
        case 1:
            $("#tituloModal").text("Error");
            $("#textoModal").text("El usuario ya existe.");
            break;
        case 2:
            $("#tituloModal").text("Error");
            $("#textoModal").text("Error con el formato del usuario.");
            break;
        case 3:
            $("#tituloModal").text("Error");
            $("#textoModal").text("Error con el formato de la password.");
            break;
        case 4:
            $("#tituloModal").text("Error");
            $("#textoModal").text("Las contraseñas no coinciden.");
            break;
        case 5:
            $("#tituloModal").text("Error");
            $("#textoModal").text("Error creando el usuario.");
            break;
        case 6:
            $("#tituloModal").text("Éxito");
            $("#textoModal").text("Usuario creado correctamente.");
            break;
        default:
            break;
    }
}

