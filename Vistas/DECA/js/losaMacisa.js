document.addEventListener('DOMContentLoaded', function () {
  /* Variables globales */
  var fy = 0;
  var fc = 0;
  var t = 0;
  var b = 0;
  var mu = 0;
  var d = 0;

  var asFinal = 0;

  /* Valores iniciales del select */
  var barras = 1;
  var asSelect = 2.85 * barras;
  var resDA = 21.0;
  var textSelect = '3/4"';

  // Formulario
  var form = document.getElementById('datosForm');

  // Event listener para el evento 'submit'
  form.addEventListener('submit', function (event) {
    // Evita que el formulario se envíe de forma predeterminada
    event.preventDefault();

    // Valores form
    fy = parseFloat(document.getElementById('fy').value); // kg/m²
    fc = parseFloat(document.getElementById('fdc').value); // kg/m²
    t = parseFloat(document.getElementById('t').value); // cm
    b = parseFloat(document.getElementById('b').value); // cm
    mu = parseFloat(document.getElementById('mu').value); // kg-cm

    document.getElementById('fyVal').innerHTML = `${fy.toFixed(2)} kg/cm²`;
    document.getElementById('fcVal').innerHTML = `${fc.toFixed(2)} kg/cm²`;
    document.getElementById('tVal').innerHTML = `${t.toFixed(2)} cm`;
    document.getElementById('bVal').innerHTML = `${b.toFixed(2)} cm`;
    document.getElementById('muVal').innerHTML = `${mu.toFixed(2)} kg-cm`;
    // corte val
    var phivc = 0;
    var reqData = document.getElementById("reqData");
    reqData.style.display = 'block';

    /* var resultado = inputValue * 2; */
    realizarCalculos();
  });

  function realizarCalculos() {
    var resultDC = '';
    var resultDF = '';
    /* const diametroBarraRefuerzo = 1.27; // cm (№5) */
    /*  const recMinimo = 2.5; // cm (según ACI 318) */
    /* const rec = diametroBarraRefuerzo / 2 + recMinimo; */
    // rec = 1.27 / 2 + 2.5 = 3.135 cm
    /* distancia efectiva "d" */
    d = t - 3;

    /* Diseño por flexión */
    function flexDesing() {
      // Convertir unidades
      const Fy_kg_cm2 = fy / 10000; // Convertir de kg/m² a kg/cm²
      const fc_kg_cm2 = fc / 10000; // Convertir de kg/m² a kg/cm²
      const Mu_kg_m = mu / 100; // Convertir de kg-cm a kg-m

      // Calcular cuantía de refuerzo (ρ_min)
      /* const rho_min = (0.7 * Math.sqrt(fc_kg_cm2)) / Fy_kg_cm2; // Porcentaje */
      const rho_min = (0.7 * Math.sqrt(fc)) / fy; // Porcentaje

      // Calcular cuantía de refuerzo (ρ)
      const rho = Mu_kg_m / (0.85 * Fy_kg_cm2 * b * t); // Porcentaje

      // Calcular área total de refuerzo (As)
      /* const As = rho * b * t; // cm² */
      const Asmin = rho_min * b * d;

      /* const a = (As * fy) / (0.85 * fc * b); */
      var a =
        d - Math.pow(Math.pow(d, 2) - (2 * mu) / (0.85 * 0.9 * fc * b), 0.5);
      var As = mu / (0.9 * fy * (d - a / 2));

      asFinal = Math.max(As, Asmin);

      /* Método ecuación cuadrática φ = 0.90  */
      /* Para el caso del diseño por flexión de losas macizas en una dirección, sin carga axial, el valor típico utilizado es: φ = 0.90 */
      /* As = (Mu / (φ * Fy * (d - a/2))) * b */
      /* a = As * Fy / (0.85 * f'c * b) */
      //(en tu caso, a = 1.55 cm)

      resultDF = `<table class="table">
    <thead style="font-size: 13px; background-color: #4e5c77; color:white">
      <tr>
        <th scope="row" colspan="2">
          2. DISEÑO POR FLEXIÓN
        </th>
        <th scope="row">
          FÓRMULA
        </th>
        <th scope="row">
          RESULTADO
        </th>
      </tr>
    </thead>
    <tbody style=" font-size: 11px;">
    <tr>
    <th scope="row">
      
    </th>
    <th scope="row">
      d
    </th>
    <th scope="row">
      t - 3
    </th>
    <th scope="row">
      ${d} cm
    </th>
    </tr>  
    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
        <td scope="row" colspan="4">
          2.1. Cuantías
        </td>
      </tr>
      <tr>
        <td scope="row">
          Cuantía
        </td>
        <td scope="row">
        ρMin
        </td>
        <td scope="row">
        0.7(f'v)^0.5/Fy
        </td>
        <td scope="row" colspan="">
        ${rho_min.toFixed(4) * 100}
        </td>
      </tr>
      <tr>
        <td>Áreas</td>
        <td>​</td>
        <td>ρMin * b * d​</td>
        <td>${Asmin.toFixed(2)} cm²​</td>
      </tr>
      <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
        <td scope="row" colspan="2">
          2.2. CÁLCULO DEL ÁREA
        </td>
        <td scope="row" colspan="2">
          (MÉTODO CUADRÁTICO)
        </td>
      </tr>      
      <tr>
        <td> </td>
        <td>a</td>
        <td>d - (d² - (2 * mu) / (0.85 * 0.9 * fc * b))^0.5</td>
        <td>${a.toFixed(2)} cm</td>
      </tr>
      <tr>
        <td></td>
        <td>As</td>
        <td>mu / (0.9 * fy * (d - a / 2))</td>
        <td>${As.toFixed(2)} cm²</td>
      </tr>
      <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
        <td scope="row" colspan="4">
          2.3. VERIFICACIÓN
        </td>
      </tr>
      <tr>
        <td> </td>
        <td>Asmin</td>
        <td>(condicional)</td>
        <td>${As > Asmin ? 'OK' : 'NO'}</td>
      </tr>
      <tr>
        <td> </td>
        <td>As</td>
        <td>max(Asmin, As)</td>
        <td>${asFinal.toFixed(2)} cm²/m</td>
      </tr>
      <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
        <td scope="row" colspan="4">
          2.4. DISTRIBUCIÓN DEL ACERO
        </td>
      </tr>
      <tr>
        <td>Área del acero a usar</td>
        <td></td>
        <td>Seleccione</td>
        <td>
          <select id="areaAcero" name="areaAcero">
            <option value="0.28">6mm</option>
            <option value="0.5">8mm</option>
            <option value="0.71">3/8"</option>
            <option value="1.13">12mm</option>
            <option value="1.29">1/2"</option>
            <option value="2">6/8"</option>
            <option value="2.85" selected>3/4"</option>
            <option value="5.07">1"</option>
            <option value="10.06">1 3/8"</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>Cantidad de barras</td>
        <td></td>
        <td>Ingrese valor</td>
        <td>
          <input
            type="number"
            id="barras"
            name="barras"
            placeholder="barras"
            value="1"
          /> barra(s)
        </td>
      </tr>
      <tr>
        <td></td>
        <td>As</td>
        <td>áreaAcero * cantidad barras</td>
        <td id="asC">${asSelect} cm²</td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td id="sepA">@${resDA}</td>
      </tr>
      <tr>
        <td>Entonces</td>          
        <td></td>          
        <td></td>
        <td id="then">${barras} Φ ${textSelect} @ ${resDA}</td>        
      </tr>
    </tbody>
  </table>`;
      document.getElementById('resultados').innerHTML = resultDF;
      selectChange();
      inputChange();
    }
    flexDesing();

    /* Diseño por corte */
    function cutDesign() {
      var vu = 5;
      var vc = (0.53 * d * b * Math.sqrt(fc)) / 1000;
      phivc = 0.85 * vc;

      var verif2 = phivc > vu ? 'OK' : 'ESTÁ MAL';

      var areaAcero2Value = 0.28;
      var e = 5;
      var as2 = 0.0018 * e * 100;
      var seo = (areaAcero2Value * 100) / as2 > 25 ? 25 : areaAcero2Value / as2;

      resultDC = `<table class="table">
      <thead style="font-size: 13px; background-color: #4e5c77; color:white">
      <tr>
        <th scope="row" colspan="2">
          3. DISEÑO POR CORTE
        </th>
        <th scope="row">
          FÓRMULA
        </th>
        <th scope="row">
          RESULTADO
        </th>
      </tr>
    </thead>
      <tbody style=" font-size: 11px;">
        <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
          <td scope="row" colspan="4">
            3.1. CALCULAR CORTE A UNA DISTANCIA
          </td>
        </tr>        
        <tr>
          <th scope="row">
            
          </th>
          <th scope="row">
            d
          </th>
          <th scope="row">
            t - 3
          </th>
          <th scope="row">
            ${d} cm
          </th>
        </tr>  
        <tr>
          <td></td>
          <td>Vu</td>
          <td>Ingrese valor</td>
          <td>
          <input
          type="number"
          id="vuin"
          name="vuin"
          value="5"/> tn
          ​</td>          
        </tr>
        <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
          <td scope="row" colspan="4">
            3.2. APORTE DEL CONCRETO
          </td>
        </tr>        
        <tr>
          <td></td>
          <td>Vc</td>
          <td>(0.53 * d * b * (f'c)^0.5) / 1000</td>
          <td>${vc.toFixed(2)} tn</td>
        </tr>
        <tr>
          <td></td>
          <td>ΦVc</td>
          <td>0.85 * vc</td>
          <td>${phivc.toFixed(2)} tn</td>
        </tr>
        <tr>
          <td>Verificamos</td>
        </tr>
        <tr>
          <td></td>
          <td>Vc &gt; Vu</td>
          <td></td>
          <td class="upperCase" id="rverif2">${verif2}</td>
        </tr>
        <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
          <td scope="row" colspan="4">
            3.3. ACERO MÍNIMO POR TEMPERATURA
          </td>
        </tr>
        <tr>
          <td>Estribo a usar</td>
          <td>Seleccione</td>
          <td>
            <select id="areaAcero2" name="areaAcero2">
              <option value="0.28" selected>6mm</option>
              <option value="0.5">8mm</option>
              <option value="0.71">3/8"</option>
              <option value="1.13">12mm</option>
              <option value="1.29">1/2"</option>
              <option value="2">6/8"</option>
              <option value="2.85">3/4"</option>
              <option value="5.07">1"</option>
              <option value="10.06">1 3/8"</option>
            </select>
          </td>
          <td id="areaA2Text">
            ${areaAcero2Value} cm²
          </td>
        </tr>
        <tr>
          <td></td>
          <td>e</td>
          <td>Seleccione</td>
          <td>
          <input
          type="number"
          id="ein"
          name="ein"
          value="5"/> cm²
          </td>          
        </tr>        
        <tr>
          <td></td>
          <td>As</td>
          <td>0.0018 * e * 100</td>
          <td id="asT">${as2.toFixed(2)} cm²</td>
        </tr>        
        <tr>
          <td>Separación entre barras</td>
          <td>S</td>
          <td>(condicional)</td>
          <td id="seo">${seo} cm</td>
        </tr>
      </tbody>
    </table>`;
      document.getElementById('resultados2').innerHTML = resultDC;

      selectChange2();
      inputChange2();
      inputChangeVu();
    }
    cutDesign();

    // Mostrar los resultados
  }

  // Ocultar/Mostrar el formulario y ajustar el tamaño de las columnas
  function ocultarForm() {
    const toggleFormButton = document.getElementById('toggleFormButton');
    const formContainer = document.getElementById('formContainer');
    const formColumn = document.getElementById('formColumn');
    const toggleIcon = toggleFormButton.querySelector('i');

    toggleFormButton.addEventListener('click', function () {
      formContainer.style.display =
        formContainer.style.display === 'none' ? 'block' : 'none';
      formColumn.classList.toggle('col-md-3');
      formColumn.classList.toggle('col-md-1');
      toggleIcon.classList.toggle('fa-chevron-left');
      toggleIcon.classList.toggle('fa-chevron-right');
    });
  }
  ocultarForm();

  const selectChange = () => {
    var areaAcero = document.getElementById('areaAcero');
    areaAcero.addEventListener('change', function (e) {
      // select value
      var value = parseFloat(this.value);
      textSelect = this.options[this.selectedIndex].text;
      // input cantidad value
      var barras = parseInt(document.getElementById('barras').value);
      asSelect = value * barras;
      resDA = Math.round((asSelect * b) / asFinal);

      var asC = document.getElementById('asC');
      asC.innerHTML = `${asSelect} cm²`;
      var sepA = document.getElementById('sepA');
      sepA.innerHTML = `@ ${resDA}`;

      document.getElementById(
        'then'
      ).innerHTML = `${barras} Φ ${textSelect} @ ${resDA}`;
    });
  };

  function inputChange() {
    var barras = document.getElementById('barras');
    barras.addEventListener('input', function (e) {
      // input value
      var value = parseInt(this.value);
      var select = document.getElementById('areaAcero');
      // select value
      var selectValue = parseFloat(select.value);
      textSelect = select.options[select.selectedIndex].text;

      asSelect = value * selectValue;
      var asC = document.getElementById('asC');
      asC.innerHTML = `${asSelect} cm²`;
      
      resDA = Math.round((asSelect * b) / asFinal);
      var sepA = document.getElementById('sepA');
      sepA.innerHTML = `@ ${resDA}`;

      document.getElementById(
        'then'
      ).innerHTML = `${value} Φ ${textSelect} @ ${resDA}`;
    });
  }

  function selectChange2() {
    var areaAcero = document.getElementById('areaAcero2');
    areaAcero.addEventListener('change', function (e) {
      // select value
      var value = parseFloat(this.value);
      // input cantidad value
      var e = parseFloat(document.getElementById('ein').value);
      var as2 = 0.0018 * e * 100;

      var asC = document.getElementById('asT');
      asC.innerHTML = `${as2.toFixed(2)} cm²`;
      
      var areaA2Text = document.getElementById('areaA2Text');
      areaA2Text.innerHTML = `${value} cm²`;

      document.getElementById('seo').innerHTML = `${
        (value * 100) / as2 > 25 ? 25 : (value / as2).toFixed(2)
      } cm`;
    });
  }

  function inputChange2() {
    var e = document.getElementById('ein');
    e.addEventListener('input', function (e) {
      // input value
      var value = parseInt(this.value);
      var as2 = 0.0018 * value * 100;

      var asC = document.getElementById('asT');
      asC.innerHTML = `${as2.toFixed(2)} cm²` ;

      var select = document.getElementById('areaAcero2');
      // select value
      var selectValue = parseFloat(select.value);

      document.getElementById('seo').innerHTML = `${
        (selectValue * 100) / as2 > 25 ? 25 : (selectValue / as2).toFixed(2)
      } cm`;
    });
  }

  function inputChangeVu() {
    var vu = document.getElementById('vuin');
    vu.addEventListener('input', function (e) {
      // input value
      var value = parseInt(this.value);

      var verif2 = phivc > value ? 'OK' : 'ESTÁ MAL';

      var rverif2 = document.getElementById('rverif2');
      rverif2.innerHTML = verif2;
    });
  }
});
