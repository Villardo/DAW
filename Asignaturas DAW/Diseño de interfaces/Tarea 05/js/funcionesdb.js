let bd,cont=0 ,flag_primeravez=true;
let arrayTareas=[
    {"nombre":"Ir al super", "urgencia":1},
    {"nombre":"Cambiar ruedas del coche", "urgencia":2},
    {"nombre":"Estudiar Diseño", "urgencia":3}];

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

    let solicitud = window.indexedDB.open("BDMontecastelo");    

    solicitud.onsuccess = function (e) {        
        bd = e.target.result;
    };
    solicitud.onupgradeneeded = function (e) {
        bd = e.target.result;
        bd.createObjectStore("tarea", { keyPath: "nombre_tarea" });
    };
}

function agregarObjeto() {
    try {
        let nombre_tarea = document.getElementById("nombre_tarea").value;
        let urgencia = document.getElementById("urgencia").value;
        let transaccion = bd.transaction(["tarea"], 'readwrite');
        
        let almacen = transaccion.objectStore("tarea");
        if (flag_primeravez) {
            for (let i = 0; i < arrayTareas.length; i++) {                
                let agregar = almacen.add({ 
                    nombre_tarea: arrayTareas[i].nombre, 
                    urgencia: arrayTareas[i].urgencia 
                });                  
                agregar.addEventListener("success", mostrar, false);
            } 
        }else{
            let agregar = almacen.add({ 
                nombre_tarea: nombre_tarea, 
                urgencia: urgencia 
            });
            agregar.addEventListener("success", mostrar, false);
        }    
        flag_primeravez=false;    
    } catch (DOMException) {
        console.log("Al eliminar la bd se ha cerrado la conexión, carga otra vez la página para que se vuelva a abrir la bd");
        alert("Al eliminar la bd se ha cerrado la conexión, carga otra vez la página para que se vuelva a abrir la bd");
    }    
}

// function cargaPrevia(){
//     for (let i = 0; i < arrayTareas.length; i++) {
//         let transaccion = bd.transaction(["tarea"], 'readwrite');
//         let almacen = transaccion.objectStore("tarea");
//         let agregar = almacen.add({ 
//             nombre_tarea: arrayTareas[i].nombre, 
//             urgencia: arrayTareas[i].urgencia 
//         });  
//         agregar.addEventListener("success", mostrar, false);
//     }      
// }

function actualizarObjeto() {
    try {
        let nombre_tarea = document.getElementById("nombre_tarea").value;
        let urgencia = document.getElementById("urgencia").value;
        let transaccion = bd.transaction(["tarea"], "readwrite");
        let almacen = transaccion.objectStore("tarea");
        let actualizar = almacen.put({ 
            nombre_tarea: nombre_tarea, 
            urgencia: urgencia
        });

        actualizar.addEventListener("success", mostrar, false);
    } catch (DOMException) {
        console.log("Al eliminar la bd se ha cerrado la conexión, carga otra vez la página para que se vuelva a abrir la bd");
        alert("Al eliminar la bd se ha cerrado la conexión, carga otra vez la página para que se vuelva a abrir la bd");
    } 
}

function borrarObjeto() {
    try {
        let nombre_tarea = document.getElementById("nombre_tarea").value;
        let transaccion = bd.transaction(["tarea"], "readwrite");
        let almacen = transaccion.objectStore("tarea");
        let actualizar = almacen.delete(nombre_tarea);

        actualizar.addEventListener("success", mostrar, false);
    } catch (DOMException) {
        console.log("Al eliminar la bd se ha cerrado la conexión, carga otra vez la página para que se vuelva a abrir la bd");
        alert("Al eliminar la bd se ha cerrado la conexión, carga otra vez la página para que se vuelva a abrir la bd");
    } 
}

function vaciarBD() {
    try {
        let transaccion = bd.transaction(["tarea"], "readwrite");
        let almacen = transaccion.objectStore("tarea");
        let borrar = almacen.clear();
        
        borrar.addEventListener("success", mostrar, false);
    } catch (DOMException) {
        console.log("Al eliminar la bd se ha cerrado la conexión, carga otra vez la página para que se vuelva a abrir la bd");
        alert("Al eliminar la bd se ha cerrado la conexión, carga otra vez la página para que se vuelva a abrir la bd");
    } 
}

function eliminarBD() {
    window.indexedDB.deleteDatabase("BDMontecastelo");
    bd.close();    
    console.log("BD eliminada");
    
    zonadatos.innerHTML = "";
    alert("BD eliminada");
}

function mostrar() {
    zonadatos.innerHTML = "";

    let transaccion = bd.transaction(["tarea"], "readonly");
    let almacen = transaccion.objectStore("tarea");
    let cursor = almacen.openCursor();

    cursor.addEventListener("success", mostrarDatos, false);
}

function mostrarDatos(e) {
    let cursor = e.target.result;
    if (cursor) {        
        zonadatos.innerHTML += "<div>" + cursor.value.nombre_tarea +" - "+ cursor.value.urgencia + "</div>";
        cursor.continue();
    }
}

window.addEventListener("load", iniciar, false);

