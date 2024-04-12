$(document).ready(function () {
  //Grafica de predimencionamiento

  dibujarCortePunzo();
  // Llama a la función para generar el gráfico

  // Tabla de entrada de datos
  var datacol1 = [
    ["CM", 93.633, 0.07, 0.52],
    ["CV", 30.45, 0.02, 0.24],
    ["CSx", 13.68, 0.42, -3.76],
    ["CSy", 11.46, 3.43, -0.34],
  ];

  var container = document.getElementById("CargaConServ");
  var hot = new Handsontable(container, {
    data: datacol1,
    rowHeaders: false,
    colHeaders: true,
    contextMenu: true,
    colWidths: 100,
    nestedHeaders: [["", "Pz (Ton)", "Mx (Ton-m)", "My (Ton-m)"]],
    collapsibleColumns: [
      {
        row: -1,
        col: 1,
        collapsible: false,
      },
    ],
    licenseKey: "non-commercial-and-evaluation",
  });
  var datacol2 = [
    ["CM", 164.05, 0.02, -0.11],
    ["CV", 73.09, 0.01, -0.04],
    ["CSx", 3.26, 0.22, -4.13],
    ["CSy", 2.14, 3.56, -0.38],
  ];

  var containercol2 = document.getElementById("CargaConServcol2");
  var hotcol2 = new Handsontable(containercol2, {
    data: datacol2,
    rowHeaders: false,
    colHeaders: true,
    contextMenu: true,
    colWidths: 100,
    nestedHeaders: [["", "Pz (Ton)", "Mx (Ton-m)", "My (Ton-m)"]],
    collapsibleColumns: [
      {
        row: -1,
        col: 1,
        collapsible: false,
      },
    ],
    licenseKey: "non-commercial-and-evaluation",
  });

  // Captura el formulario
  const form = document.getElementById("DataZapataCombinada");
  const dataCargacol1 = document.querySelector("#dataCargacol1");
  const dataCargacol2 = document.querySelector("#dataCargacol2");

  // Agrega un manejador de eventos para el envío del formulario
  form.addEventListener("submit", function (event) {
    event.preventDefault();

    // Obtén los datos de Handsontable y conviértelos a JSON
    const tableDataCol1 = hot.getData();
    const jsonDataCol1 = JSON.stringify(tableDataCol1);

    dataCargacol1.value = jsonDataCol1;

    const tableDataCol2 = hotcol2.getData();
    const jsonDataCol2 = JSON.stringify(tableDataCol2);

    dataCargacol2.value = jsonDataCol2;
    const formData = new FormData(form);

    // Envía los datos mediante una solicitud POST AJAX
    fetch("Controladores/DzapataCombinadaControlador.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.text())
      .then((data) => {
        const resultadosContainer =
          document.getElementById("ObtenerResultados");
        resultadosContainer.innerHTML = data;
        obtenerPuntosCorte("fila1_col1", "fila1_col2");
      })
      .catch((error) => {
        console.error("Error al enviar la solicitud Ajax", error);
      });
  });
  var selectColumna1 = document.getElementById("selectColumna1");
  var selectColumna2 = document.getElementById("selectColumna2");

  selectColumna1.addEventListener("change", seleccionarOpcion);
  selectColumna2.addEventListener("change", seleccionarOpcion);

  // Función para obtener los valores seleccionados y llamar a otra función
  function seleccionarOpcion() {
    var valorSelect1 =
      selectColumna1.options[selectColumna1.selectedIndex].value;
    var valorSelect2 =
      selectColumna2.options[selectColumna2.selectedIndex].value;

    // Llamar a una función y pasar los valores seleccionados como parámetros
    obtenerPuntosCorte(valorSelect1, valorSelect2);
  }
  dibujarZapataIzquierda();
});
function dibujarZapataIzquierda() {
  var P_t1_col1 = parseFloat(document.getElementById("t1_col1").value);
  var P_t1_col2 = parseFloat(document.getElementById("t1_col2").value);
  var PLe = parseFloat(document.getElementById("Le").value);
  var PL = PLe - 0.5 * P_t1_col1 - 0.5 * P_t1_col2;
  var P_m2 = parseFloat(document.getElementById("m2").value);
  var P_hz = parseFloat(document.getElementById("hz").value);
  var P_df = parseFloat(document.getElementById("df").value);
  var P_dif = 0.3;
  PPX1 = -0.5 * PL;
  PPX2 = PPX1;
  PPX3 = PPX2 - P_t1_col1;
  PPX4 = PPX3;
  PPX5 = PPX4 + 0;
  PPX6 = PPX1 - P_t1_col1 + PL + P_t1_col1 + P_t1_col2 + P_m2;
  PPX7 = PPX6;
  PPX8 = PPX7 - P_m2;
  PPX9 = PPX8;
  PPX10 = PPX9 - P_t1_col2;
  PPX11 = PPX10;
  PPX12 = PPX2;
  PPX13 = PPX1;

  PPY1 = P_hz;
  PPY2 = P_df + P_dif;
  PPY3 = PPY2;
  PPY4 = 0;
  PPY5 = PPY4;
  PPY6 = PPY5;
  PPY7 = P_hz;
  PPY8 = PPY7;
  PPY9 = PPY2;
  PPY10 = PPY9;
  PPY11 = PPY7;
  PPY12 = PPY11;
  PPY13 = PPY1;

  // Imprimir los valores por consola
  console.log("PPX1:", PPX1);
  console.log("PPX2:", PPX2);
  console.log("PPX3:", PPX3);
  console.log("PPX4:", PPX4);
  console.log("PPX5:", PPX5);
  console.log("PPX6:", PPX6);
  console.log("PPX7:", PPX7);
  console.log("PPX8:", PPX8);
  console.log("PPX9:", PPX9);
  console.log("PPX10:", PPX10);
  console.log("PPX11:", PPX11);
  console.log("PPX12:", PPX12);
  console.log("PPX13:", PPX13);

  console.log("PPY1:", PPY1);
  console.log("PPY2:", PPY2);
  console.log("PPY3:", PPY3);
  console.log("PPY4:", PPY4);
  console.log("PPY5:", PPY5);
  console.log("PPY6:", PPY6);
  console.log("PPY7:", PPY7);
  console.log("PPY8:", PPY8);
  console.log("PPY9:", PPY9);
  console.log("PPY10:", PPY10);
  console.log("PPY11:", PPY11);
  console.log("PPY12:", PPY12);
  console.log("PPY13:", PPY13);

  var data = {
    datasets: [
      {
        label: "Predimencionamiento",
        backgroundColor: "rgb(255, 99, 132)",
        borderColor: "rgb(255, 99, 132)",
        data: [
          { x: PPX1, y: PPY1 },
          { x: PPX2, y: PPY2 },
          { x: PPX3, y: PPY3 },
          { x: PPX4, y: PPY4 },
          { x: PPX5, y: PPY5 },
          { x: PPX6, y: PPY6 },
          { x: PPX7, y: PPY7 },
          { x: PPX8, y: PPY8 },
          { x: PPX9, y: PPY9 },
          { x: PPX10, y: PPY10 },
          { x: PPX11, y: PPY11 },
          { x: PPX12, y: PPY12 },
          { x: PPX13, y: PPY13 },
        ],
        type: "scatter",
        showLine: true, // Mostrar líneas conectando los puntos
        fill: false,
        tension: 0, // Esto asegura que las líneas sean rectas
      },
    ],
  };

  // Configurar las opciones
  var options = {
    scales: {
      x: {
        type: "linear",
        position: "bottom",
      },
      y: {
        type: "linear",
        position: "left",
      },
    },
  };
  var ctx = document.getElementById("predimencionamiento").getContext("2d");
  // Crear el gráfico
  var myChart = new Chart(ctx, {
    type: "scatter",
    data: data,
    options: options,
  });
}

function obtenerPuntosCorte(fila_columna1, fila_columna2) {
  // Datos de los puntos (x, y)
  var t1_col1 = document.getElementById("t1_col1").value;
  var Le = document.getElementById("Le").value;
  var m2 = document.getElementById("m2").value;

  var t1_col2 = document.getElementById("t1_col2").value;

  // Convertir los valores a números de punto flotante (float)
  var t1_col1_float = parseFloat(t1_col1);
  var Le_float = parseFloat(Le);
  var m2_float = parseFloat(m2);
  var t1_col2_float = parseFloat(t1_col2);

  // Puntos en X
  var puntoX1 = 0; // Supongamos que calculamos este punto dinámicamente
  var puntoX2 = 0.5 * t1_col1_float;
  var puntoX3 = puntoX2;
  var puntoX4 = 0.5 * t1_col1_float + Le_float;
  var puntoX5 = puntoX4;
  var puntoX6 = puntoX4 + m2_float + 0.5 * t1_col2_float;

  var filaSeleccionada = document.getElementById(fila_columna1);

  // Acceder a las celdas dentro de la fila seleccionada
  var celdasTabla = filaSeleccionada.querySelectorAll("td");

  // Obtener los valores de cada celda
  var P_COL1 = celdasTabla[0].textContent.trim(); // Valor de la primera celda
  var MX_COL1 = celdasTabla[1].textContent.trim(); // Valor de la segunda celda
  var MY_COL1 = celdasTabla[2].textContent.trim(); // Valor de la tercera celda

  P_COL1 = parseFloat(P_COL1);
  MX_COL1 = parseFloat(MX_COL1);
  MY_COL1 = parseFloat(MY_COL1);

  // Obtener la fila seleccionada por su ID
  var filaSeleccionada2 = document.getElementById(fila_columna2);

  // Acceder a las celdas dentro de la fila seleccionada
  var celdasTabla2 = filaSeleccionada2.querySelectorAll("td");

  // Obtener los valores de cada celda
  var P_COL2 = celdasTabla2[0].textContent.trim(); // Valor de la primera celda
  var MX_COL2 = celdasTabla2[1].textContent.trim(); // Valor de la segunda celda
  var MY_COL2 = celdasTabla2[2].textContent.trim(); // Valor de la tercera celda

  P_COL2 = parseFloat(P_COL2);
  MX_COL2 = parseFloat(MX_COL2);
  MY_COL2 = parseFloat(MY_COL2);
  // Obtener el elemento por su ID
  var B = document.getElementById("valor_b").innerHTML;
  var L = document.getElementById("valor_L").innerHTML;
  B = parseFloat(B);
  L = parseFloat(L);
  //CM+CV
  P = P_COL1 + P_COL2;
  MX = MX_COL1 + MX_COL2;

  B11 = 0.5 * L - 0.5 * t1_col1_float;
  G11 = 0.5 * L - (m2_float + 0.5 * t1_col2_float);
  MY = -1 * MY_COL1 - MY_COL2 - P_COL1 * B11 + P_COL2 * G11;

  // Utilizar el valor obtenido
  CY = L / 2;
  LX = (B * L * L * L) / 12;
  COL1_O = P / (B * L) + (MY * CY) / LX;
  COL2_O = P / (B * L) - (MY * CY) / LX;
  O = Math.max(COL1_O, COL2_O);
  OF = O * B;

  var puntoY1 = 0;
  var puntoY2 = parseFloat((0.5 * t1_col1_float * OF).toFixed(2));
  var puntoY3 = parseFloat((puntoY2 - P_COL1).toFixed(2));
  var puntoY5 = parseFloat(
    (-1 * OF * (m2_float + 0.5 * t1_col2_float)).toFixed(2)
  );
  var puntoY4 = parseFloat((puntoY5 + P_COL2).toFixed(2));
  var puntoY6 = 0;

  var data = {
    labels: [puntoX1, puntoX2, puntoX3, puntoX4, puntoX5, puntoX6],
    datasets: [
      {
        label: "VC Corte",
        backgroundColor: "rgba(255, 99, 132, 0.2)",
        borderColor: "rgba(255, 99, 132, 1)",
        data: [
          { x: puntoX1, y: puntoY1 },
          { x: puntoX2, y: puntoY2 },
          { x: puntoX3, y: puntoY3 },
          { x: puntoX4, y: puntoY4 },
          { x: puntoX5, y: puntoY5 },
          { x: puntoX6, y: puntoY6 },
        ],
        fill: false, // Deshabilitar el relleno debajo de la línea
      },
    ],
  };

  var options = {
    scales: {
      x: {
        type: "linear",
        position: "bottom",
        min: -1,
        max: 7,
      },
      y: {
        type: "linear",
        position: "left",
        min: -200,
        max: 250,
      },
    },
    elements: {
      line: {
        tension: 0, // Deshabilitar el suavizado de las líneas
      },
    },
  };

  var ctx = document.getElementById("myChart").getContext("2d");
  var lineChart = new Chart(ctx, {
    type: "line", // Tipo de gráfico lineal
    data: data,
    options: options,
  });
  generarGraficoLinealCurvo(puntoY4, puntoY3);
}

function generarGraficoLinealCurvo(puntoY4, puntoY3) {
  var t1_col1F = document.getElementById("t1_col1").value;
  var t1_col1 = document.getElementById("t1_col1").value;
  var Le_F = document.getElementById("Le").value;
  var m2F = document.getElementById("m2").value;

  var t1_col2F = document.getElementById("t1_col2").value;

  // Convertir los valores a números de punto flotante (float)
  var t1_col1F = parseFloat(t1_col1F);
  var Le_F = parseFloat(Le_F);
  var m2F = parseFloat(m2F);
  var t1_col2F = parseFloat(t1_col2F);
  //Puntos X
  PX1 = 0;
  PX4 = 0.5 * t1_col1F;
  PX2 = 0.25 * (PX4 - PX1) + PX1;
  PX3 = 0.25 * (PX4 - PX1) + PX2;
  PX5 = 0.5 * t1_col1F;

  VC_B32 = 0.5 * t1_col1F;
  VC_D32 = Le_F;
  VC_H47 = parseFloat(puntoY4);
  VC_D58 = parseFloat(puntoY3);
  VC_D52 = VC_D32 / (1 + VC_H47 / (-1 * VC_D58));
  PX6 = parseFloat((VC_D52 + VC_B32).toFixed(4));
  console.log("VC_D32: " + VC_D32);
  console.log("VC_H47: " + VC_H47);
  console.log("VC_D58: " + VC_D58);
  console.log("VC_D52: " + VC_D52);
  console.log("VC_B32: " + VC_B32);

  PX7 = 0.5 * t1_col1F + VC_D32;
  PX8 = 0.5 * t1_col1F + VC_D32;
  VC_J32 = m2F + 0.5 * t1_col2F;
  PX11 = PX7 + VC_J32;
  PX9 = 0.25 * (PX11 - PX7) + PX7;
  PX10 = 0.5 * (PX11 - PX7) + PX8;
  console.log("PX1: " + PX1);
  console.log("PX2: " + PX2);
  console.log("PX3: " + PX3);
  console.log("PX4: " + PX4);
  console.log("PX5: " + PX5);
  console.log("PX6: " + PX6);
  console.log("PX7: " + PX7);
  console.log("PX8: " + PX8);
  console.log("PX9: " + PX9);
  console.log("PX10: " + PX10);
  console.log("PX11: " + PX11);

  //

  var filaSelect1 = document.getElementById("selectVFColumna1").value;

  console.log("Valor de filaSeleccionadaF:", filaSelect1);
  var filaSeleccionadaF = document.getElementById(filaSelect1);
  // Acceder a las celdas dentro de la fila seleccionada
  var celdasTablaF = filaSeleccionadaF.querySelectorAll("td");

  // Obtener los valores de cada celda
  var P_COLF1 = celdasTablaF[0].textContent.trim(); // Valor de la primera celda
  var MX_COLF1 = celdasTablaF[1].textContent.trim(); // Valor de la segunda celda
  var MY_COLF1 = celdasTablaF[2].textContent.trim(); // Valor de la tercera celda

  P_COLF1 = parseFloat(P_COLF1);
  MX_COLF1 = parseFloat(MX_COLF1);
  MY_COLF1 = parseFloat(MY_COLF1);

  var filaSelect2 = document.getElementById("selectVFColumna2").value;

  // Obtener la fila seleccionada por su ID
  var filaSeleccionadaF2 = document.getElementById(filaSelect2);

  // Acceder a las celdas dentro de la fila seleccionada
  var celdasTablaF2 = filaSeleccionadaF2.querySelectorAll("td");

  // Obtener los valores de cada celda
  var P_COLF2 = celdasTablaF2[0].textContent.trim(); // Valor de la primera celda
  var MX_COLF2 = celdasTablaF2[1].textContent.trim(); // Valor de la segunda celda
  var MY_COLF2 = celdasTablaF2[2].textContent.trim(); // Valor de la tercera celda

  P_COLF2 = parseFloat(P_COLF2);
  MX_COLF2 = parseFloat(MX_COLF2);
  MY_COLF2 = parseFloat(MY_COLF2);

  // Obtener el elemento por su ID
  var BF = document.getElementById("valor_b").innerHTML;
  var LF = document.getElementById("valor_L").innerHTML;
  BF = parseFloat(BF);
  LF = parseFloat(LF);
  //CM+CV
  PF = P_COLF1 + P_COLF2;
  MXF = MX_COLF1 + MX_COLF2;

  B11 = 0.5 * LF - 0.5 * t1_col1F;
  G11 = 0.5 * LF - (m2F + 0.5 * t1_col2F);
  MYF = -1 * MY_COLF1 - MY_COLF2 - P_COLF1 * B11 + P_COLF2 * G11;

  // Utilizar el valor obtenido
  CYF = LF / 2;
  LXF = (BF * LF * LF * LF) / 12;
  COL1_OF = PF / (BF * LF) + (MYF * CYF) / LXF;
  COL2_OF = PF / (BF * LF) - (MYF * CYF) / LXF;
  OF = Math.max(COL1_OF, COL2_OF);
  OFF = O * BF;

  //PUNTOS Y
  PY1 = parseFloat((-1 * 0.5 * OFF * PX1 * PX1).toFixed(2));
  PY2 = parseFloat((-1 * 0.5 * OFF * PX2 * PX2).toFixed(2));
  PY3 = parseFloat((-1 * 0.5 * OFF * PX3 * PX3).toFixed(2));
  PY4 = parseFloat((-1 * 0.5 * OFF * PX4 * PX4).toFixed(2));
  PY5 = parseFloat((PY4 - MY_COLF1).toFixed(2));
  PY6 = parseFloat((-1 * (PY5 + (VC_D58 * VC_D52) / 2)).toFixed(2));

  F_J32 = parseFloat((m2F + 0.5 * t1_col2F).toFixed(2));
  PY8 = parseFloat((-1 * OFF * F_J32).toFixed(2));
  PY7 = parseFloat((PY8 - MY_COLF2).toFixed(2));

  F_AM47 = parseFloat((0).toFixed(2));
  F_AM45 = parseFloat((0.25 * (F_AM47 - F_J32) + F_J32).toFixed(2));
  PY9 = parseFloat((-1 * OFF * F_AM45).toFixed(2));
  F_AM46 = parseFloat((0.25 * (F_AM47 - F_J32) + F_AM45).toFixed(2));
  PY10 = parseFloat((-1 * OFF * F_AM46).toFixed(2));
  PY11 = parseFloat((-1 * OFF * F_AM47).toFixed(2));

  console.log("PY1: " + PY1);
  console.log("PY2: " + PY2);
  console.log("PY3: " + PY3);
  console.log("PY4: " + PY4);
  console.log("PY5: " + PY5);
  console.log("PY6: " + PY6);
  console.log("PY7: " + PY7);
  console.log("PY8: " + PY8);
  console.log("PY9: " + PY9);
  console.log("PY10: " + PY10);
  console.log("PY11: " + PY11);

  // Datos de los puntos
  var data = [
    { x: PX1, y: PY1 },
    { x: PX2, y: PY2 },
    { x: PX3, y: PY3 },
    { x: PX4, y: PY4 },
    { x: PX5, y: PY5 },
    { x: PX6, y: PY6 },
    { x: PX7, y: PY7 },
    { x: PX8, y: PY8 },
    { x: PX9, y: PY9 },
    { x: PX10, y: PY10 },
    { x: PX11, y: PY11 },
  ];

  // Filtrar los puntos para eliminar los duplicados de x
  var uniqueData = data.filter(
    (point, index, self) => index === self.findIndex((p) => p.x === point.x)
  );

  // Obtén el contexto del lienzo
  var ctx = document.getElementById("VC_flexion").getContext("2d");

  // Crea el gráfico de línea
  var curvedLineChart = new Chart(ctx, {
    type: "line",
    data: {
      labels: uniqueData.map((point) => point.x), // Usar x como etiquetas
      datasets: [
        {
          label: "Verificación por flexion",
          data: uniqueData,
          tension: 0.4, // Controla la suavidad de la curva
          fill: false, // No rellenar el área bajo la línea
          borderColor: "rgba(75, 192, 192, 1)", // Color de la línea
          borderWidth: 2, // Ancho de la línea
        },
      ],
    },
    options: {
      scales: {
        x: {
          type: "linear",
          position: "bottom",
        },
        y: {
          type: "linear",
          position: "left",
        },
      },
    },
  });
}

function dibujarCortePunzo() {

  //Datos necesarios
  var CP_t1_col1 = parseFloat(document.getElementById("t1_col1").value);
  var CP_t1_col2 = parseFloat(document.getElementById("t1_col2").value);
  var CP_t2_col1 = parseFloat(document.getElementById("t2_col1").value);
  var CP_t2_col2 = parseFloat(document.getElementById("t2_col2").value);
  var CPLe = parseFloat(document.getElementById("Le").value);
  var CPL = CPLe - 0.5 * CP_t1_col1 - 0.5 * CP_t1_col2;
  var CP_d_col1 = parseFloat(document.getElementById("dvc_col1").value);
  var CP_d_col2 = parseFloat(document.getElementById("dvc_col2").value);


  // Puntos X de la columna 1
  var COL1_PX1 = parseFloat((-0.5 * CPL).toFixed(3));
  var COL1_PX2 = parseFloat(COL1_PX1.toFixed(3));
  var COL1_PX3 = parseFloat((COL1_PX2 - CP_t1_col1).toFixed(3));
  var COL1_PX4 = parseFloat(COL1_PX3.toFixed(3));
  var COL1_PX5 = parseFloat(COL1_PX2.toFixed(3));
  var COL1_PX6 = parseFloat(COL1_PX1.toFixed(3));

  // Puntos Y de la columna 1
  var COL1_PY1 = parseFloat((0).toFixed(3));
  var COL1_PY2 = parseFloat((COL1_PY1 + CP_t2_col1 * 0.5).toFixed(3));
  var COL1_PY3 = parseFloat(COL1_PY2.toFixed(3));
  var COL1_PY4 = parseFloat((COL1_PY3 - CP_t2_col1).toFixed(3));
  var COL1_PY5 = parseFloat(COL1_PY4.toFixed(3));
  var COL1_PY6 = parseFloat(COL1_PY1.toFixed(3));

  // Puntos X de la columna 2
  var COL2_PX1 = parseFloat((0.5 * CPL).toFixed(3));
  var COL2_PX2 = parseFloat(COL2_PX1.toFixed(3));
  var COL2_PX3 = parseFloat((COL2_PX2 + CP_t1_col2).toFixed(3));
  var COL2_PX4 = parseFloat(COL2_PX3.toFixed(3));
  var COL2_PX5 = parseFloat(COL2_PX2.toFixed(3));
  var COL2_PX6 = parseFloat(COL2_PX1.toFixed(3));

  // Puntos Y de la columna 2
  var COL2_PY1 = parseFloat((0).toFixed(3));
  var COL2_PY2 = parseFloat((COL2_PY1 + CP_t2_col2 * 0.5).toFixed(3));
  var COL2_PY3 = parseFloat(COL2_PY2.toFixed(3));
  var COL2_PY4 = parseFloat((COL2_PY3 - CP_t2_col2).toFixed(3));
  var COL2_PY5 = parseFloat(COL2_PY4.toFixed(3));
  var COL2_PY6 = parseFloat(COL2_PY1.toFixed(3));

  // Imprimir los valores por consola
  console.log("COL1_PX1:", COL1_PX1);
  console.log("COL1_PX2:", COL1_PX2);
  console.log("COL1_PX3:", COL1_PX3);
  console.log("COL1_PX4:", COL1_PX4);
  console.log("COL1_PX5:", COL1_PX5);
  console.log("COL1_PX6:", COL1_PX6);

  console.log("COL1_PY1:", COL1_PY1);
  console.log("COL1_PY2:", COL1_PY2);
  console.log("COL1_PY3:", COL1_PY3);
  console.log("COL1_PY4:", COL1_PY4);
  console.log("COL1_PY5:", COL1_PY5);
  console.log("COL1_PY6:", COL1_PY6);

  console.log("COL2_PX1:", COL2_PX1);
  console.log("COL2_PX2:", COL2_PX2);
  console.log("COL2_PX3:", COL2_PX3);
  console.log("COL2_PX4:", COL2_PX4);
  console.log("COL2_PX5:", COL2_PX5);
  console.log("COL2_PX6:", COL2_PX6);

  console.log("COL2_PY1:", COL2_PY1);
  console.log("COL2_PY2:", COL2_PY2);
  console.log("COL2_PY3:", COL2_PY3);
  console.log("COL2_PY4:", COL2_PY4);
  console.log("COL2_PY5:", COL2_PY5);
  console.log("COL2_PY6:", COL2_PY6);

  // Puntos X de la corte columna 1
  var CCOL1_PX1 = COL1_PX4;
  var CCOL1_PX2 = CCOL1_PX1;
  var CCOL1_PX3 = parseFloat((COL1_PX5 + (0.5 * CP_d_col1) / 100).toFixed(3));
  var CCOL1_PX4 = CCOL1_PX3;
  var CCOL1_PX5 = CCOL1_PX2;
  var CCOL1_PX6 = CCOL1_PX1;

  // Puntos Y de la corte columna 1
  var CCOL1_PY1 = COL1_PY4;
  var CCOL1_PY2 = parseFloat((CCOL1_PY1 - (0.5 * CP_d_col1) / 100).toFixed(3));
  var CCOL1_PY3 = CCOL1_PY2;
  var CCOL1_PY4 = parseFloat((COL1_PY2 + (0.5 * CP_d_col1) / 100).toFixed(3));
  var CCOL1_PY5 = CCOL1_PY4;
  var CCOL1_PY6 = CCOL1_PY2;

  // Puntos X de la corte columna 2
  var CCOL2_PX1 = parseFloat((COL2_PX1 - (0.5 * CP_d_col2) / 100).toFixed(3));
  var CCOL2_PX2 = CCOL2_PX1;
  var CCOL2_PX3 = parseFloat((COL2_PX3 + (0.5 * CP_d_col2) / 100).toFixed(3));
  var CCOL2_PX4 = CCOL2_PX3;
  var CCOL2_PX5 = CCOL2_PX1;
  var CCOL2_PX6 = CCOL2_PX1;

  // Puntos Y de la corte columna 2
  var CCOL2_PY1 = COL2_PY1;
  var CCOL2_PY2 = parseFloat((COL2_PY4 - (0.5 * CP_d_col2) / 100).toFixed(3));
  var CCOL2_PY3 = CCOL2_PY2;
  var CCOL2_PY4 = parseFloat((COL2_PY3 + (0.5 * CP_d_col2) / 100).toFixed(3));
  var CCOL2_PY5 = CCOL2_PY4;
  var CCOL2_PY6 = CCOL2_PY1;
  // Imprimir los valores por consola
  console.log("CCOL1_PX1:", CCOL1_PX1);
  console.log("CCOL1_PX2:", CCOL1_PX2);
  console.log("CCOL1_PX3:", CCOL1_PX3);
  console.log("CCOL1_PX4:", CCOL1_PX4);
  console.log("CCOL1_PX5:", CCOL1_PX5);
  console.log("CCOL1_PX6:", CCOL1_PX6);

  console.log("CCOL1_PY1:", CCOL1_PY1);
  console.log("CCOL1_PY2:", CCOL1_PY2);
  console.log("CCOL1_PY3:", CCOL1_PY3);
  console.log("CCOL1_PY4:", CCOL1_PY4);
  console.log("CCOL1_PY5:", CCOL1_PY5);
  console.log("CCOL1_PY6:", CCOL1_PY6);

  console.log("CCOL2_PX1:", CCOL2_PX1);
  console.log("CCOL2_PX2:", CCOL2_PX2);
  console.log("CCOL2_PX3:", CCOL2_PX3);
  console.log("CCOL2_PX4:", CCOL2_PX4);
  console.log("CCOL2_PX5:", CCOL2_PX5);
  console.log("CCOL2_PX6:", CCOL2_PX6);

  console.log("CCOL2_PY1:", CCOL2_PY1);
  console.log("CCOL2_PY2:", CCOL2_PY2);
  console.log("CCOL2_PY3:", CCOL2_PY3);
  console.log("CCOL2_PY4:", CCOL2_PY4);
  console.log("CCOL2_PY5:", CCOL2_PY5);
  console.log("CCOL2_PY6:", CCOL2_PY6);
  var data = {
    datasets: [
      {
        label: "Columna 1",
        backgroundColor: "rgb(255, 99, 132)",
        borderColor: "rgb(255, 99, 132)",
        data: [
          { x: COL1_PX1, y: COL1_PY1 },
          { x: COL1_PX2, y: COL1_PY2 },
          { x: COL1_PX3, y: COL1_PY3 },
          { x: COL1_PX4, y: COL1_PY4 },
          { x: COL1_PX5, y: COL1_PY5 },
          { x: COL1_PX6, y: COL1_PY6 },
        ],
        type: "scatter",
        showLine: true, // Mostrar líneas conectando los puntos
        fill: false,
        tension: 0, // Esto asegura que las líneas sean rectas
      },
      {
        label: "Columna 2",
        backgroundColor: "rgb(54, 162, 235)",
        borderColor: "rgb(54, 162, 235)",
        data: [
          { x: COL2_PX1, y: COL2_PY1 },
          { x: COL2_PX2, y: COL2_PY2 },
          { x: COL2_PX3, y: COL2_PY3 },
          { x: COL2_PX4, y: COL2_PY4 },
          { x: COL2_PX5, y: COL2_PY5 },
          { x: COL2_PX6, y: COL2_PY6 },
        ],
        type: "scatter",
        showLine: true, // Mostrar líneas conectando los puntos
        fill: false,
        tension: 0, // Esto asegura que las líneas sean rectas
      },
      {
        label: "Corte Punzonamiento 1",
        backgroundColor: "rgb(75, 192, 192)",
        borderColor: "rgb(75, 192, 192)",
        data: [
          { x: CCOL1_PX1, y: CCOL1_PY1 },
          { x: CCOL1_PX2, y: CCOL1_PY2 },
          { x: CCOL1_PX3, y: CCOL1_PY3 },
          { x: CCOL1_PX4, y: CCOL1_PY4 },
          { x: CCOL1_PX5, y: CCOL1_PY5 },
          { x: CCOL1_PX6, y: CCOL1_PY6 },
        ],
        type: "scatter",
        showLine: true, // Mostrar líneas conectando los puntos
        fill: false,
        tension: 0, // Esto asegura que las líneas sean rectas
      },
      {
        label: "Corte Punzonamiento 2",
        backgroundColor: "rgb(75, 192, 192)",
        borderColor: "rgb(75, 192, 192)",
        data: [
          { x: CCOL2_PX1, y: CCOL2_PY1 },
          { x: CCOL2_PX2, y: CCOL2_PY2 },
          { x: CCOL2_PX3, y: CCOL2_PY3 },
          { x: CCOL2_PX4, y: CCOL2_PY4 },
          { x: CCOL2_PX5, y: CCOL2_PY5 },
          { x: CCOL2_PX6, y: CCOL2_PY6 },
        ],
        type: "scatter",
        showLine: true, // Mostrar líneas conectando los puntos
        fill: false,
        tension: 0, // Esto asegura que las líneas sean rectas
      },
    ],
  };

  // Configurar las opciones
  var options = {
    scales: {
      x: {
        type: "linear",
        position: "bottom",
      },
      y: {
        type: "linear",
        position: "left",
      },
    },
  };
  var ctx = document.getElementById("corte_punzonamiento").getContext("2d");
  // Crear el gráfico
  var myChart = new Chart(ctx, {
    type: "scatter",
    data: data,
    options: options,
  });
}
