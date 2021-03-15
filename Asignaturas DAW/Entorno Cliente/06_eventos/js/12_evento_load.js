window.addEventListener("load", crearMensaje);

function crearMensaje() {
    document.getElementById("btnSaludo").addEventListener("click", saludar);
}

function saludar() {
    let unDiv = document.createElement("div");
    unDiv.id = "d1";
    let unPara = document.createElement("p");
    unPara.setAttribute("class", "text");
    unPara.textContent = "¡Hola, buenos días, buenas tardes, buenas noches!";
    unPara.style.fontFamily = "Verdana";
    unDiv.appendChild(unPara);
    document.body.appendChild(unDiv);
}

