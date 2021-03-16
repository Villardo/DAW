$(document).ready(inicio);

function inicio() {
  agregarCampos();
}

function agregarCampos() {
  $('#aceptar').click(function () {
    let numCampos = document.getElementById("numCifras").value;
    for (let i = 0; i < numCampos; i++) {
      $('#nuevosInputs').append('<div class="row mb-3 mt-2 ml-5">'
        + '<input type="number" name="num[]" id="num[]" class="valores"></input>'
        + '</div>');
    }
    $("#aceptar").prop("disabled", true);
    $("#numCifras").prop("disabled", true);
  });
}

let arr = document.querySelectorAll(".valores");