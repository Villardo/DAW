var bd;
function iniciar() {

    zonadatos = document.getElementById("zonadatos");
    botonGrabar = document.getElementById("grabar");
    botonActualizar = document.getElementById("actualizar");
    botonBorrar = document.getElementById("borrar");
    botonVaciarBD = document.getElementById("vaciar");
    botonEliminarBD = document.getElementById("eliminar");

    botonGrabar.addEventListener("click", agregarObjeto, false);
    botonActualizar.addEventListener("click", actualizarObjeto, false);
    botonBorrar.addEventListener("click", borrarObjeto, false);
    botonVaciarBD.addEventListener("click", vaciarBD, false);
    botonEliminarBD.addEventListener("click", eliminarBD, false);

    var solicitud = window.indexedDB.open("BDMontecastelo");

    solicitud.onsuccess = function (e) {
        bd = e.target.result;
    };
    solicitud.onupgradeneeded = function (e){
        bd = e.target.result;
        bd.createObjectStore("biblioteca", {keyPath: "isbn"});
    };

}

function agregarObjeto(){
    var isbn = document.getElementById("isbn").value;
    var titulo = document.getElementById("titulo").value;
    var anho = document.getElementById("anho").value;

    var transaccion = bd.transaction(["biblioteca"], "readwrite");

    var almacen = transaccion.objectStore("biblioteca");

    var agregar = almacen.add({isbn: isbn, titulo: titulo, anho: anho});

    agregar.addEventListener("success", mostrar, false);

}

function actualizarObjeto(){
    var isbn = document.getElementById("isbn").value;
    var titulo = document.getElementById("titulo").value;
    var anho = document.getElementById("anho").value;

    var transaccion = bd.transaction(["biblioteca"], "readwrite");

    var almacen = transaccion.objectStore("biblioteca");

    var actualizar = almacen.put({isbn: isbn, titulo: titulo, anho: anho});

    actualizar.addEventListener("success", mostrar, false);

}

function borrarObjeto(){
    var isbn = document.getElementById("isbn").value;

    var transaccion = bd.transaction(["biblioteca"], "readwrite");

    var almacen = transaccion.objectStore("biblioteca");

    var actualizar = almacen.delete(isbn);

    actualizar.addEventListener("success", mostrar, false);   
}

function vaciarBD(){   
    var transaccion = bd.transaction(["biblioteca"], "readwrite");

    var almacen = transaccion.objectStore("biblioteca");

    var borrar = almacen.clear();

    borrar.addEventListener("success", mostrar, false);

}

function eliminarBD(){

    window.indexedDB.deleteDatabase("BDMontecastelo");

}

function mostrar(){

    zonadatos.innerHTML = "";

    var transaccion = bd.transaction(["biblioteca"], "readonly");

    var almacen = transaccion.objectStore("biblioteca");

    var cursor = almacen.openCursor();

    cursor.addEventListener("success", mostrarDatos, false);
}

function mostrarDatos(e){

    var cursor = e.target.result;

    if (cursor) {

        zonadatos.innerHTML += "<div>" + cursor.value.isbn + " - "
        + cursor.value.titulo + " - " + cursor.value.anho + "</div>";

        cursor.continue();
    }
}

window.addEventListener("load", iniciar, false);