$(document).ready(function () {
    //////////////////////////////////////////////
    //               Checkbox data              //
    /////////////////////////////////////////////
    var dentellon = document.getElementById('dentellon');
    var b1Container = document.getElementById('b1Container');
    var hdContainer = document.getElementById('hdContainer');
    dentellon.addEventListener('change', function () {
        // Verificar si el checkbox está marcado
        if (this.checked) {
            // Mostrar el contenedor cuando el checkbox está activado
            b1Container.style.display = 'block';
            hdContainer.style.display = 'block';
        } else {
            // Ocultar el contenedor cuando el checkbox está desactivado
            b1Container.style.display = 'none';
            hdContainer.style.display = 'none';
        }
    });

    //////////////////////////////////////////////
    //               ojitos data               //
    /////////////////////////////////////////////

    // Obtener el botón y el contenedor
    const toggleButton = document.getElementById('toggleButton');
    const contenedor_dcc = document.getElementById('contenedor_dcc');
    //obtener el boton de calculos de cargas
    const buttoneyes = document.getElementById('calccargars');
    const contenedorCC = document.getElementById('contenedor_cc');

    // Agregar un evento de clic al botón
    toggleButton.addEventListener('click', function () {
        // Alternar la visibilidad del contenedor
        contenedor_dcc.style.display = contenedor_dcc.style.display === 'block' ? 'none' : 'block';

        // Cambiar el ícono del botón
        const icon = toggleButton.querySelector('i');
        if (contenedor_dcc.style.display === 'block') {
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        } else {
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        }
    });

    // agregar evento de clic al botón calcular cargas
    // buttoneyes.addEventListener('click', function () {
    //     // Alternar la visibilidad del contenedor
    //     contenedorCC.style.display = contenedorCC.style.display === 'block' ? 'none' : 'block';

    //     // Cambiar el ícono del botón
    //     const icon = buttoneyes.querySelector('i');
    //     if (contenedorCC.style.display === 'block') {
    //         icon.classList.remove('fa-eye-slash');
    //         icon.classList.add('fa-eye');
    //     } else {
    //         icon.classList.remove('fa-eye');
    //         icon.classList.add('fa-eye-slash');
    //     }
    // });

    //////////////////////////////////////////////
    //               Graficos Echarts          //
    /////////////////////////////////////////////
    let inputdf = parseFloat(document.getElementById('df').value);
    let inputh = parseFloat(document.getElementById('H').value);
    let inputanguloIn = parseFloat(document.getElementById('angterr').value);
    //condicionales


    // Definir una función para crear el gráfico inicial
    function crearGrafico() {

        var dom = document.getElementById('main'); // Cambio de 'chart-container' a 'main'
        var myChart = echarts.init(dom, null, {
            renderer: 'canvas',
            useDirtyRect: false
        });

        var app = {};

        var option;

        var pantallaM = [
            [1.166666667, 1.35],
            [1.166666667, 4.50],
            [0.966666667, 4.50],
            [0.966666667, 1.35],
        ];

        var vastago = [
            [0.816666667, 1.35],
            [0.966666667, 1.35],
            [0.966666667, 4.50],
            [0.816666667, 1.35]
        ];

        var suelo = [
            [0, 2],
            [0.84452381, 2],
            [1.17, 4.50],
            [2.45, 4.93]
        ];

        var cimentacion = [
            [0, 1],
            [2.45, 1],
            [2.45, 1.35],
            [0, 1.35],
            [0, 1]
        ];

        option = {
            title: {
                text: 'DISEÑO DE MUROS DE CONTENCION'
            },
            xAxis: {},
            yAxis: {},
            series: [
                {
                    name: 'pantallaM',
                    type: 'line',
                    data: pantallaM,
                    symbolSize: 10,
                    lineStyle: {
                        color: 'yellow'
                    }
                },
                {
                    name: 'pantallaM',
                    type: 'line',
                    data: pantallaM,
                    symbolSize: 10,
                    lineStyle: {
                        color: 'yellow'
                    }
                },
                {
                    name: 'vastago',
                    type: 'line',
                    data: vastago,
                    symbolSize: 10,
                    lineStyle: {
                        color: 'red'
                    }
                },
                {
                    name: 'piso',
                    type: 'line',
                    data: suelo,
                    symbolSize: 10,
                    lineStyle: {
                        color: 'green'
                    }
                },
                {
                    name: 'cimentacion',
                    type: 'line',
                    data: cimentacion,
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

        return myChart;
    }

    // Función para actualizar los datos del gráfico
    function actualizarDatosGrafico(myChart, b1, hd) {
        var checkbox = document.getElementById('dentellon');
        var isChecked = checkbox.checked;

        var dentellones = isChecked ? [
            [0.82, 0],
            [1.17, 0],
            [1.17, 1],
            [0.82, 1],
            [0.82, 0],
        ] : [];

        myChart.setOption({
            series: [
                {
                    name: 'dentellon',
                    type: 'line',
                    data: dentellones,
                    symbolSize: 10,
                    lineStyle: {
                        color: 'brown'
                    }
                }
            ]
        });
    }

    function inicializar() {
        var myChart = crearGrafico();

        var inputB1 = document.getElementById('b1');
        var inputHd = document.getElementById('hd');
        var checkbox = document.getElementById('dentellon');


        function actualizar() {
            var b1 = parseFloat(inputB1.value);
            var hd = parseFloat(inputHd.value);
            actualizarDatosGrafico(myChart, b1, hd);
        }

        checkbox.addEventListener('change', actualizar);

        actualizar();
    }

    inicializar();

    window.addEventListener('resize', function () {
        myChart.resize();
    });


    // h.oninput = inicializar; // Agregar este evento en el HTML
    // l2.oninput = calcular;
    // es_muro.oninput = calcular;
    // CM.oninput = calcular;
    // CV.oninput = calcular;

    // Realizar el cálculo inicial
    //calcular();
});