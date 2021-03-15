
$(document).ready(inicio);

    function inicio() {
        toggleCountry();
        identifySpainUsa();
        removeCountry();
        searchCountry();
        rechargeAjax();
    }

//1- Si se hace clicen los elementos li que pertenezcan a la clase country se conmuta  la  clase enabled.Es  decir,  se  añade  la  clase enabled al  elemento  si  no  está presente y se elimina si lo está.

    function toggleCountry(){
        $("ul.countryList").on("click", "li.country", function(){
            $(this).toggleClass("enabled");
        });
    }

//2- Si  se  hace  clic en  los  nodos  con  identificador Spain o USA se  muestra  una alerta indicando el nombre del país que se ha pulsado, “Spain” o “United States of America”, respectivamente.

    function identifySpainUsa() {
        $("ul.countryList").on("click", "li.country", function(){
            if ($(this).text().trim() == "Spain" || $(this).text().trim() == "United States of America") {               
                alert($(this).text().trim());
            }
        });
    }

    function recargarPagina(){
        $("div.country").click(() => {
                alert("Hola");
            });
    }

//3- Implementar los botones para borrar los países activados cuando se pulsen, teniendo en cuenta que existe un botón para cada continente.

    function removeCountry(){
        $("div#Europe a.remove,icon,inline-block").click(function(){     
            $("#Europe").find(".country,inline-block,enabled").each(function(){
                if ($(this).hasClass("enabled")) {
                    $(this).remove();
                }
            });
        });

        $("div#NorthAmerica a.remove,icon,inline-block").click(function(){     
            $("#NorthAmerica").find(".country,inline-block,enabled").each(function(){
                if ($(this).hasClass("enabled")) {
                    $(this).remove();
                }
            });
        });
    }

//4- Empleando  la  caja  de texto  situada en  la  parte superior  derechade  la  página, implementar  un  filtro  por  nombre de  tal  modo  que,  cada  vez  que  se  teclee  en  la  caja  de texto, se muestran únicamente aquellos países cuyo nombre contenga el texto escrito.  
// keyup  /  .hide()  /  $.grep()

    function searchCountry(){
        $(".q").on("keyup", function () {
            let arrayCountries = $.makeArray($(".country,inline-block"));

            let arrayNoCoinciden = $.grep(arrayCountries,function(pais){  
                return (!pais.innerText.toLowerCase().includes($(".q").val().toLowerCase().trim()))
            })
            let arrayCoinciden = $.grep(arrayCountries,function(pais){                   
                return (pais.innerText.toLowerCase().includes($(".q").val().toLowerCase().trim()))
            })

            $.each(arrayCoinciden, function () {                
                $(this).show();                
            });
            $.each(arrayNoCoinciden, function () {                
                $(this).hide();                
            });
        });
    }

//5- Implementar los  botones para que  recarguen todos los  países de  cada continente cuando se pulsen, teniendo en cuenta que existe un botón para cada continente.
//   La  recarga  de  la  información  se  realiza  a  través  de  AJAX  mediante  una  petición  GET  al script getCountires.php.  Como  se  puede  comprobar  en  el 
//   código  del  script,  éste  recibe un  parámetro “continent” cuyo  valor  es  el  nombre  del  continente  cuyos  países  se pretende recargar (“Europe”o “NorthAmerica”).

    function rechargeAjax(){

        $("div#Europe a.reload,icon,inline-block").click(function(){     
            $.get("getCountries.php", {
                "continent": "Europe"
            },
            function (respuesta) {
                let countriesEurope = JSON.parse(respuesta); 
                let arr = $.makeArray(countriesEurope.result);               
                
                $("#Europe").find(".country,inline-block").remove();
                
                let text="";
                for (let i = 0; i < arr.length; i++) {
                    text+='<li class="country inline-block"><a href="#" class="inline-block">'+arr[i]+'</a></li>';
                }
                $("#Europe ul.countryList").html(text);

            }).done(function () {
                alert("Recarga exitosa");
            }).fail(function () {
                alert("Error");
            });
        });

        $("div#NorthAmerica a.reload,icon,inline-block").click(function(){     
            $.get("getCountries.php", {
                "continent": "NorthAmerica"
            },
            function (respuesta) {
                let countriesNorthAmerica = JSON.parse(respuesta);
                let arr = $.makeArray(countriesNorthAmerica.result);

                $("#NorthAmerica").find(".country,inline-block").remove();
                
                let text="";
                for (let i = 0; i < arr.length; i++) {
                    text+='<li class="country inline-block"><a href="#" class="inline-block">'+arr[i]+'</a></li>';
                }
                $("#NorthAmerica ul.countryList").html(text);

            }).done(function () {
                alert("Recarga por AJAX exitosa");
            }).fail(function () {
                alert("Ha ocurrido un error");
            });
        });
    }
