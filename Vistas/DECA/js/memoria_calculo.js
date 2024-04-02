$(document).ready(function () {
    const form = document.getElementById('data_memoria_calculo');
    if (form) {
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            // Obtener el valor del input dataCE
            const dataCEValue = document.getElementById('dataCE').value;
            const dataCViva = document.getElementById('agregarCV').value;
            console.log(dataCViva);
            // Obtener los datos del formulario
            const formData = new FormData(form);

            // Agregar el valor de dataCE a formData
            formData.append('dataCE', dataCEValue);
            formData.append('dataCViva', dataCViva);
            // Enviar los datos al servidor
            fetch('Controladores/MemoriaCalcControlador.php', {
                method: 'POST',
                body: formData
            })
                .then(response => {
                    // Verificar si la respuesta es un PDF
                    const contentType = response.headers.get('content-type');
                    if (contentType && contentType.indexOf('application/pdf') !== -1) {
                        // Devolver el contenido del PDF
                        return response.blob();
                    } else {
                        // Si la respuesta no es un PDF, lanzar un error
                        throw new Error('La respuesta no es un PDF.');
                    }
                })
                .then(blob => {
                    const url = window.URL.createObjectURL(blob);
                    const embed = document.createElement('embed');
                    embed.src = url;
                    embed.type = 'application/pdf';
                    embed.style.width = '100%';
                    embed.style.height = '600px';

                    // Limpiar el contenido anterior del contenedor
                    const resultadosContainer = document.getElementById('ObtenerResultadosMC');
                    resultadosContainer.innerHTML = '';

                    // Agregar el elemento <embed> al contenedor
                    resultadosContainer.appendChild(embed);

                    // Limpiar la URL creada
                    window.URL.revokeObjectURL(url);
                })
                .catch(error => {
                    console.error('Error en la solicitud POST:', error);
                });
        });
    } else {
        console.error('El formulario no se encontró en el DOM.');
    }
});
