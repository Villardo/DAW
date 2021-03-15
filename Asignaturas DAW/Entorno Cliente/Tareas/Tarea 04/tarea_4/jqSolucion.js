$(document).ready(inicio);

function inicio() {
    // Si se hace clic en los elementos li que pertenezcan a la clase country se conmuta la clase enabled
    $("li.country").click(function () {
        $(this).toggleClass("enabled");
    })

    // Si se hace click en los nodos con identificador Spain o USA se muestra una alerta
    $("#Spain, #USA").click(function () {
        alert("Se ha pulsado " + $(this).text().trim());
    })

    // Filtro
    $(".q").keyup(filtrarPais);

    function filtrarPais() {
        $("li.country a").show();
        // Se recupera el texto introducido en la caja de búsqueda
        let filtro = $(".q").val();

        if (filtro !== "") {
            // Se recuperan todos los enlaces a paises que NO incluyan el filtro para poder ocultarlos
            var filtrado = $.grep($("li.country a"), function (elem, indice) {
                return !(elem.textContent.toUpperCase().includes(filtro.toUpperCase()));
            });
            // Se ocultan los elementos filtrados
            $.each(filtrado, function (indice, elemento) {
                $(this).hide();
            });
        }
    }

    // Borrado
    $("div#Europe a.remove").click(eliminarSeleccion);
    $("div#NorthAmerica a.remove").click(eliminarSeleccion);

    function eliminarSeleccion(e) {
        let continente = e.target.parentElement.parentElement.id;
        let seleccionados = $("div#" + continente + " li.country.enabled");
        $.each(seleccionados, function (indice, elemento) {
            $(this).remove();
        });
    }

    // reload
    $("div#Europe a.reload").click(recargar);
    $("div#NorthAmerica a.reload").click(recargar);

    function recargar(e) {
        let continente = e.target.parentElement.parentElement.id;
        let contenedor = $("div#" + continente + " ul.countryList");
        // se borra el contenido del contenedor de la lista
        contenedor.empty();
        // se recupera la lista de países de Europa
        $.get("getCountries.php",
            { "continent": continente },
            function (respuesta) {
                let datos = JSON.parse(respuesta); // objeto respuesta --> {"result": ["Albania","Andorra",...           
                let listaPaises = datos["result"]; // array de países --> ["Albania","Andorra",...
                for (let i = 0; i < listaPaises.length; i++) {
                    let li = $("<li class='country inline-block'>");
                    let a = $("<a href='#'' class='inline-block'></a>");
                    a.text(listaPaises[i]);
                    li.append(a);
                    contenedor.append(li);
                }
                // Restablecer manejadores
                $("div#" + continente + " li.country").click(function () {
                    $(this).toggleClass("enabled");
                })
            });

    }
}