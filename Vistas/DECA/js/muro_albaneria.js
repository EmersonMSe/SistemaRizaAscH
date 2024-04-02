$(document).ready(function () {
    $("#data").submit(function (event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "Controladores/malbaneriaControlador.php",
            data: formData,
            success: function (response) {
                console.log(response);
                $("#ObtenerResultados").html(response);
            }
        });
    });
});