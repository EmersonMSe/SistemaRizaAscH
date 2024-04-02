$(document).ready(function () {
    $("#calcTitan").submit(function (event) {
        event.preventDefault();
        var inputl = document.getElementById('inputl').value;
        var inputa = document.getElementById('inputa').value;
        var inputl1 = document.getElementById('inputl1').value;

        //seccion 1:
        var b = inputl / 2;

        var R = ((Math.pow(inputa, 2) + Math.pow(b, 2)) / (2 * inputa)).toFixed(2);

        var xs = (2 * (Math.asin(b / R))); // xs está en radianes
        var x = (xs * (180 / Math.PI)).toFixed(2); // x está en grados

        // Ahora convertimos x de grados a radianes
        var x_en_radianes = (xs * (Math.PI / 180)).toFixed(2);

        var l = (xs * R);

        //seccion 2 calcular los tubos:
        var numtubos = (l / 6);

        //seccion 3 rodado:
        var x_prima = (inputl1 / R);
        var xgra = x_prima * (180 / Math.PI)

        var b_prima = (Math.sin(x_prima / 2) * R).toFixed(2);


        var a_prima = R * (1 - Math.cos(x_prima / 2))

        var tet = (Math.PI - xs) / 2;
        var contet = tet * (180 / Math.PI);
        console.log(contet)


        var elCanvas = document.getElementById("arco");
        if (elCanvas && elCanvas.getContext) {
            var context = elCanvas.getContext("2d");
            if (context) {
                var X = elCanvas.width / 2;
                var Y = 100;
                var r = 50;
                var aPartida = (Math.PI / 180) * 220;
                var aFinal = (Math.PI / 180) * 320;
                context.strokeStyle = "orange";
                context.lineWidth = 15;
                context.arc(X, Y, r, aPartida, aFinal, false);
                context.stroke();
            }
        }


        var dom = document.getElementById('main'); // Cambio de 'chart-container' a 'main'
        var myChart = echarts.init(dom, null, {
            renderer: 'canvas',
            useDirtyRect: false
        });

        var app = {};

        var option;
        function calcular() {

            var corder1 = [
                [R * Math.cos(tet), R * Math.sin(tet)],
                [R * Math.cos(tet + x_prima), R * Math.sin(tet + x_prima)],
                [R * Math.cos(tet + (x_prima * 2)), R * Math.sin(tet + (x_prima * 2))],
                [R * Math.cos(tet + xs), R * Math.sin(tet + xs)],
            ]

            option = {
                title: {
                    text: 'DISEÑO'
                },
                xAxis: {},
                yAxis: {},
                series: [
                    {
                        name: 'pantalla',
                        type: 'line',
                        data: corder1,
                        smooth: false,
                        symbolSize: 10,
                        lineStyle: {
                            color: 'blue'
                        }
                    },
                ]
            };
            if (option && typeof option === "object") {
                myChart.setOption(option);
            }
        }
        calcular();

        inputl.oninput = calcular;
        window.addEventListener('resize', myChart.resize);

        // const doc = new window.jspdf.jsPDF();
        // const date = new Date();

        // const imgWidth = 100; // Ancho de la imagen
        // const imgHeight = 50; // Altura de la imagen
        // const pdfWidth = doc.internal.pageSize.getWidth();
        // const pdfHeight = doc.internal.pageSize.getHeight();
        // const xPos = (pdfWidth - imgWidth) / 2; // Centrar horizontalmente
        // const yPos = (pdfHeight - imgHeight) / 2; // Centrar verticalmente

        // // Variables para el diseño del encabezado y la tabla
        // const imgData = 'assets/img/logo_titan_oficial.png'; // Ruta de tu logo
        // const watermarkImg = 'assets/img/watermark.png';
        // const contactNumbers = ' - ';
        // const address1 = '';
        // const address2 = '';
        // doc.setFont("Arial Narrow", "bold");
        // doc.setFontSize(11);
        // const reportTitle = 'REQUERIMIENTO DE MATERIAL APROXIMADO ';


        // /* footer */
        // const reportFooter = 'TITAN';
        // const currentDate = new Date().toLocaleDateString();

        // // Función para dibujar el encabezado en cada página
        // const drawHeader = () => {
        //     doc.addImage(imgData, 'PNG', 10, 10, 30, 15);
        //     doc.addImage(watermarkImg, 'PNG', xPos, yPos, imgWidth, imgHeight);
        //     doc.setFontSize(10);
        //     doc.setTextColor(150, 150, 150);
        //     doc.text(contactNumbers, doc.internal.pageSize.getWidth() - 60, 15);
        //     doc.text(address1, doc.internal.pageSize.getWidth() - 60, 25);
        //     doc.text(address2, doc.internal.pageSize.getWidth() - 60, 30);
        //     doc.setFontSize(22);
        //     doc.setTextColor(19, 19, 19);
        //     doc.text(reportTitle, doc.internal.pageSize.getWidth() - 200, 42);
        // };

        // const drawBody = () => {
        //     doc.setFont("Arial Narrow", "bold");
        //     doc.setFontSize(16);
        //     doc.text('Cálculo de Concreto:', 15, 80);
        //     doc.setFont("Arial Narrow", "");
        //     doc.setFontSize(12);
        // };
        // // Función para dibujar el pie de página en cada página
        // const drawFooter = () => {
        //     const totalPages = doc.internal.getNumberOfPages();
        //     for (let i = 1; i <= totalPages; i++) {
        //         doc.setPage(i);
        //         doc.setFontSize(12);

        //         // Fondo verde al pie de página
        //         doc.setFillColor(243, 80, 5);
        //         doc.rect(0, pdfHeight - 20, pdfWidth, 20, 'F');

        //         // Texto centrado
        //         doc.setTextColor(255, 255, 255);
        //         doc.text(reportFooter + ' (' + currentDate + ')', 10, pdfHeight - 10, {
        //             align: 'left',
        //         });

        //         // Fecha y paginación a la derecha
        //         doc.text(
        //             ' Página ' + i + ' de ' + totalPages,
        //             pdfWidth - 12,
        //             pdfHeight - 10,
        //             { align: 'right' }
        //         );
        //     }
        // };
        // drawHeader();
        // drawBody();
        // drawFooter();
        // // Guardar el PDF con el nombre del trabajador
        // //const fileName = `IP_${mes_pago}_${selectedNombreP}.pdf`;
        // //doc.save(`cotizaciones.pdf`);
        // //Generar el PDF
        // const string = doc.output('datauristring');
        // // Crear un elemento <embed> para mostrar el PDF
        // const embedElement = document.createElement('embed');
        // embedElement.setAttribute('width', '100%');
        // embedElement.setAttribute('height', '100%');
        // embedElement.setAttribute('src', string);
        // // Obtener el div donde deseas mostrar el PDF
        // const divMostrarInformePago = document.getElementById('ObtenerResultados');
        // // Limpiar cualquier contenido previo dentro del div
        // divMostrarInformePago.innerHTML = '';
        // // Agregar el elemento <embed> al div
        // divMostrarInformePago.appendChild(embedElement);


        //Resultados HTML
        var resultadosDiv = document.getElementById("ObtenerResultados");
        resultadosDiv.innerHTML = `
            <h1 class="text-center"><strong>HOJA DE CALCULO DE --</strong></h1>
            <p>Datos Generales</p>

            <h5>Resultados:</h5>
            Resultado de b: ${b}<br>
            Resultado de R: ${R}<br>
            Resultado de X en grados: ${x}<br>
            Resultado de l: ${l}<br>
            Número de tubos: ${numtubos}<br>
            Resultado de x prima: ${xgra}<br>
            Resultado de B prima: ${b_prima}<br>}
            Resultado de fecha: ${a_prima}<br>
        `;

    });
});
