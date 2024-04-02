$(document).ready(function () {
    $("#BuscarFactura").submit(function (event) {
        event.preventDefault();
        var ruc_empresa = $('#ruc_empresa').val();
        console.log(ruc_empresa);
        $.ajax({
            type: "POST",
            url: "Controladores/facturaControlador.php",
            data: {ruc_empresa: ruc_empresa},
            success: function (response) {
                console.log(response);
                $("#ObtenerResultados").html(response);
            }
        });
    });
});
