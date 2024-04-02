$(document).ready(function () {
    $("#dato_viento").submit(function (event) {
        event.preventDefault();
        
        // Crear un objeto FormData
        var formData = new FormData(this);
        
        // Obtener la imagen del input file
        var image = $("#logo_pro")[0].files[0];
        
        // Agregar la imagen al objeto FormData
        formData.append("logo_pro", image);
        
        $.ajax({
            type: "POST",
            url: "Controladores/vientocontrolador.php",
            data: formData,
            // No establezcas contentType y processData a false en este caso
            contentType: false,
            processData: false,
            success: function (response) {
                $("#ObtenerResultados").html(response);
            }
        });
    });
});
