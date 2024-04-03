$(document).ready(function () {
  $("#DataZapata").submit(function (event) {
    event.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "Controladores/DzapataControlador.php",
      data: formData,
      success: function (response) {
        $("#ObtenerResultados").html(response);
      },
    });
  });
});
