/* ------------------------ Análsis en X ------------------------ */
var tableDI1X = [];
var tableDI1Y = [];

export function diT1X(
  contenedor,
  solicitaciones,
  tableData1DC,
  dataTable2xDF,
  tableData3DC,
  formData
) {
  var container = contenedor;

  var data = [];
  // Tipo sistema Estructural = Muros Estructurales
  /* var tipoSistema = 6; */

  for (let i = 0; i < 1; i++) {
    var lm = formData.lxDF;
    var hm = tableData1DC[i][4];
    var as = dataTable2xDF[i][9];
    var ads = 0;
    var pu = solicitaciones[i][1];
    var pv = tableData3DC[i][3];
    var c1 =
      (pu * 1000 +
        as * formData.fyDF +
        pv * formData.ezcxDF * 100 * formData.lxDF * 100 * formData.fyDF -
        ads * formData.fyDF) /
      (0.85 * formData.fcDF * formData.ezcxDF * 100 * formData.β1DF +
        2 * pv * formData.ezcxDF * 100 * formData.fyDF);
    var es = 0;
    var c2 = 0;
    var c3 =
      es == 0
        ? 0
        : (formData.ƐcDF * formData.lxDF * 100) / (formData.ƐcDF + es);
    var c = Math.max(c1, c2, c3);
    var gu = 0.2374764;
    var cLimit = (lm / (600 * Math.max(gu / hm, 0.005))) * 100;
    var confinamiento =
      c >= cLimit ? 'Requiere ser confinado' : 'No requiere ser confinado';

    var dataRow = [
      `Piso ${i + 1}`, //  Nivel
      lm, // lm
      hm, // hm
      as,
      ads,
      pu,
      pv,
      c1,
      c2,
      es,
      c3,
      c,
      gu,
      cLimit,
      confinamiento,
    ];
    data.push(dataRow);
  }

  var hot = new Handsontable(container, {
    data: data,
    rowHeaders: true,
    colWidths: 100,
    colHeaders: [
      'lm (m)',
      'hm (m)',
      'As (cm²)',
      "A's (cm²)",
      'Pu (Ton)',
      'pv',
      'c1 (cm)',
      'c2 (cm)',
      'Ɛs',
      'c3 (cm)',
      'c (cm)',
      'δu m)',
      'C limite (cm)',
      'Confinamiento de elemento de borde',
    ],
    columns: [
      { type: 'numeric', readOnly: true }, // 'lm (m)',
      { type: 'numeric', readOnly: true }, // 'lm (m)',
      { type: 'numeric', readOnly: true }, // 'hm acumulado (m)',
      { type: 'numeric', readOnly: true }, // 'hm (m)',
      { type: 'numeric', readOnly: true }, // 'Vua (Ton)',
      { type: 'numeric', readOnly: true }, // 'Mua (Ton.m)',
      { type: 'numeric', readOnly: true }, // 'Cociente',
      { type: 'numeric' }, // 'Mnx (Ton.m)',
      { type: 'numeric' }, // 'Mnx (Ton.m)',
      { type: 'numeric', readOnly: true }, // 'Mnx/Mua',
      { type: 'numeric', readOnly: true }, // 'Vux (Ton)',
      { type: 'numeric' }, // 'hm/lm',
      { type: 'numeric', readOnly: true }, // 'αc',
      { type: 'numeric', readOnly: true }, // 'Vcx máx (Ton)',
    ],
    afterChange: function (changes, source) {
      if (source === 'edit') {
        var hot = this;
        changes.forEach(function (change) {
          /* console.log(change) Devuelve un array con 4 valores, row, col, oldValue, newValue */
          var row = change[0];
          var col = change[1];
          //var oldValue = change[2];
          var newValue = change[3];

          if (col === 7) {
            hot.setDataAtCell(
              row,
              10,
              Math.max(
                hot.getDataAtCell(row, 6),
                hot.getDataAtCell(row, 7),
                hot.getDataAtCell(row, 9)
              )
            );
          }
          if (col === 8) {
            hot.setDataAtCell(
              row,
              9,
              newValue == 0
                ? 0
                : (formData.ƐcDF * formData.lxDF * 100) /
                    (formData.ezcxDF + newValue)
            );
          }
          if (col === 9) {
            hot.setDataAtCell(
              row,
              10,
              Math.max(
                hot.getDataAtCell(row, 6),
                hot.getDataAtCell(row, 7),
                hot.newValue
              )
            );
          }
          if (col === 10) {
            hot.setDataAtCell(
              row,
              13,
              newValue >= hot.getDataAtCell(row, 12)
                ? 'Requiere ser confinado'
                : 'No requiere ser confinado'
            );
          }
          if (col === 11) {
            hot.setDataAtCell(
              row,
              12,
              (hot.getDataAtCell(row, 0) /
                (600 *
                  Math.max(
                    hot.getDataAtCell(row, 11) / hot.getDataAtCell(row, 1),
                    0.005
                  ))) *
                100
            );
          }
          if (col === 12) {
            hot.setDataAtCell(
              row,
              13,
              hot.getDataAtCell(row, 10) >= newValue
                ? 'Requiere ser confinado'
                : 'No requiere ser confinado'
            );
          }
        });
        /* CheckData(); */
      }
    },
    afterPaste: function (data, coords) {
      console.log(data); /* array de filas */
      console.log(coords); /* array con coordenadas de inicio y fin (col-row)*/
      data.forEach(function (rowData, i) {
        var startRow = coords[0].startRow;
        /* var endRow = coords[0].endRow; */
        var startCol = coords[0].startCol;
        var endCol = coords[0].endCol;
        let k = 0;
        for (let j = startCol; j <= endCol; j++) {
          /* console.log('Fila:', startRow + i);
              console.log('Columna:', j);
              console.log('Dato:', rowData[k]);
              console.log('indice' + k); */
          hot.setDataAtCell(startRow + i, j, rowData[k]);
          k++;
        }
      });
    },
    licenseKey: 'non-commercial-and-evaluation',
  });

  document
    .getElementById('saveDataBtnDI1X')
    .addEventListener('click', CheckData);

  function CheckData() {
    tableDI1X = hot.getData();

    var contenedor = document.getElementById('diT2X');
    diT2X(contenedor, solicitaciones, tableData1DC, dataTable2xDF, formData);
    var contenedor2 = document.getElementById('diT3X');
    diT3X(contenedor2, formData);
  }
}

//Tabla Análisis en Dirección "2 x"
function diT2X(
  contenedor,
  solicitaciones,
  tableData1DC,
  dataTable2xDF,
  formData
) {
  var container = contenedor;

  var data = [];

  for (let i = 0; i < 1; i++) {
    var zc = formData.zcxDF;
    var vuMax = tableData1DC[i][11];
    var muMax = solicitaciones[i][3];
    var lomax1 = tableDI1X[i][0];
    var lomax2 = 0.25 * (muMax / vuMax);
    var lomax = Math.max(lomax1, lomax2);
    var zcmax1 = Math.max(tableDI1X[i][10] / 100 - 0.1 * tableDI1X[i][0], 0);
    var zcmax2 = tableDI1X[i][10] / 2 / 100;
    var zcmax = Math.max(zcmax1, zcmax2);
    var verifEspesor = zc > zcmax ? 'Sí cumple' : 'No cumple, verificar';
    var s1 = 10 * dataTable2xDF[i][2];
    var s2 = Math.min(formData.zcxDF, formData.ezcxDF) * 100;
    var s3 = 25;
    var s = Math.floor(Math.min(s1, s3) / 2.5) * 2.5;

    var dataRow = [
      zc,
      vuMax,
      muMax,
      lomax1,
      lomax2,
      lomax,
      zcmax1,
      zcmax2,
      zcmax,
      verifEspesor,
      s1,
      s2,
      s3,
      s,
    ];
    data.push(dataRow);
  }

  var hot = new Handsontable(container, {
    data: data,
    rowHeaders: true,
    colWidths: 100,
    colHeaders: [
      'zc (m)',
      'Vu máx (Ton)',
      'Mu máx (Ton.m)',
      'Lo máx 1 (m)',
      'Lo máx 2 (m)',
      'Lo máx (m)',
      'zcmáx 1 (m)',
      'zcmáx 2 (m)',
      'zcmáx (m)',
      'Artículo 21.9.7.6.a. Verificación del Espesor de la Zona de Confinamiento',
      's1 (cm)',
      's2 (cm)',
      's3 (cm)',
      's (cm)',
    ],
    columns: [
      { type: 'numeric', readOnly: true },
      { type: 'numeric', readOnly: true },
      { type: 'numeric', readOnly: true },
      { type: 'numeric', readOnly: true },
      { type: 'numeric', readOnly: true },
      { type: 'numeric', readOnly: true },
      { type: 'numeric', readOnly: true },
      { type: 'numeric', readOnly: true },
      { type: 'numeric', readOnly: true },
      { type: 'text', readOnly: true },
      { type: 'numeric', readOnly: true },
      { type: 'numeric', readOnly: true },
      { type: 'numeric', readOnly: true },
      { type: 'numeric', readOnly: true },
    ],
    licenseKey: 'non-commercial-and-evaluation',
  });
}

//Tabla Análisis en Dirección "2 x"
function diT3X(contenedor, formData) {
  var container = contenedor;

  var data = [];

  for (let i = 0; i < 1; i++) {
    var ly = formData.lyDF;
    var hm = tableDI1X[i][1];
    var lyCal = 0.1 * hm;
    var verifAncho =
      ly <= lyCal
        ? 'Diseñar con ala completa'
        : 'Diseñar solo con ancho efectivo del ala';
    var dataRow = [ly, hm, lyCal, verifAncho];
    data.push(dataRow);
  }

  var hot = new Handsontable(container, {
    data: data,
    rowHeaders: true,
    colWidths: 100,
    colHeaders: [
      'Ly (m)',
      'hm (m)',
      'Ly calculado (m)',
      'Verificación del ancho efectivo del Ala',
    ],
    columns: [
      { type: 'numeric', readOnly: true },
      { type: 'numeric', readOnly: true },
      { type: 'numeric', readOnly: true },
      { type: 'text', readOnly: true },
    ],
    licenseKey: 'non-commercial-and-evaluation',
  });
}

// Análisis dirección Y
export function diT1Y(
  contenedor,
  solicitaciones,
  tableData1DC,
  dataTable2yDF,
  tableData3DC,
  formData
) {
  var container = contenedor;

  var data = [];
  // Tipo sistema Estructural = Muros Estructurales
  /* var tipoSistema = 6; */

  for (let i = 0; i < 1; i++) {
    var lm = formData.lxDF;
    var hm = tableData1DC[i][4];
    var as = dataTable2yDF[i][9];
    var ads = 0;
    var pu = solicitaciones[i][1];
    var pv = tableData3DC[i][3];
    var c1 =
      (pu * 1000 +
        as * formData.fyDF +
        pv * formData.ezcyDF * 100 * formData.lyDF * 100 * formData.fyDF -
        ads * formData.fyDF) /
      (0.85 * formData.fcDF * formData.ezcyDF * 100 * formData.β1DF +
        2 * pv * formData.ezcyDF * 100 * formData.fyDF);
    var es = 0;
    var c2 = 0;
    var c3 =
      es == 0
        ? 0
        : (formData.ƐcDF * formData.lxDF * 100) / (formData.ƐcDF + es);
    var c = Math.max(c1, c2, c3);
    var gu = 0.2374764;
    var cLimit = (lm / (600 * Math.max(gu / hm, 0.005))) * 100;
    var confinamiento =
      c >= cLimit ? 'Requiere ser confinado' : 'No requiere ser confinado';

    var dataRow = [
      `Piso ${i + 1}`, //  Nivel
      lm, // lm
      hm, // hm
      as,
      ads,
      pu,
      pv,
      c1,
      c2,
      es,
      c3,
      c,
      gu,
      cLimit,
      confinamiento,
    ];
    data.push(dataRow);
  }

  var hot = new Handsontable(container, {
    data: data,
    rowHeaders: true,
    colWidths: 100,
    colHeaders: [
      'lm (m)',
      'hm (m)',
      'As (cm²)',
      "A's (cm²)",
      'Pu (Ton)',
      'pv',
      'c1 (cm)',
      'c2 (cm)',
      'Ɛs',
      'c3 (cm)',
      'c (cm)',
      'δu m)',
      'C limite (cm)',
      'Confinamiento de elemento de borde',
    ],
    columns: [
      { type: 'numeric', readOnly: true }, // 'lm (m)',
      { type: 'numeric', readOnly: true }, // 'lm (m)',
      { type: 'numeric', readOnly: true }, // 'hm acumulado (m)',
      { type: 'numeric', readOnly: true }, // 'hm (m)',
      { type: 'numeric', readOnly: true }, // 'Vua (Ton)',
      { type: 'numeric', readOnly: true }, // 'Mua (Ton.m)',
      { type: 'numeric', readOnly: true }, // 'Cociente',
      { type: 'numeric' }, // 'Mnx (Ton.m)',
      { type: 'numeric' }, // 'Mnx (Ton.m)',
      { type: 'numeric', readOnly: true }, // 'Mnx/Mua',
      { type: 'numeric', readOnly: true }, // 'Vux (Ton)',
      { type: 'numeric' }, // 'hm/lm',
      { type: 'numeric', readOnly: true }, // 'αc',
      { type: 'numeric', readOnly: true }, // 'Vcx máx (Ton)',
    ],
    afterChange: function (changes, source) {
      if (source === 'edit') {
        var hot = this;
        changes.forEach(function (change) {
          /* console.log(change) Devuelve un array con 4 valores, row, col, oldValue, newValue */
          var row = change[0];
          var col = change[1];
          //var oldValue = change[2];
          var newValue = change[3];

          if (col === 7) {
            hot.setDataAtCell(
              row,
              10,
              Math.max(
                hot.getDataAtCell(row, 6),
                hot.getDataAtCell(row, 7),
                hot.getDataAtCell(row, 9)
              )
            );
          }
          if (col === 8) {
            hot.setDataAtCell(
              row,
              9,
              newValue == 0
                ? 0
                : (formData.ƐcDF * formData.lxDF * 100) /
                    (formData.ezcxDF + newValue)
            );
          }
          if (col === 9) {
            hot.setDataAtCell(
              row,
              10,
              Math.max(
                hot.getDataAtCell(row, 6),
                hot.getDataAtCell(row, 7),
                hot.newValue
              )
            );
          }
          if (col === 10) {
            hot.setDataAtCell(
              row,
              13,
              newValue >= hot.getDataAtCell(row, 12)
                ? 'Requiere ser confinado'
                : 'No requiere ser confinado'
            );
          }
          if (col === 11) {
            hot.setDataAtCell(
              row,
              12,
              (hot.getDataAtCell(row, 0) /
                (600 *
                  Math.max(
                    hot.getDataAtCell(row, 11) / hot.getDataAtCell(row, 1),
                    0.005
                  ))) *
                100
            );
          }
          if (col === 12) {
            hot.setDataAtCell(
              row,
              13,
              hot.getDataAtCell(row, 10) >= newValue
                ? 'Requiere ser confinado'
                : 'No requiere ser confinado'
            );
          }
        });
        /* CheckData(); */
      }
    },
    afterPaste: function (data, coords) {
      console.log(data); /* array de filas */
      console.log(coords); /* array con coordenadas de inicio y fin (col-row)*/
      data.forEach(function (rowData, i) {
        var startRow = coords[0].startRow;
        /* var endRow = coords[0].endRow; */
        var startCol = coords[0].startCol;
        var endCol = coords[0].endCol;
        let k = 0;
        for (let j = startCol; j <= endCol; j++) {
          /* console.log('Fila:', startRow + i);
              console.log('Columna:', j);
              console.log('Dato:', rowData[k]);
              console.log('indice' + k); */
          hot.setDataAtCell(startRow + i, j, rowData[k]);
          k++;
        }
      });
    },
    licenseKey: 'non-commercial-and-evaluation',
  });

  document
    .getElementById('saveDataBtnDI1Y')
    .addEventListener('click', CheckData);

  function CheckData() {
    tableDI1Y = hot.getData();

    var contenedor = document.getElementById('diT2Y');
    diT2Y(contenedor, solicitaciones, tableData1DC, dataTable2yDF, formData);
    var contenedor2 = document.getElementById('diT3Y');
    diT3Y(contenedor2, formData);
  }
}

//Tabla Análisis en Dirección "2 y"
function diT2Y(
  contenedor,
  solicitaciones,
  tableData1DC,
  dataTable2yDF,
  formData
) {
  var container = contenedor;

  var data = [];

  for (let i = 0; i < 1; i++) {
    var zc = formData.zcyDF;
    var vuMax = tableData1DC[i][11];
    var muMax = solicitaciones[i][3];
    var lomax1 = tableDI1Y[i][0];
    var lomax2 = 0.25 * (muMax / vuMax);
    var lomax = Math.max(lomax1, lomax2);
    var zcmax1 = Math.max(tableDI1Y[i][10] / 100 - 0.1 * tableDI1Y[i][0], 0);
    var zcmax2 = tableDI1Y[i][10] / 2 / 100;
    var zcmax = Math.max(zcmax1, zcmax2);
    var verifEspesor = zc > zcmax ? 'Sí cumple' : 'No cumple, verificar';
    var s1 = 10 * dataTable2yDF[i][2];
    var s2 = Math.min(formData.zcyDF, formData.ezcyDF) * 100;
    var s3 = 25;
    var s = Math.floor(Math.min(s1, s3) / 2.5) * 2.5;

    var dataRow = [
      zc,
      vuMax,
      muMax,
      lomax1,
      lomax2,
      lomax,
      zcmax1,
      zcmax2,
      zcmax,
      verifEspesor,
      s1,
      s2,
      s3,
      s,
    ];
    data.push(dataRow);
  }

  var hot = new Handsontable(container, {
    data: data,
    rowHeaders: true,
    colWidths: 100,
    colHeaders: [
      'zc (m)',
      'Vu máx (Ton)',
      'Mu máx (Ton.m)',
      'Lo máx 1 (m)',
      'Lo máx 2 (m)',
      'Lo máx (m)',
      'zcmáx 1 (m)',
      'zcmáx 2 (m)',
      'zcmáx (m)',
      'Artículo 21.9.7.6.a. Verificación del Espesor de la Zona de Confinamiento',
      's1 (cm)',
      's2 (cm)',
      's3 (cm)',
      's (cm)',
    ],
    columns: [
      { type: 'numeric', readOnly: true },
      { type: 'numeric', readOnly: true },
      { type: 'numeric', readOnly: true },
      { type: 'numeric', readOnly: true },
      { type: 'numeric', readOnly: true },
      { type: 'numeric', readOnly: true },
      { type: 'numeric', readOnly: true },
      { type: 'numeric', readOnly: true },
      { type: 'numeric', readOnly: true },
      { type: 'text', readOnly: true },
      { type: 'numeric', readOnly: true },
      { type: 'numeric', readOnly: true },
      { type: 'numeric', readOnly: true },
      { type: 'numeric', readOnly: true },
    ],
    licenseKey: 'non-commercial-and-evaluation',
  });
}

//Tabla Análisis en Dirección "3y"
function diT3Y(contenedor, formData) {
  var container = contenedor;

  var data = [];

  for (let i = 0; i < 1; i++) {
    var lx = formData.lxDF;
    var hm = tableDI1Y[i][1];
    var lyCal = 0.1 * hm;
    var verifAncho =
      lx <= lyCal
        ? 'Diseñar con ala completa'
        : 'Diseñar solo con ancho efectivo del ala';
    var dataRow = [lx, hm, lyCal, verifAncho];
    data.push(dataRow);
  }

  var hot = new Handsontable(container, {
    data: data,
    rowHeaders: true,
    colWidths: 100,
    colHeaders: [
      'Lx (m)',
      'hm (m)',
      'Ly calculado (m)',
      'Verificación del ancho efectivo del Ala',
    ],
    columns: [
      { type: 'numeric', readOnly: true },
      { type: 'numeric', readOnly: true },
      { type: 'numeric', readOnly: true },
      { type: 'text', readOnly: true },
    ],
    licenseKey: 'non-commercial-and-evaluation',
  });
}

export function diagramI(solicitacionesVarios) {
  
}