$(document).ready(function () {
  $("#DataZapataCombinada").submit(function (event) {
    event.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "Controladores/DzapataCombinadaControlador.php",
      data: formData,
      success: function (response) {
        $("#ObtenerResultados").html(response);
      },
    });
  });
});