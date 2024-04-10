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
    buttoneyes.addEventListener('click', function () {
        // Alternar la visibilidad del contenedor
        contenedorCC.style.display = contenedorCC.style.display === 'block' ? 'none' : 'block';

        // Cambiar el ícono del botón
        const icon = buttoneyes.querySelector('i');
        if (contenedorCC.style.display === 'block') {
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        } else {
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        }
    });

    //////////////////////////////////////////////
    //               Graficos Echarts          //
    /////////////////////////////////////////////
    let inputdf = parseFloat(document.getElementById('df').value);
    let inputh = parseFloat(document.getElementById('H').value);
    let inputanguloIn = parseFloat(document.getElementById('angterr').value);

    //condicionales
    let b;
    // Definir una función para crear el gráfico inicial
    function crearGrafico(b1, hd) {
        inputdf = parseFloat(document.getElementById('df').value);
        inputh = parseFloat(document.getElementById('H').value);
        inputanguloIn = parseFloat(document.getElementById('angterr').value);

        var isChecked = document.getElementById('dentellon').checked;

        // Si el checkbox está desactivado, establece b1 y hd en 0
        if (!isChecked) {
            b1 = 0;
            hd = 0;
        }

        var dom = document.getElementById('main'); // Cambio de 'chart-container' a 'main'
        var myChart = echarts.init(dom, null, {
            renderer: 'canvas',
            useDirtyRect: false
        });

        var app = {};

        var option;

        var a = 0.2;
        b = inputh / 10;//base de pantalla
        var c = (inputh * 0.7);//base de la grafica
        var d = (c / 3);//cerca a df
        var e = (b - a);//altura

        //pantalla: PUNTOS
        var point1 = d - a + b;

        var point2 = d + b;

        var point3 = b + hd;

        var point4 = inputh + hd;

        var anguloVastago = Math.atan(inputh / e) * 180 / Math.PI;

        var point5 = d + (inputdf - b) / Math.tan(anguloVastago * Math.PI / 180);

        var point6 = d + b;

        var point7 = inputdf + hd;

        var point8 = hd + inputh + Math.tan(inputanguloIn * Math.PI / 180) * c;

        var pantallaM = [
            [point2, point3],
            [point2, point4],
            [point1, point4],
            [point1, point3],
        ];

        var vastago = [
            [d, point3],
            [point1, point3],
            [point1, point4],
            [d, point3]
        ];


        var suelo = [
            [0, point7],
            [point5, point7],
            [point1, point4],
            [c, point8]
        ];

        var cimentacion = [
            [0, hd],
            [c, hd],
            [c, point3],
            [0, point3],
            [0, hd]
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

    document.getElementById('df').addEventListener('input', crearGrafico);
    document.getElementById('H').addEventListener('input', crearGrafico);
    document.getElementById('angterr').addEventListener('input', crearGrafico);

    // Crear el gráfico inicialmente con los valores de entrada actuales
    crearGrafico();

    // Función para actualizar los datos del gráfico
    function actualizarDatosGrafico(myChart, b1, hd) {
        var checkbox = document.getElementById('dentellon');
        var isChecked = checkbox.checked;
        // Si el checkbox está desactivado, establece b1 y hd en 0
        if (!isChecked) {
            b1 = 0;
            hd = 0;
        }
        var point9 = b1 + b;

        var dentellones = isChecked ? [
            [b1, 0],
            [point9, 0],
            [point9, hd],
            [b1, hd],
            [b1, 0],
        ] : [];

        myChart.setOption({
            series: [{
                name: 'dentellon', // Asegúrate de que el nombre coincida con la serie en la configuración del gráfico
                type: 'line',
                data: dentellones,
                symbolSize: 10,
                lineStyle: {
                    color: 'brown' // Asegúrate de que el color sea válido
                }
            }]
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
            crearGrafico(b1, hd)
        }

        checkbox.addEventListener('change', actualizar);
        inputB1.addEventListener('input', actualizar);
        inputHd.addEventListener('input', actualizar);
        checkbox.addEventListener('change', actualizar);

        actualizar();
    }

    inicializar();

    window.addEventListener('resize', function () {
        myChart.resize();
    });

    $('#cimientosControler').submit(e => {
        e.preventDefault();
        //Valores de precion de suelo
        let considerar = document.getElementById('considerar').value;
        let inpute = parseFloat(document.getElementById('e').value);
        let inputgc = parseFloat(document.getElementById('gc').value);
        let inputgs = parseFloat(document.getElementById('gs').value);
        let inputtet = parseFloat(document.getElementById('tet').value);
        let inputz = parseFloat(document.getElementById('z').value);
        let inputd = parseFloat(document.getElementById('d').value);
        let inputSC = parseFloat(document.getElementById('SC').value);
        let inpuths = parseFloat(document.getElementById('hs').value);
        let inputka = parseFloat(document.getElementById('ka').value);
        let inputKp = parseFloat(document.getElementById('Kp').value);

        // Calcular y mostrar la primera tabla
        let tablaCalculadaHTML = calcularPrimerCuadro(considerar, inputgs, inputtet, inputd, inpuths, inputka);
        let tbody1 = document.getElementById('primerTabla');
        tbody1.innerHTML = tablaCalculadaHTML;

    });

    capturarCambios();
    document.getElementById('considerar').addEventListener('input', capturarCambios);
    document.getElementById('b1graf').addEventListener('input', capturarCambios);
    document.getElementById('hzgraf').addEventListener('input', capturarCambios);
    document.getElementById('hprgraf').addEventListener('input', capturarCambios);
    document.getElementById('egraf').addEventListener('input', capturarCambios);
    document.getElementById('epgraf').addEventListener('input', capturarCambios);
    document.getElementById('b2graf').addEventListener('input', capturarCambios);
    document.getElementById('zonaok').addEventListener('input', capturarCambios);
    document.getElementById('kvran').addEventListener('input', capturarCambios);

    function capturarCambios() {
        // Capturar los valores actualizados de los campos de entrada
        let considerar = document.getElementById('considerar').value;
        let inpute = parseFloat(document.getElementById('e').value);
        let inputgc = parseFloat(document.getElementById('gc').value);
        let inputgs = parseFloat(document.getElementById('gs').value);
        let inputtet = parseFloat(document.getElementById('tet').value);
        let inputz = parseFloat(document.getElementById('z').value);
        let inputd = parseFloat(document.getElementById('d').value);
        let inputSC = parseFloat(document.getElementById('SC').value);
        let inpuths = parseFloat(document.getElementById('hs').value);
        let inputka = parseFloat(document.getElementById('ka').value);
        let inputKp = parseFloat(document.getElementById('Kp').value);
        //=========================================================================
        const b1graf = parseFloat(document.getElementById('b1graf').value);
        const hzgraf = parseFloat(document.getElementById('hzgraf').value);
        const hprgraf = parseFloat(document.getElementById('hprgraf').value);
        const egraf = parseFloat(document.getElementById('egraf').value);
        const epgraf = parseFloat(document.getElementById('epgraf').value);
        const b2graf = parseFloat(document.getElementById('b2graf').value);
        const inpzonaok = parseFloat(document.getElementById('zonaok').value);
        const kvran = parseFloat(document.getElementById('kvran').value);

        // Llamar a la función verificacionsinefectoS con los valores capturados actualizados
        consinsismo(considerar, inpzonaok, kvran, inputka, inpute, inpuths, inputd, inputtet, inputgs, inputgc, b1graf, b2graf, hzgraf, hprgraf, egraf, epgraf);
    }
    function consinsismo(considerar, inpzonaok, kvran, inputka, inpute, inpuths, inputd, inputtet, inputgs, inputgc, b1graf, b2graf, hzgraf, hprgraf, egraf, epgraf) {
        // Aquí realiza los cálculos necesarios con los parámetros recibidos y genera la tabla HTML
        let datos = [
            ["si", 4.3],
            ["no", 3.5]
        ];
        // Índice de la columna que quieres obtener (2 en este caso)
        let indiceColumna = 2;
        // Función para buscar el valor correspondiente a "SI" o "NO" en los datos
        function buscarV(considerar, datos, indiceColumna) {
            // Recorre los datos para encontrar el valor buscado
            for (let i = 0; i < datos.length; i++) {
                // Compara el primer elemento de cada fila con el valor buscado
                if (datos[i][0] === considerar) {
                    // Si se encuentra el valor, devuelve el valor correspondiente en la columna indicada
                    return datos[i][indiceColumna - 1];
                }
            }
            // Si el valor no se encuentra, devuelve null o algún otro valor predeterminado
            return null;
        }
        // Llamada a la función buscarV con el valor de considerar
        let Hsuel = buscarV(considerar, datos, indiceColumna);

        var radteta = inputtet * Math.PI / 180;
        var radd = inputd * Math.PI / 180;

        var smaxsuel = Math.round(inputgs * inputka * Hsuel);

        var psuel = Hsuel * smaxsuel / 2

        var pbsuel = (psuel * Math.sin(radd)).toFixed(2);

        var pisuel = (psuel * Math.cos(radd)).toFixed(2);

        //S/C
        var smaxSC = (inputgs * inputka * inpuths).toFixed(2);

        var pSC = Hsuel * smaxSC;

        var pbSC = parseFloat((pSC * Math.sin(radd)).toFixed(2));

        var piSC = (pSC * (Math.cos(radd))).toFixed(2);

        //total 
        var totalH = (Hsuel + inpuths);

        var totalsmax = parseFloat(parseFloat(smaxsuel) + parseFloat(smaxSC)).toFixed(2);

        var totalp = (psuel + pSC).toFixed(2);

        var totalpv = (pbsuel + pbSC).toString(2);

        var totalph = parseFloat(pisuel + piSC).toFixed(2);

        // Modificar el HTML generado para que coincida con la estructura deseada
        let tablaCalculadaHTML = `
            <tr>
                <th scope="col">H</th>
                <td>${Hsuel}</td>
                <td>${inpuths}</td>
                <td>${totalH}</td>
            </tr>
            <tr>
                <th scope="col">sMAX</th>
                <td>${smaxsuel}</td>
                <td>${smaxSC}</td>
                <td>${totalsmax}</td>  
            </tr>
            <tr>
                <th scope="col">P</th>
                <td>${psuel}</td>
                <td>${pSC}</td>
                <td>${totalp}</td>
            </tr>
            <tr>
                <th scope="col">Pv</th>
                <td>${pbsuel}</td>
                <td>${pbSC}</td>
                <td>${totalpv}</td>           
            </tr>
            <tr>
                <th scope="col">Ph</th>
                <td>${pisuel}</td>
                <td>${piSC}</td>
                <td>${totalph}</td>
            </tr>`;

        let tbody1 = document.getElementById('primerTabla');
        tbody1.innerHTML = tablaCalculadaHTML;
        //=======================================
        var altTras = egraf + epgraf;

        var basem = b1graf + altTras + b2graf;

        var radteta = inputtet * Math.PI / 180;
        var radd = inputd * Math.PI / 180;

        var comAr = (b1graf * b1graf * 0.5 * Math.tan(radd)).toFixed(2);
        var comAr2 = (b1graf * inputh).toFixed(2);
        var comAr3 = (inpuths * 1 / Math.cos(radd)).toFixed(2);
        var comAr4 = (basem * hzgraf).toFixed(2);
        var comAr5 = (epgraf * inputh * 0.5).toFixed(2);
        var comAr6 = (inpute * inputh).toFixed(2);

        //AREA
        var compes1 = (comAr * inputgs).toFixed(2);
        var compes2 = (comAr2 * inputgs).toFixed(2);
        var compes3 = (comAr3 * inputgs).toFixed(2);
        var compes4 = (comAr4 * inputgc).toFixed(2);
        var compes5 = (comAr5 * inputgc).toFixed(2);
        var compes6 = (comAr6 * inputgc).toFixed(2);

        //BRAZO
        var combraz1 = (2 * b1graf / 3 + b2graf + altTras).toFixed(2);
        var combraz2 = (b1graf / 2 + altTras + b2graf).toFixed(2);
        var combraz3 = combraz2;
        var combraz4 = (basem / 2).toFixed(2);
        var combraz5 = (2 * epgraf / 3 + b2graf).toFixed(2);
        var combraz6 = (inpute / 2 + epgraf + b2graf).toFixed(2);

        //MOMENTO
        var commonet1 = (compes1 * combraz1).toFixed(2);
        var commonet2 = (compes2 * combraz2).toFixed(2);
        var commonet3 = (compes3 * combraz3).toFixed(2);
        var commonet4 = (compes4 * combraz4).toFixed(2);
        var commonet5 = (compes5 * combraz5).toFixed(2);
        var commonet6 = (compes6 * combraz6).toFixed(2);

        var totalpeso = (parseFloat(compes1) + parseFloat(compes2) + parseFloat(compes3) + parseFloat(compes4) + parseFloat(compes5) + parseFloat(compes6)).toFixed(2);
        var totalMomneto = (parseFloat(commonet1) + parseFloat(commonet2) + parseFloat(commonet3) + parseFloat(commonet4) + parseFloat(commonet5) + parseFloat(commonet6)).toFixed(2);

        var AreaConcreto = parseFloat(comAr4) + parseFloat(comAr5) + parseFloat(comAr6);
        var pesoConcreto = parseFloat(compes4) + parseFloat(compes5) + parseFloat(compes6);

        //-----primer columna
        var mvsuelo = (totalpv * (basem - b1graf)).toFixed(2);

        var mvsuelo = totalpv * (basem - b1graf);
        var totalsuelo = parseFloat(totalMomneto) + parseFloat(mvsuelo);
        //----segunda columna
        var mhsuelo = (parseFloat(pisuel) * (parseFloat(inputh) / 3)).toFixed(2);
        var mhsc = piSC * (inputh / 2);
        var mhtotal = mhsuelo + mhsc;

        //----- fs
        var fs = (totalsuelo / mhtotal).toFixed(2);

        var verificacionVolteo = "";
        if (fs < 2) {
            var verificacionVolteo = "NO";
        } else {
            var verificacionVolteo = "OK";
        }

        let verfsinefec = `
            <tr class="text-center">
                <th scope="col">1</th>
                <td>${comAr}</td>
                <td>${compes1}</td>
                <td>${combraz1}</td>
                <td>${commonet1}</td>
                <td>SUELO TALUD</td>
            </tr>
            <tr class="text-center">
                <th scope="col">2</th>
                <td>${comAr2}</td>
                <td>${compes2}</td>
                <td>${combraz2}</td>  
                <td>${commonet2}</td>
                <td>SUELO</td>  
            </tr>
            <tr class="text-center">
                <th scope="col">3</th>
                <td>${comAr3}</td>
                <td>${compes3}</td>
                <td>${combraz3}</td>
                <td>${commonet3}</td>
                <td>SUELO S/C</td>
            </tr>
            <tr class="text-center">
                <th scope="col">4</th>
                <td>${comAr4}</td>
                <td>${compes4}</td>
                <td>${combraz4}</td>      
                <td>${commonet4}</td>
                <td>BASE</td>
            </tr>
            <tr class="text-center">
                <th scope="col">5</th>
                <td>${comAr5}</td>
                <td>${compes5}</td>
                <td>${combraz5}</td>
                <td>${commonet5}</td>
                <td>CUÑA</td>
            </tr>
            <tr class="text-center">
                <th scope="col">6</th>
                <td>${comAr6}</td>
                <td>${compes6}</td>
                <td>${combraz6}</td>
                <td>${commonet6}</td>
                <td>PANTALLA</td>
            </tr>
            <tr class="text-center">
                <th scope="col"></th>
                <td class="text-right">N=</td>
                <td>${totalpeso}</td>
                <td class="text-right">Mr=</td>
                <td>${totalMomneto}</td>
            </tr>
            <tr class="text-center">
                <th scope="col" colspan="2">AREA DEL CONCRETO</th>
                <td>${AreaConcreto} m<sup>2</sup></td>
                <td class="text-right"></td>
                <td>${pesoConcreto}</td>
            </tr>
        `;
        let verfsinvolteo = `
            <tr>
                <th scope="col" colspan="6"></th>
            </tr>
            <tr>
                <th scope="col" colspan="6"> 3.2 Verificacion por volteo sin sismo</th>
            </tr>
            <tr>
                <th scope="col">Mr=</th>
                <td>${totalMomneto}</td>
                <th scope="col">Tn-m</th>
                <th scope="col">MhSUELO=</th>
                <td>${mhsuelo}</td>
                <th scope="col">Tn-m</th>  
            </tr>
            <tr>
                <th scope="col">Mv=</th>
                <td>${mvsuelo}</td>
                <th scope="col">Tn-m</th>
                <th scope="col">MhS/C=</th>
                <td>${mhsc}</td>
                <th scope="col">Tn-m</th>  
            </tr>
            <tr>
                <th scope="col">mv Total=</th>
                <td>${totalsuelo}</td>
                <th scope="col">Tn-m</th>
                <th scope="col">MhTOTAL=</th>
                <td>${mhtotal}</td>
                <th scope="col">Tn-m</th>  
            </tr>
            <tr>
                <th scope="col">F.S.=</th>
                <th scope="col">${fs}</th>
                <th scope="col">${verificacionVolteo}</th>
            </tr>
        `;
        var u = (Math.tan(radteta)).toFixed(2);
        var rv = (parseFloat(totalpeso) + parseFloat(totalpv)).toFixed(2);
        var fr = (parseFloat(rv) * parseFloat(u)).toFixed(2);
        var fsdeslizamiento = (fr / totalph).toFixed(2);

        var verificacionDeslizamiento = "";
        if (fsdeslizamiento < 1.5) {
            var verificacionDeslizamiento = "NO";
        } else {
            var verificacionDeslizamiento = "OK";
        }

        let verfdesliza = `
        <tr>
            <th scope="col" colspan="6"></th>
        </tr>
        <tr>
            <th scope="col" colspan="6"> 3.3 Verificacion por deslizamiento sin sismo</th>
        </tr>
        <tr>
            <th scope="col">N=</th>
            <td>${totalpeso}</td>
            <th scope="col">Tn</th>
            <th scope="col">µ=</th>
            <td>${u}</td>
            <th scope="col"></th>  
        </tr>
        <tr>
            <th scope="col">PVtotal=</th>
            <td>${totalpv}</td>
            <th scope="col">Tn</th>
            <th scope="col">Fr=</th>
            <td>${fr}</td>
            <th scope="col">Tn</th>  
        </tr>
        <tr>
            <th scope="col">Rv=</th>
            <td>${rv}</td>
            <th scope="col">Tn</th>
            <th scope="col">ph Total=</th>
            <td>${totalph}</td>
            <th scope="col">ton</th>  
        </tr>
        <tr>
            <th scope="col">F.S.=</th>
            <th scope="col">${fsdeslizamiento}</th>
            <th scope="col">${verificacionDeslizamiento}</th>
        </tr>
        `;
        //==============================================================================//
        //===========================VERIFICACION CON SISMO=============================//

        let verfconefec = `
            <tr>
                <th scope="col" colspan="6"></th>
            </tr>
            <tr>
                <th scope="col" colspan="6"> 3.4 Verificacion con efectos sismico</th>
            </tr>
            <tr class="text-center">
                <th scope="col">1</th>
                <td>${comAr}</td>
                <td>${compes1}</td>
                <td>${combraz1}</td>
                <td>${commonet1}</td>
                <td>SUELO TALUD</td>
            </tr>
            <tr class="text-center">
                <th scope="col">2</th>
                <td>${comAr2}</td>
                <td>${compes2}</td>
                <td>${combraz2}</td>  
                <td>${commonet2}</td>
                <td>SUELO</td>  
            </tr>
            <tr class="text-center">
                <th scope="col">3</th>
                <td>${comAr3}</td>
                <td>${compes3}</td>
                <td>${combraz3}</td>
                <td>${commonet3}</td>
                <td>SUELO S/C</td>
            </tr>
            <tr class="text-center">
                <th scope="col">4</th>
                <td>${comAr4}</td>
                <td>${compes4}</td>
                <td>${combraz4}</td>      
                <td>${commonet4}</td>
                <td>BASE</td>
            </tr>
            <tr class="text-center">
                <th scope="col">5</th>
                <td>${comAr5}</td>
                <td>${compes5}</td>
                <td>${combraz5}</td>
                <td>${commonet5}</td>
                <td>CUÑA</td>
            </tr>
            <tr class="text-center">
                <th scope="col">6</th>
                <td>${comAr6}</td>
                <td>${compes6}</td>
                <td>${combraz6}</td>
                <td>${commonet6}</td>
                <td>PANTALLA</td>
            </tr>
            <tr class="text-center">
                <th scope="col"></th>
                <td class="text-right">N=</td>
                <td>${totalpeso}</td>
                <td class="text-right">Mr=</td>
                <td>${totalMomneto}</td>
            </tr>
        `;
        //==================MONONOBE-OKABE=======================================

        switch (inpzonaok) {
            case 0.4:
                khmonok = inpzonaok / 2;
                break;
            case 0.3:
                khmonok = inpzonaok / 2;
                break;
            case 0.15:
                khmonok = inpzonaok / 2;
                break;
            default:
                khmonok = 0;
                break;
        }
        var teta = Math.atan(khmonok / (1 - kvran))
        var grados = Math.round(teta * (180 / Math.PI))

        //=======================================================================
        var A = Math.sin(radteta + radd);
        var B = Math.sin(radteta - teta - 0);
        var C = Math.cos(0 + radd + teta);
        var D = Math.cos(0 + 0);

        var E = Math.cos(radteta - teta - 0);

        var F = Math.cos(teta) * Math.cos(0) * Math.cos(0) * Math.cos(0 + radd + teta);

        var totalLet = Math.pow((A * B / (C * D)), 0.5)
        var Y = Math.pow((1 + totalLet), 2)
        var kae = E * E / (Y * F);
        var eae = 0.5 * inputgs * (1 - kvran) * kae * inputh * inputh;
        var ea = 0.5 * inputgs * inputka * inputh * inputh;
        var deae = eae - ea;
        var hposicion = inputh * 0.6;
        var Mae = (deae * hposicion).toFixed(2);
        var mhtotalcon = (parseFloat(mhtotal) + parseFloat(Mae)).toFixed(2);
        var fscon = (totalsuelo / mhtotalcon).toFixed(2);

        var verfconVolteo = "";
        if (fscon < 1.2) {
            var verfconVolteo = "NO";
        } else {
            var verfconVolteo = "OK";
        }

        let verfsinvolteoconsismo = `
            <tr>
                <th scope="col" colspan="6"></th>
            </tr>
            <tr>
                <th scope="col" colspan="6"> 3.5 Verificacion por volteo sin sismo</th>
            </tr>
            <tr>
                <th scope="col">Mr=</th>
                <td>${totalMomneto}</td>
                <th scope="col">Tn-m</th>
                <th scope="col">MhSUELO=</th>
                <td>${mhsuelo}</td>
                <th scope="col">Tn-m</th>  
            </tr>
            <tr>
                <th scope="col">Mv=</th>
                <td>${mvsuelo}</td>
                <th scope="col">Tn-m</th>
                <th scope="col">MhS/C=</th>
                <td>${mhsc}</td>
                <th scope="col">Tn-m</th>  
            </tr>
            <tr>
                <th scope="col">mv Total=</th>
                <td>${totalsuelo}</td>
                <th scope="col">Tn-m</th>
                <th scope="col">MqTOTAL=</th>
                <td>${Mae}</td>
                <th scope="col">Tn-m</th>  
            </tr>
            <tr>
                <th scope="col"></th>
                <td></td>
                <th scope="col"></th>
                <th scope="col">MhTOTAL=</th>
                <td>${mhtotalcon}</td>
                <th scope="col">Tn-m</th>  
            </tr>
            <tr>
                <th scope="col">F.S.=</th>
                <th scope="col">${fscon}</th>
                <th scope="col">${verfconVolteo}</th>
            </tr>
        `;

        //=============DESLIZAMIENTO CON SISMO===================
        var phtotalcon = (parseFloat(deae) + parseFloat(totalph)).toFixed(2);

        var fsdeslizamientocon = (parseFloat(fr) / parseFloat(phtotalcon)).toFixed(2);

        var verfcondeslizamiento = "";
        if (fsdeslizamientocon < 1.2) {
            var verfcondeslizamiento = "NO";
        } else {
            var verfcondeslizamiento = "OK";
        }

        let verfcondesliza = `
            <tr>
                <th scope="col" colspan="6"></th>
            </tr>
            <tr>
                <th scope="col" colspan="6"> 3.6 Verificacion por deslizamiento sin sismo</th>
            </tr>
            <tr>
                <th scope="col">N=</th>
                <td>${totalpeso}</td>
                <th scope="col">Tn</th>
                <th scope="col">µ=</th>
                <td>${u}</td>
                <th scope="col"></th>  
            </tr>
            <tr>
                <th scope="col">PVtotal=</th>
                <td>${totalpv}</td>
                <th scope="col">Tn</th>
                <th scope="col">Fr=</th>
                <td>${fr}</td>
                <th scope="col">Tn</th>  
            </tr>
            <tr>
                <th scope="col">Rv=</th>
                <td>${rv}</td>
                <th scope="col">Tn</th>
                <th scope="col">Pq=</th>
                <td>${(deae).toFixed(2)}</td>
                <th scope="col">ton</th>  
            </tr>
            <tr>
                <th scope="col"></th>
                <td></td>
                <th scope="col"></th>
                <th scope="col">Ph total</th>
                <td>${phtotalcon}</td>
                <th scope="col">ton</th>  
            </tr>
            <tr>
                <th scope="col">F.S.=</th>
                <th scope="col">${fsdeslizamientocon}</th>
                <th scope="col">${verfcondeslizamiento}</th>
            </tr>
        `;

        //================================KEY=========================================//
        //============================CONDICIONALES==================================//
        let keyDentello = ''; // Define la variable fuera del switch

        switch (considerar) {
            case "si":
                let selectOptions = `
                    <option selected disabled>SELECIONE</option>
                    <option value="centro">EN EL CENTRO</option>
                    <option value="exterior">EXTREMO INTERIOR</option>
                `;

                // No uses "let" aquí, solo actualiza la variable existente
                keyDentello = `
                    <tr>
                        <th scope="col" colspan="6"></th>
                    </tr>
                    <tr>
                        <th scope="col" colspan="6">4.0- KEY sin sismo</th>
                    </tr>
                    <tr>
                        <th scope="col">UBICACION</th>
                        <th scope="col" colspan="3">
                            <input type="text" name="ubicacion" id="ubicacion" value="0.8">
                        </th>
                        <th scope="col">
                           Valor nuevo
                        </th>
                        <th scope="col">
                            <input type="text" name="dentelloncorr" id="dentelloncorr" value="0.8">
                        </th>
                    </tr>
                    <tr id="keycon"></tr>
                `;
                break;

            default:
                // Generar el contenido para keyDentello cuando la condición es "no"
                keyDentello = `
                    <tr>
                        <th scope="col" colspan="6"></th>
                    </tr>
                    <tr>
                        <th scope="col" colspan="6"> Ha seleccionado la variable no del Dentellon</th>
                    </tr>
                `;
                break;
        }

        let tablaVerificacionSinSismoHTML = verfsinefec + verfsinvolteo + verfdesliza + verfconefec + verfsinvolteoconsismo + verfcondesliza + keyDentello;
        let tbody2 = document.getElementById('segundaTabla');
        tbody2.innerHTML = tablaVerificacionSinSismoHTML;
        // Definir keyconTr fuera de la función calculate o asegurarse de que sea accesible

        document.getElementById('ubicacion').addEventListener('input', calculate);
        document.getElementById('dentelloncorr').addEventListener('input', calculate);

        function calculate() {
            let ubicacion = parseFloat(document.getElementById('ubicacion').value);
            let dentelloncorr = parseFloat(document.getElementById('dentelloncorr').value);
            let keyconTr = document.getElementById('keycon');

            var Area = (altTras * dentelloncorr).toFixed(2);
            var peso = (Area * inputgc).toFixed(2);

            var brazcent = altTras / 2 + 0;
            var brazextre = basem - altTras + altTras / 2;
            var momecent = brazcent * peso;
            var momeextre = brazextre * peso;
            let brazo = 0;
            let momento = 0;

            var mvprtotal = ubicacion + totalsuelo;
            var fskey = (mvprtotal / mhtotal).toFixed(2);
            let verfkey = (fskey < 2) ? "NOT" : "OK";

            // Obtener la fila existente si la hay
            let existingRow = document.querySelector('#keycon + tr');

            if (existingRow) {
                // Actualizar solo el valor del área
                existingRow.querySelector('#areaValue').innerText = Area;
                existingRow.querySelector('#pesoValue').innerText = peso;
                existingRow.querySelector('#braValue').innerText = ubicacion;
                existingRow.querySelector('#rvValue').innerText = ubicacion;
                existingRow.querySelector('#momentoValue').innerText = ubicacion;
                existingRow.querySelector('#frValue').innerText = ubicacion;
                existingRow.querySelector('#mvprValue').innerText = mvprtotal;
                existingRow.querySelector('#fskeyValue').innerText = fskey;
                existingRow.querySelector('#verkeyValue').innerText = verfkey;
            } else {
                // Insertar la nueva fila debajo del elemento keycon
                keyconTr.insertAdjacentHTML('afterend', `
                    <tr>
                        <th scope="col">Area</th>
                        <td id="areaValue">${Area}</td>
                        <th scope="col">m<sup>2</sup></th>
                    </tr>
                    <tr>
                        <th scope="col">Peso</th>
                        <td id="pesoValue">${peso}</td>
                        <th scope="col">Tn</th>
                    </tr>
                    <tr>
                        <th scope="col" colspan="3" class="text-center">Volteo</th>
                        <th scope="col" colspan="3" class="text-center">DESLIZAMIENTO</th>
                    </tr>
                    <tr>
                        <th scope="col">Brazo</th>
                        <td id="braValue">${ubicacion}</td>
                        <th scope="col">m</th>
                        <th scope="col">Rv</th>
                        <td id="rvValue">${ubicacion}</td>
                        <th scope="col">tn</th>
                    </tr>
                    <tr>
                        <th scope="col">Momento</th>
                        <td id="momentoValue">${ubicacion}</td>
                        <th scope="col">Tn-m</th>
                        <th scope="col">Fr</th>
                        <td id="frValue">${ubicacion}</td>
                        <th scope="col">tn</th>
                    </tr>
                    <tr>
                        <th scope="col">Mv'TOTAL</th>
                        <td id="mvprValue">${mvprtotal}</td>
                        <th scope="col">Tn-m</th>
                    </tr>
                    <tr>
                        <th scope="col">F.S.</th>
                        <td id="fskeyValue">${fskey}</td>
                        <th scope="col" id="verkeyValue">${verfkey}</th>
                    </tr>
                `);
            }
        }



        // // Obtener el elemento donde se insertará la tabla
        // let keyconTr = document.getElementById('keycon');

        // function calculate() {
        //     // Obtener la tabla existente si la hay
        //     let existingTable = keyconTr.nextElementSibling;

        //     // Obtener el valor de ubicacion y dentelloncorr
        //     let ubicacion = parseFloat(document.getElementById('ubicacion').value);
        //     let dentelloncorr = parseFloat(document.getElementById('dentelloncorr').value);

        // var Area = (altTras * dentelloncorr).toFixed(2);
        // var peso = (Area * inputgc).toFixed(2);

        // var brazcent = altTras / 2 + 0;
        // var brazextre = basem - altTras + altTras / 2;
        // var momecent = brazcent * peso;
        // var momeextre = brazextre * peso;
        // let brazo = 0;
        // let momento = 0;

        // var mvprtotal = ubicacion + totalsuelo;
        // var fskey = (mvprtotal / mhtotal).toFixed(2);
        // let verfkey = (fskey < 2) ? "NOT" : "OK";

        //     // Crear el HTML para la tabla de resultados
        //     let resultsTable = `
        // <tr>
        //     <th scope="col">Area</th>
        //     <td>${Area}</td>
        //     <th scope="col">m<sup>2</sup></th>
        // </tr>
        // <tr>
        //     <th scope="col">Peso</th>
        //     <td>${peso}</td>
        //     <th scope="col">Tn</th>
        // </tr>
        // <tr>
        //     <th scope="col" colspan="3" class="text-center">Volteo</th>
        //     <th scope="col" colspan="3" class="text-center">DESLIZAMIENTO</th>
        // </tr>
        // <tr>
        //     <th scope="col">Brazo</th>
        //     <td>${ubicacion}</td>
        //     <th scope="col">m</th>
        //     <th scope="col">Rv</th>
        //     <td>${ubicacion}</td>
        //     <th scope="col">tn</th>
        // </tr>
        // <tr>
        //     <th scope="col">Momento</th>
        //     <td>${ubicacion}</td>
        //     <th scope="col">Tn-m</th>
        //     <th scope="col">Fr</th>
        //     <td>${ubicacion}</td>
        //     <th scope="col">tn</th>
        // </tr>
        // <tr>
        //     <th scope="col">Mv'TOTAL</th>
        //     <td>${mvprtotal}</td>
        //     <th scope="col">Tn-m</th>
        // </tr>
        // <tr>
        //     <th scope="col">F.S.</th>
        //     <td>${fskey}</td>
        //     <th scope="col">${verfkey}</th>
        // </tr>
        //     `;

        //     if (existingTable) {
        //         // Actualizar la tabla existente
        //         existingTable.innerHTML = resultsTable;
        //     } else {
        //         // Insertar la nueva tabla debajo del elemento keycon
        //         keyconTr.insertAdjacentHTML('afterend', `<table>${resultsTable}</table>`);
        //     }
        // }

        // // Capturar el valor del input en cuanto se modifique y mostrarlo
        // document.getElementById('ubicacion').addEventListener('input', calculate);
        // document.getElementById('dentelloncorr').addEventListener('input', calculate);

    }
});

document.addEventListener("DOMContentLoaded", function () {
    paper.setup(document.getElementById('canvasSec'));

    // Dimensiones de las formas
    const anchoTotal = 300;
    const altoTotal = 200;
    const anchoRectangulo1 = 300;
    const altoRectangulo1 = 50;
    const anchoRectangulo2 = 100;
    const altoRectangulo2 = 150;
    const ladoCuadrado = 50;

    // Crear las formas
    const rectangulo1 = new paper.Path.Rectangle({
        point: [150, 200],
        size: [anchoRectangulo1, altoRectangulo1],
        strokeColor: 'black',
        strokeWidth: 2,
        fillColor: 'transparent'
    });

    const rectangulo2 = new paper.Path.Rectangle({
        point: [250, 50],
        size: [anchoRectangulo2, altoRectangulo2],
        strokeColor: 'black',
        strokeWidth: 2,
        fillColor: 'transparent'
    });

    const cuadrado = new paper.Path.Rectangle({
        point: [250, 250],
        size: [anchoRectangulo2, ladoCuadrado],
        strokeColor: 'black',
        strokeWidth: 2,
        fillColor: 'transparent'
    });

    const triangulo = new paper.Path();
    triangulo.moveTo(new paper.Point(-100 + anchoTotal + ladoCuadrado, altoRectangulo1));
    triangulo.lineTo(new paper.Point(-100 + anchoTotal, altoTotal));
    triangulo.lineTo(new paper.Point(anchoTotal - ladoCuadrado / 1, altoTotal));
    triangulo.closePath();
    triangulo.strokeColor = 'black';
    triangulo.strokeWidth = 2;
    triangulo.fillColor = 'transparent';

    //Crear las cotas
    const cotaRectangulo1 = new paper.PointText({
        point: [300, 230],
        content: `${anchoRectangulo1}m x ${altoRectangulo1}m`,
        content: `${anchoRectangulo1 / 100} m x ${altoRectangulo1 / 100} m`,
        justification: 'center'
    });

    const cotaRectangulo2 = new paper.PointText({
        point: [300, 130],
        content: `${anchoRectangulo2 / 100}m x ${altoRectangulo2 / 100}m`,
        justification: 'center'
    });

    const cotaCuadrado = new paper.PointText({
        point: [300, 290],
        content: `${ladoCuadrado / 100}m x ${ladoCuadrado / 100}m`,
        justification: 'center'
    });

    const cotaTriangulo = new paper.PointText({
        point: [anchoTotal - ladoCuadrado / 2, altoTotal - 50],
        content: `${(ladoCuadrado) / 100} m x ${(altoTotal - altoRectangulo1) / 100} m`, // Ajustado para la base y la altura del triángulo
        justification: 'center'
    });


    // Agregar las formas y las cotas al lienzo
    paper.project.activeLayer.addChildren([rectangulo1, rectangulo2, cuadrado, triangulo, cotaRectangulo1, cotaRectangulo2, cotaCuadrado, cotaTriangulo]);
});
