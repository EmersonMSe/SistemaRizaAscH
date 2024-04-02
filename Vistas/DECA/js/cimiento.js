$(document).ready(function () {

    const g = 25;
    let fc = document.getElementById('fc');
    let fy = document.getElementById('fy');
    let l1 = document.getElementById('l1'); // Agregar este elemento en el HTML
    let l2 = document.getElementById('l2');

    let acero = document.getElementById('columna');
    let r = document.getElementById('re');
    let esadterr = document.getElementById('esadterr');
    let pdcimt = document.getElementById('pdcimt');
    let yprom = document.getElementById('yprom');
    let sc = document.getElementById('sc');
    let es_muro = document.getElementById('esmuro'); // Agregar este elemento en el HTML

    let CM = document.getElementById('CM'); // Agregar este elemento en el HTML
    let CV = document.getElementById('CV'); // Agregar este elemento en el HTML
    var dom = document.getElementById('main'); // Cambio de 'chart-container' a 'main'
    var myChart = echarts.init(dom, null, {
        renderer: 'canvas',
        useDirtyRect: false
    });
    var app = {};

    var option;

    function calcular() {
        //longitud de desarrollo del acero de columna
        let L1 = parseFloat(l1.value);
        let L2 = parseFloat(l2.value);
        let t = parseFloat(es_muro.value) * 100;
        //----------------------------------------------------------------
        let Ld1 = parseFloat(acero.value * 0.075 * fy.value / Math.sqrt(fc.value));
        let Ld2 = parseFloat(0.0044 * fy.value * acero.value);
        let H = Math.round(Math.max(Ld1, Ld2) + parseFloat(r.value));

        //calculo de cargas
        const calccua = 1.40 + 1.70;
        const ultCM = 1.40;
        const ultCV = 1.70;
        let cu = parseFloat(CM.value * ultCM + CV.value * ultCV);
        let on = Math.round((parseFloat(esadterr.value) * 10 - parseFloat(pdcimt.value) * parseFloat(yprom.value) - parseFloat(sc.value)) * 100) / 100;
        let Acim = Math.round((cu / 1000 / on) * 100) / 100;
        let B = Math.round(Acim * 100) / 100;
        let Bplus = B * 100 + 2;
        let H2 = parseFloat(Bplus + 5);


        var data = [
            [0, 0],
            [(0.5 * Bplus), 0],
            [(0.5 * Bplus), H2],
            [(0.5 * t), H2],
            [(0.5 * t), (L1 + H2)],
            [(0.5 * t), (L1 + H2) + L2],
            [(-0.5 * t), (L1 + H2) + L2],
            [(-0.5 * t), ((L1 + H2) + L2) - L2],
            [(-0.5 * t), ((L1 + H2) + L2 - L2) - L1],
            [(-0.5 * Bplus), ((L1 + H2) + L2 - L2) - L1],
            [(-0.5 * Bplus), 0],
            [0, 0]
        ];
        //varible general para ACEROS 1 Y 2 sobre Columna
        //acero 1
        let corA = (-0.5 * t);//x
        let corA2 = H2;//y
        let corB = 0.5 * t;//x
        let corB2 = H2;//y
        //acero 2   
        let corC = (-0.5 * t);//x
        let corC2 = (L1 + H2);//y
        let corD = 0.5 * t;//x
        let corD2 = (L1 + H2);//y

        var acero1Coords = [
            [corA + 4, ((L1 + H2) + L2)],
            [corA + 4, corB2],
            [corA + 4, (corB2 - H2 + 10)],
            [((corA + 4) - g), (corB2 - H2 + 10)]
        ];

        var acero2Coords = [
            [(corB - 4), ((L1 + H2) + L2)],
            [(corB - 4), corB2],
            [(corB - 4), (corB2 - H2 + 10)],
            [(corB - 4) + g, (corB2 - H2 + 10)]
        ];

        var option = {
            title: {
                text: 'DISEÑO DE CIMIENTO CORRIDO'
            },
            xAxis: {},
            yAxis: {},
            series: [
                {
                    name: 'Acero 1',
                    type: 'line',
                    data: acero1Coords,
                    symbolSize: 10,
                    lineStyle: {
                        color: 'red'
                    }
                },
                {
                    name: 'Acero 2',
                    type: 'line',
                    data: acero2Coords,
                    symbolSize: 10,
                    lineStyle: {
                        color: 'red'
                    }
                },
                {
                    name: 'cimiento',
                    type: 'line',
                    data: data,
                    symbolSize: 10,
                    lineStyle: {
                        color: 'blue'
                    }
                }
            ]
        };

        if (option && typeof option === "object") {
            myChart.setOption(option);
        }

    }

    l1.oninput = calcular; // Agregar este evento en el HTML
    l2.oninput = calcular;
    es_muro.oninput = calcular;
    CM.oninput = calcular;
    CV.oninput = calcular;

    // Realizar el cálculo inicial
    calcular();


    window.addEventListener('resize', myChart.resize);

    $("#cimientosControler").submit(function (event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "Controladores/cimientoControlador.php",
            data: formData,
            success: function (response) {
                console.log(response);
                $("#ObtenerResultados").html(response);
            }
        });
    });
})