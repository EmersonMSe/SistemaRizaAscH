$(document).ready(function () {
  var datacol1 = [
    ["CM", 14.8, 5.61, 12.45],
    ["CV", 1.15, 0.59, 5],
    ["CSx", 3.96, 5.33, 0],
    ["CSy", 9.97, 0, 37.31],
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
    ["CM", 21.32, 3.09, 0.74],
    ["CV", 3.96, 0.81, 0.14],
    ["CSx", 0.86, 0.05, 0],
    ["CSy", 0.28, 0, 0.11],
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
        
      })
      .catch((error) => {
        console.error("Error al enviar la solicitud Ajax", error);
      });
  });
});
