import {
  solicitudCargaT1,
  solicitudCargaDT2,
} from './placasFormaL/solicitudCarga.js';

import {
  formDisplay,
  flexDesignT1X,
  flexDesignT1Y,
  dataTable2x,
  dataTable2y,
} from './placasFormaL/flexDesign.js';

import {
  tableData1,
  tableData1Y,
  tableData2,
  tableData3,
  tableData3Y,
  cutDesignT1X,
  cutDesignT1Y,
} from './placasFormaL/cutDesign.js';

import { diT1X, diT1Y, diagramI } from './placasFormaL/diagramaI.js';
import { vaT1X, vaT1Y } from './placasFormaL/agrietamiento.js';
import { dcpT1X, dcpT1Y } from './placasFormaL/pureCompressionDesign.js';
import { ddT1X /* ddT1Y */ } from './placasFormaL/deslizamiento.js';
import { elT1 } from './placasFormaL/efectoLocal.js';

document.addEventListener('DOMContentLoaded', function () {
  var coll = document.getElementsByClassName('collapsible-btn');
  var i;

  for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener('click', function () {
      var targetId = this.getAttribute('data-target');
      var content = document.getElementById(targetId);

      if (content) {
        content.classList.toggle('d-none');
      }
    });
  }
  var formDataObject = {};

  var medidaAcero = [
    {
      diametro: 6,
      areaNominal: 0.28,
      diametroCm: 0.6,
      pesoNominal: 0.222,
      pesoMinimo: 0.207,
    },
    {
      diametro: 8,
      areaNominal: 0.5,
      diametroCm: 0.8,
      pesoNominal: 0.395,
      pesoMinimo: 0.371,
    },
    {
      diametro: "ø3/8''",
      areaNominal: 0.71,
      diametroCm: 0.95,
      pesoNominal: 0.56,
      pesoMinimo: 0.526,
    },
    {
      diametro: 12,
      areaNominal: 1.13,
      diametroCm: 1.2,
      pesoNominal: 0.888,
      pesoMinimo: 0.835,
    },
    {
      diametro: "ø1/2''",
      areaNominal: 1.29,
      diametroCm: 1.27,
      pesoNominal: 0.994,
      pesoMinimo: 0.934,
    },
    {
      diametro: "ø5/8''",
      areaNominal: 2.0,
      diametroCm: 1.59,
      pesoNominal: 1.552,
      pesoMinimo: 1.459,
    },
    {
      areaNominal: 2.84,
      diametroCm: 1.9,
      pesoNominal: 2.235,
      pesoMinimo: 2.101,
    },
    {
      diametro: "ø7/8''",
      areaNominal: 3.87,
      diametroCm: 2.22,
    },
    {
      diametro: "ø1''",
      areaNominal: 5.1,
      diametroCm: 2.54,
      pesoNominal: 3.973,
      pesoMinimo: 3.735,
    },
    {
      diametro: "ø1 3/8''",
      areaNominal: 10.06,
      diametroCm: 3.49,
      pesoNominal: 7.907,
      pesoMinimo: 7.433,
    },
  ];

  var factorØ = [
    {
      description: 'Flexión',
      value: 0.9,
    },
    {
      description: 'Flexo - Compresión Normal',
      value: 0.75,
    },
    {
      description: 'Flexo - Compresión en Resorte',
      subDescription: 'Sección en Resorte',
      value: 0.7,
    },
    {
      description: 'Corte',
      value: 0.85,
    },
  ];

  var factorβ = [
    {
      description: '280',
      value: 0.85,
    },
    {
      description: '350',
      value: 0.8,
    },
    {
      description: '420',
      value: 0.75,
    },
    {
      description: '490',
      value: 0.7,
    },
    {
      description: '560',
      value: 0.65,
    },
  ];

  var factorμ = [
    {
      description: '1',
      value: 1,
    },
    {
      description: '2',
      value: 2,
    },
    {
      description: '3',
      value: 3,
    },
    {
      description: '4',
      value: 4,
    },
  ];

  // Solicitaciones de carga contenedor de la tabla 1
  var contenedor1 = document.getElementById('solicitudCargaT1');
  solicitudCargaT1(contenedor1);

  // Unique form to be used for all sheets
  // Form Element, if a input change it will update other inputs related, it create the form and add its functionality
  var exDF = 0.3;
  var eyDF = 0.3;
  var lxDF = 6;
  var lyDF = 6;
  var dxDF = 0.8 * lxDF;
  var dyDF = 0.8 * lyDF;
  var zCxDF = 1.2;
  var zCyDF = 1.2;
  var ezcxDF = 0.3;
  var ezcyDF = 0.3;
  var lnucxDF = lxDF - 2 * zCxDF;
  var lnucyDF = lyDF - 2 * zCyDF;

  var fcDF = 280;
  var fyDF = 4200;
  var generalSelect = 0.9;
  var ecDF = 1500 * Math.sqrt(fcDF);
  var esDF = 2.1 * Math.pow(10, 6);
  var ƐcDF = 0.003;
  var β1DF =
    fcDF <= 280
      ? 0.85
      : fcDF <= 350
      ? 0.8
      : fcDF <= 420
      ? 0.75
      : fcDF <= 490
      ? 0.7
      : 0.65;

  var formDF = `<form id="generalForm" class="mt-2" method="post">
      <h5 class="text-center"><strong>Propiedades Geométricas</strong><button type="button" id="toggleButton" style="border: none; background: none;"><i class="fas fa-eye"></i></button></h5>
      <div class="contenedor mb-5" id="contenedor_dcc">
          <div class="col-md-12 mx-auto text-center">
              <label for="exDF">ex</label>
              <div class="input-group mb-2">
                  <input type="number" name="exDF" class="form-control text-center" id="exDF" placeholder="0.30" min="0" value="0.3" step="any" required>
                  <div class="input-group-append">
                      <span class="input-group-text">m</span>
                  </div>
              </div>
          </div>
          <div class="col-md-12 mx-auto text-center">
              <label for="eyDF">ey</label>
              <div class="input-group mb-2">
                  <input type="number" name="eyDF" class="form-control text-center" id="eyDF" placeholder="0.30" min="0" value="0.3" step="any" required>
                  <div class="input-group-append">
                      <span class="input-group-text">m</span>
                  </div>
              </div>
          </div>
          <div class="col-md-12 mx-auto text-center">
              <label for="lxDF">Lx</label>
              <div class="input-group mb-2">
                  <input type="number" name="lxDF" class="form-control text-center" id="lxDF" placeholder="6" min="0" step="any" value="6" required>
                  <div class="input-group-append">
                      <span class="input-group-text">m</span>
                  </div>
              </div>
          </div>
          <div class="col-md-12 mx-auto text-center">
              <label for="lyDF">Ly</label>
              <div class="input-group mb-2">
                  <input type="number" name="lyDF" class="form-control text-center" id="lyDF" placeholder="6" min="0" step="any" value="6" required>
                  <div class="input-group-append">
                      <span class="input-group-text">m</span>
                  </div>
              </div>
          </div>
          <div class="col-md-12 mx-auto text-center">
              <label for="dxDF">dx</label>
              <div class="input-group mb-2">
                  <input type="number" name="dxDF" class="form-control text-center" id="dxDF" placeholder="4.8" min="0" step="any" value="4.8" required>
                  <div class="input-group-append">
                      <span class="input-group-text">m</span>
                  </div>
              </div>
          </div>
          <div class="col-md-12 mx-auto text-center">
              <label for="dyDF">dy</label>
              <div class="input-group mb-2">
                  <input type="number" name="dyDF" class="form-control text-center" id="dyDF" placeholder="4.8" min="0" step="any" value="4.8" required>
                  <div class="input-group-append">
                      <span class="input-group-text">m</span>
                  </div>
              </div>
          </div>
          <div class="col-md-12 mx-auto text-center">
              <label for="zCxDF">zCx</label>
              <div class="input-group mb-2">
                  <input type="number" name="zCxDF" class="form-control text-center" id="zCxDF" placeholder="1.20" min="0" step="any" value="1.2" required>
                  <div class="input-group-append">
                      <span class="input-group-text">m</span>
                  </div>
              </div>
          </div>
          <div class="col-md-12 mx-auto text-center">
              <label for="zCyDF">zCy</label>
              <div class="input-group mb-2">
                  <input type="number" name="zCyDF" class="form-control text-center" id="zCyDF" placeholder="1.20" min="0" step="any" value="1.2" required>
                  <div class="input-group-append">
                      <span class="input-group-text">m</span>
                  </div>
              </div>
          </div>
          <div class="col-md-12 mx-auto text-center">
              <label for="ezcxDF">ezcx</label>
              <div class="input-group mb-2">
                  <input type="number" name="ezcxDF" class="form-control text-center" id="ezcxDF" placeholder="0.30" min="0" step="any" value="0.3" required>
                  <div class="input-group-append">
                      <span class="input-group-text">m</span>
                  </div>
              </div>
          </div>
          <div class="col-md-12 mx-auto text-center">
              <label for="ezcyDF">ezcy</label>
              <div class="input-group mb-2">
                  <input type="number" name="ezcyDF" class="form-control text-center" id="ezcyDF" placeholder="0.30" min="0" step="any" value="0.3" required>
                  <div class="input-group-append">
                      <span class="input-group-text">m</span>
                  </div>
              </div>
          </div>
          <div class="col-md-12 mx-auto text-center">
              <label for="lnucxDF">Lnúcleo x</label>
              <div class="input-group mb-2">
                  <input type="number" name="lnucxDF" class="form-control text-center" id="lnucxDF" placeholder="3.60" min="0" step="any" value="3.6" required>
                  <div class="input-group-append">
                      <span class="input-group-text">m</span>
                  </div>
              </div>
          </div>
          <div class="col-md-12 mx-auto text-center">
              <label for="lnucyDF">Lnúcleo y</label>
              <div class="input-group mb-2">
                  <input type="number" name="lnucyDF" class="form-control text-center" id="lnucyDF" placeholder="3.60" min="0" step="any" value="3.6" required>
                  <div class="input-group-append">
                      <span class="input-group-text">m</span>
                  </div>
              </div>
          <div class="col-md-12 mx-auto text-center d-none">
              <label for="acwxDC">Acwx</label>
              <div class="input-group mb-2">
                  <input type="number" name="acwxDC" class="form-control text-center" id="acwxDC" placeholder="1.44" min="0" step="any" value="1.44" required>
                  <div class="input-group-append">
                      <span class="input-group-text">m²</span>
                  </div>
              </div>
          <div class="col-md-12 mx-auto text-center d-none">
              <label for="acwyDC">Acwy</label>
              <div class="input-group mb-2">
                  <input type="number" name="acwyDC" class="form-control text-center" id="acwyDC" placeholder="1.44" min="0" step="any" value="1.44" required>
                  <div class="input-group-append">
                      <span class="input-group-text">m²</span>
                  </div>
              </div>
          </div>
      </div>
      <h5 class="text-center"><strong>Propiedades Mecánicas</strong><button type="button" id="calccargars" style="border: none; background: none;"><i class="fas fa-eye"></i></button></h5>
      <div class="contenedor_cc" id="contenedor_cc">
          <div class="col-md-12 mx-auto text-center">
              <label for="fcDF">f'c</label>
              <div class="input-group mb-2">
                  <input type="number" name="fcDF" class="form-control text-center" id="fcDF" placeholder="280" min="0" step="any" value="280">
                  <div class="input-group-append">
                      <span class="input-group-text">kg/cm²</span>
                  </div>
              </div>
          </div>
          <div class="col-md-12 mx-auto text-center">
              <label for="fyDF">fy</label>
              <div class="input-group mb-2">
                  <input type="number" name="fyDF" class="form-control text-center" id="fyDF" placeholder="4200" min="0" step="any" value="4200">
                  <div class="input-group-append">
                      <span class="input-group-text">kg/cm²</span>
                  </div>
              </div>
          </div>
          <div class="col-md-12 mx-auto text-center">
              <label for="generalSelect">Diseño</label>
              <div class="input-group mb-2">
                  <select name="generalSelect" id="generalSelect" class="form-control text-center">
                      <option value="0.9" selected>Flexión</option>
                      <option value="0.75">Flexo - Comprensión Normal</option>
                      <option value="0.7">Columna con Estribos</option>
                      <option value="0.75">Columna con Espirales</option>
                      <option value="0.85">Corte</option>
                      <option value="1">Agrietamiento</option>
                      <option value="2">Compresión</option>
                      <option value="3">Deslizamiento</option>
                      <option value="4">Carga Puntual</option>
                      <option value="0">Integración</option>
                  </select>
              </div>
              <div id="generalSelectText">Ø ${generalSelect}</div>
          </div>
          <div class="col-md-12 mx-auto text-center d-none">
              <div class="input-group mb-2">
                  <input type="number" name="designDF" class="form-control text-center" id="designDF" min="0" step="any" value="0.9">
              </div>
          </div>
          <div class="col-md-12 mx-auto text-center d-none">
              <label for="designDC"></label>
              <div class="input-group mb-2">
                  <input type="number" name="designDC" class="form-control text-center" id="designDC" min="0" step="any" value="0.85">
              </div>
          </div>
          <div class="col-md-12 mx-auto text-center d-none">
              <div class="input-group mb-2">
                  <input type="number" name="designDFCN" class="form-control text-center" id="designDFCN" min="0" step="any" value="0.75">
              </div>
          </div>
          <div class="col-md-12 mx-auto text-center d-none">
              <div class="input-group mb-2">
                  <input type="number" name="designDCEst" class="form-control text-center" id="designDCEst" min="0" step="any" value="0.7">
              </div>
          </div>
          <div class="col-md-12 mx-auto text-center d-none">
              <div class="input-group mb-2">
                  <input type="number" name="designDCEsp" class="form-control text-center" id="designDCEsp" min="0" step="any" value="0.75">
              </div>
          </div>
          <div class="col-md-12 mx-auto text-center d-none">
              <div class="input-group mb-2">
                  <input type="number" name="designCP" class="form-control text-center" id="designCP" min="0" step="any" value="0.7">
              </div>
          </div>
          <div class="col-md-12 mx-auto text-center d-none">
              <div class="input-group mb-2">
                  <input type="number" name="agVA" class="form-control text-center" id="agVA" min="0" step="any" value="2.4">
              </div>
          </div>
          <div class="col-md-12 mx-auto text-center d-none">
              <div class="input-group mb-2">
                  <input type="number" name="lgxVA" class="form-control text-center" id="lgxVA" min="0" step="any" value="7.2">
              </div>
          </div>
          <div class="col-md-12 mx-auto text-center d-none">
              <div class="input-group mb-2">
                  <input type="number" name="lgyVA" class="form-control text-center" id="lgyVA" min="0" step="any" value="7.2">
              </div>
          </div>
          <div class="col-md-12 mx-auto text-center">
              <label for="ecDF">Ec</label>
              <div class="input-group mb-2">
                  <input type="number" name="ecDF" class="form-control text-center" id="ecDF" placeholder="${ecDF}" min="0" step="any" value="${ecDF}">
                  <div class="input-group-append">
                      <span class="input-group-text">kg/cm²</span>
                  </div>
              </div>
          </div>
          <div class="col-md-12 mx-auto text-center">
              <label for="esDF">Es</label>
              <div class="input-group mb-2">
                  <input type="number" name="esDF" class="form-control text-center" id="esDF" placeholder="${esDF}" min="0" step="any" value="${esDF}">
                  <div class="input-group-append">
                      <span class="input-group-text">kg/cm²</span>
                  </div>
              </div>
          </div>
          <div class="col-md-12 mx-auto text-center">
              <label for="ƐcDF">Ɛc</label>
              <div class="input-group mb-2">
                  <input type="number" name="ƐcDF" class="form-control text-center" id="ƐcDF" placeholder="${ƐcDF}" min="0" step="any" value="${ƐcDF}">
                  <div class="input-group-append">
                      <span class="input-group-text">-</span>
                  </div>
              </div>
          </div>
          <div class="col-md-12 mx-auto text-center">
              <label for="β1DF">β1</label>
              <div class="input-group mb-2">
                  <input type="number" name="β1DF" class="form-control text-center" id="β1DF" placeholder="${β1DF}" min="0" step="any" value="${β1DF}">
                  <div class="input-group-append">
                      <span class="input-group-text">-</span>
                  </div>
              </div>
          </div>
      </div>                                                
      <!-- Button Submit para Empezar a Diseñar el DOCUMENTO -->
      <div class="col-md-12 mx-auto text-center">
          <div class="d-grid gap-2 col-6 mx-auto">
              <button class="btn btn-primary btn- text-center" type="submit">DISEÑAR</button>
          </div>
      </div>
      </form>`;

  //--------------Diseño por Flexión---------------------

  // form Flex Desing
  var formContainer = document.getElementById('formContainerDF');
  formContainer.innerHTML = formDF;

  //Cambios en el input Lx
  var lxDFElement = document.getElementById('lxDF');
  lxDFElement.addEventListener('input', function (e) {
    document.getElementById('dxDF').value = (
      0.8 * parseFloat(this.value)
    ).toFixed(2);
    document.getElementById('lnucxDF').value = (
      parseFloat(this.value) -
      2 * parseFloat(document.getElementById('zCxDF').value)
    ).toFixed(2);
  });

  //Cambios en el input Ly
  var lyDFElement = document.getElementById('lyDF');
  lyDFElement.addEventListener('input', function (e) {
    document.getElementById('dyDF').value = (
      0.8 * parseFloat(this.value)
    ).toFixed(2);
    document.getElementById('lnucyDF').value = (
      parseFloat(this.value) -
      2 * parseFloat(document.getElementById('zCyDF').value)
    ).toFixed(2);
  });

  var selectFormDF = document.getElementById('generalSelect');
  selectFormDF.addEventListener('change', function (e) {
    document.getElementById('generalSelectText').innerHTML = `Ø ${this.value}`;
    generalSelect = parseFloat(this.value);
    // Colapsar divs que no son seleccionados class="d-none"
    if (generalSelect == 0.85) {
      document.getElementById('acwyDC').classList.remove('d-none');
      document.getElementById('acwxDC').classList.remove('d-none');
    } else {
      document.getElementById('acwyDC').classList.add('d-none');
      document.getElementById('acwxDC').classList.add('d-none');
    }
  });

  //Cambios en el input f'c
  var fcDFElement = document.getElementById('fcDF');
  fcDFElement.addEventListener('input', function (e) {
    document.getElementById('ecDF').value = (
      15000 * Math.sqrt(parseFloat(this.value))
    ).toFixed(2);
    document.getElementById('β1DF').value = (
      parseFloat(this.value) <= 280
        ? 0.85
        : parseFloat(this.value) <= 350
        ? 0.8
        : parseFloat(this.value) <= 420
        ? 0.75
        : parseFloat(this.value) <= 490
        ? 0.7
        : 0.65
    ).toFixed(2);
  });

  formDisplay();

  // LLamada y envío de datos a las funciones exportadas para Diseño por Flexión
  var generalForm = document.getElementById('generalForm');
  generalForm.addEventListener('submit', function (e) {
    e.preventDefault();
    //var canva = document.getElementById('graphDF');
    var formData = new FormData(this);
    var formDataObject = {};
    // Itera sobre todos los pares clave/valor en el objeto FormData
    for (var pair of formData.entries()) {
      formDataObject[pair[0]] = pair[1]; // Guarda cada par clave/valor en el objeto formDataObject
    }
    var sendInsteadDT3 = [
      ['Piso 1', 1445.64, 174.234, 1682.383, 12.576, 23.586],
      ['Piso 2', 1471.7, 133.72, 1207.14, 20.73, 34.19],
      ['Piso 3', 1369.05, 109.83, 900.41, 24.86, 38.96],
      ['Piso 4', 1265.11, 98.09, 695.02, 27.05, 41.4],
      ['Piso 4', 1160.05, 89.92, 548.43, 27.74, 41.88],
    ];
    var filtroTS2 = solicitudCargaDT2.map((subarray) => {
      return [
        subarray[0], // posición 0
        subarray[2], // posición 2
        subarray[5], // posición 5
      ];
    });

    var sendInsteadFiltroTS2 = [
      [1573.00, 15.26, 2.981],
      [1246.4, 608.848, 23.586],
      [1408.222, -583.572, -18.691],
      [1208.982, 1682.383, 9.426],
      [1445.64, -1657.107, -4.531],
      [1246.4, 608.848, 23.586],
      [1408.222, -583.572, -18.691],
      [1208.982, 1682.383, 9.426],
      [1445.64, -1657.107, -4.531],
      [615.518, 601.995, 22.181],
      [777.34, -590.425, -20.096],
      [578.1, 1675.53, 8.021],
      [814.758, -1663.96, -5.936],
      [615.518, 601.995, 22.181],
      [777.34, -590.425, -20.096],
      [578.1, 1675.53, 8.021],
      [814.758, -1663.96, -5.936],
      [1471.699, -12.551, 8.622],
      [1162.94, 417.648, 34.194],
      [1320.915, -438.453, -20.047],
      [1126.251, 1201.523, 16.046],
      [1357.604, -1222.328, -1.899],
      [1162.94, 417.648, 34.194],
      [1320.915, -438.453, -20.047],
      [1126.251, 1201.523, 16.046],
      [1357.604, -1222.328, -1.899],
      [572.978, 423.262, 30.114],
      [730.953, -432.839, -24.126],
      [536.289, 1207.137, 11.967],
      [767.642, -1216.715, -5.979],
      [572.978, 423.262, 30.114],
      [730.953, -432.839, -24.126],
      [536.289, 1207.137, 11.967],
      [767.642, -1216.715, -5.979],
    ];

    if (formDataObject.generalSelect == 0.9) {
      var contenedorX = document.getElementById('flexDesingT1X');
      var contenedorY = document.getElementById('flexDesingT1Y');
      /* flexDesignT1(contenedor, solicitudCargaDT3, formDataObject); */
      flexDesignT1X(contenedorX, sendInsteadDT3, formDataObject);
      flexDesignT1Y(contenedorY, sendInsteadDT3, formDataObject);
      /* flexDesingT1 */
      /* dibujarLine(canva); */
    } else if (formDataObject.generalSelect == 0.85) {
      //--------------Envío de datos (contenedor, solicitaciones de carga, a Diseño por Flexión)---------------------

      //--------------Diseño por Corte---------------------

      // LLamada y envío de datos a las funciones exportadas para Diseño por Corte
      var contenedorX = document.getElementById('cutDesingT1X');
      var contenedorY = document.getElementById('cutDesingT1Y');
      /* flexDesignT1(contenedor, solicitudCargaDT3, formDataObject); */
      cutDesignT1X(contenedorX, sendInsteadDT3, formDataObject);
      cutDesignT1Y(contenedorY, sendInsteadDT3, formDataObject);
      /* flexDesingT1 */
      /* dibujarLine(canva); */
      //--------------Envío de datos (contenedor, solicitaciones de carga, a Diseño por Corte)---------------------
    } else if (formDataObject.generalSelect == 0) {
      //------Envío de datos (contenedor, solicitaciones de carga, a Diagrama de interacción)--------------
      var contenedorX = document.getElementById('diT1X');
      var contenedorY = document.getElementById('diT1Y');
/*       diT1X(
        contenedorX,
        sendInsteadDT3,
        tableData1,
        dataTable2x,
        tableData3,
        formDataObject
      );
      diT1Y(
        contenedorY,
        sendInsteadDT3,
        tableData1Y,
        dataTable2y,
        tableData3Y,
        formDataObject
      ); */
      diagramI(sendInsteadFiltroTS2);
      // diT1Y(contenedorY, sendInsteadDT3, formDataObject);
      //------Envío de datos (contenedor, solicitaciones de carga, a Diagrama de interacción)--------------
    } else if (formDataObject.generalSelect == 1) {
      //------Envío de datos (contenedor, solicitaciones de carga, a Verificación por Agrietamiento)--------------
      var contenedorX = document.getElementById('vaT1X');
      var contenedorY = document.getElementById('vaT1Y');
      vaT1X(contenedorX, sendInsteadDT3, formDataObject);
      vaT1Y(contenedorY, sendInsteadDT3, formDataObject);
      //------Envío de datos (contenedor, solicitaciones de carga, a Verificación por Agrietamiento)--------------
    } else if (formDataObject.generalSelect == 2) {
      //------Envío de datos (contenedor, solicitaciones de carga, a Diseño de de compresión Pura)--------------
      var contenedorX = document.getElementById('dcpT1X');
      var contenedorY = document.getElementById('dcpT1Y');
      dcpT1X(contenedorX, sendInsteadDT3, formDataObject, tableData1);
      dcpT1Y(contenedorY, sendInsteadDT3, formDataObject, tableData1);
      //------Envío de datos (contenedor, solicitaciones de carga, a Diseño de de compresión Pura)--------------
    } else if (formDataObject.generalSelect == 3) {
      //------Envío de datos (contenedor, solicitaciones de carga, a Diseño por Deslizamiento)--------------
      var contenedorX = document.getElementById('ddT1X');
      var contenedorY = document.getElementById('ddT1Y');
      ddT1X(
        contenedorX,
        sendInsteadDT3,
        formDataObject,
        tableData3,
        tableData3Y
      );
      /* ddT1Y(
        contenedorY,
        sendInsteadDT3,
        formDataObject,
        tableData3,
        tableData3Y
      ); */
      //------Envío de datos (contenedor, solicitaciones de carga, a Diseño por Deslizamiento)--------------
    } else if (formDataObject.generalSelect == 4) {
      //------Envío de datos (contenedor, solicitaciones de carga, a Efecto Local -Carga Puntual)--------------
      var contenedor = document.getElementById('elT1');
      elT1(contenedor, formDataObject, tableData1);
      //------Envío de datos (contenedor, solicitaciones de carga, a Efecto Local -Carga Puntual)--------------
    }
  });
});
