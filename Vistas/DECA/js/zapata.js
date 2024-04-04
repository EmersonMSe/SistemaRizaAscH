$(document).ready(function () {
  $("#DataZapata").submit(function (event) {
    event.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "Controladores/DzapataControlador.php",
      data: formData,
      success: function (response) {
        $("#ObtenerResultados").html(response);
      },
    });
  });

  // Función para graficar zapatas y columnas
  function graficar(
    anchoZapata1,
    altoZapata1,
    anchoZapata2,
    altoZapata2,
    anchoColumna1,
    altoColumna1,
    anchoColumna2,
    altoColumna2
  ) {
    // Configura Paper.js
    paper.setup("myCanvas");

    // Define el tamaño del canvas
    var width = 1000;
    var height = 500;
    var espaciadoX = 60;
    var espaciadoY = 40;
    // Dibujar la primera zapata a la izquierda
    var zapata1 = new paper.Path.Rectangle(
      new paper.Rectangle(
        new paper.Point(espaciadoX, espaciadoY),
        new paper.Size(anchoZapata1, altoZapata1)
      )
    );
    zapata1.strokeColor = "black"; // Borde negro
    zapata1.strokeWidth = 2; // Grosor del borde

    // Dibujar la segunda zapata a la derecha
    var zapata2 = new paper.Path.Rectangle(
      new paper.Rectangle(
        new paper.Point(width - anchoZapata2 - espaciadoX, espaciadoY),
        new paper.Size(anchoZapata2, altoZapata2)
      )
    );
    zapata2.strokeColor = "black"; // Borde negro
    zapata2.strokeWidth = 2; // Grosor del borde
    ycolumna1 = altoZapata1 / 2 - altoColumna1 / 2 + espaciadoY;

    // Dibujar la primera columna centrada en la parte izquierda y en la parte superior
    var columna1 = new paper.Path.Rectangle(
      new paper.Rectangle(
        new paper.Point(espaciadoX, ycolumna1),
        new paper.Size(anchoColumna1, altoColumna1)
      )
    );
    columna1.fillColor = "lightgray";
    columna1.strokeColor = "black"; // Borde negro al rectángulo
    columna1.strokeWidth = 2; // Grosor del borde

    xcolumna2 = width - anchoZapata2 / 2 - anchoColumna2 / 2 - espaciadoX;
    ycolumna2 = altoZapata2 / 2 - altoColumna2 / 2 + espaciadoY;

    // Dibujar la segunda columna centrada en la parte derecha y en la parte superior
    var columna2 = new paper.Path.Rectangle(
      new paper.Rectangle(
        new paper.Point(xcolumna2, ycolumna2),
        new paper.Size(anchoColumna2, altoColumna2)
      )
    );
    columna2.fillColor = "lightgray";
    columna2.strokeColor = "black"; // Borde negro al rectángulo
    columna2.strokeWidth = 2; // Grosor del borde

    // linea 1

    xlinea_inicio_1 = espaciadoX + anchoColumna1;
    ylinea_inicio_1 = altoZapata1 / 2 - altoColumna1 / 2 + espaciadoY + 5;
    xlinea_final_1 = width - anchoZapata2 / 2 - anchoColumna2 / 2 - espaciadoX;
    ylinea_final_1 = altoZapata1 / 2 - altoColumna1 / 2 + espaciadoY + 5;

    var startPoint = new paper.Point(xlinea_inicio_1, ylinea_inicio_1);
    var endPoint = new paper.Point(xlinea_final_1, ylinea_final_1);
    var line = new paper.Path.Line(startPoint, endPoint);
    line.strokeColor = "black";
    line.strokeWidth = 2;

    // linea 2
    xlinea_inicio_2 = espaciadoX + anchoColumna1;
    ylinea_inicio_2 =
      altoZapata1 / 2 - altoColumna1 / 2 + espaciadoY - 5 + altoColumna1;
    xlinea_final_2 = width - anchoZapata2 / 2 - anchoColumna2 / 2 - espaciadoX;
    ylinea_final_2 =
      altoZapata1 / 2 - altoColumna1 / 2 + espaciadoY - 5 + altoColumna2;

    var startPoint = new paper.Point(xlinea_inicio_2, ylinea_inicio_2);
    var endPoint = new paper.Point(xlinea_final_2, ylinea_final_2);
    var line = new paper.Path.Line(startPoint, endPoint);
    line.strokeColor = "black";
    line.strokeWidth = 2;

    // texto columna 1
    // Crear un punto de texto en las coordenadas especificadas
    xtextoC1 = espaciadoX + anchoColumna1 / 2 - 15;
    ytextoC1 = altoZapata1 / 2 + altoColumna1 / 2 + espaciadoY + 25;

    var textPoint = new paper.Point(xtextoC1, ytextoC1);
    // Crear un objeto de texto en el punto especificado
    var text = new paper.PointText(textPoint);

    // Establecer el contenido del texto
    text.content = "C-1";

    // Otras propiedades del texto (opcional)
    text.fillColor = "black"; // Color del texto
    text.fontSize = 25; // Tamaño de fuente
    text.fontFamily = "Arial"; // Familia de fuente
    text.fontWeight = "bold"; // Peso de la fuente (opcional)

    // texto columna 2
    // Crear un punto de texto en las coordenadas especificadas
    xtextoC2 = width - anchoZapata2 / 2 - anchoColumna2 / 2 - espaciadoX / 2;
    ytextoC2 = altoZapata1 / 2 + altoColumna1 / 2 + espaciadoY + 25;

    var textPoint = new paper.Point(xtextoC2, ytextoC2);
    // Crear un objeto de texto en el punto especificado
    var text = new paper.PointText(textPoint);

    // Establecer el contenido del texto
    text.content = "C-2";

    // Otras propiedades del texto (opcional)
    text.fillColor = "black"; // Color del texto
    text.fontSize = 25; // Tamaño de fuente
    text.fontFamily = "Arial"; // Familia de fuente
    text.fontWeight = "bold"; // Peso de la fuente (opcional)

    // texto ancho columna 1
    // Crear un punto de texto en las coordenadas especificadas
    xtextoC1 = espaciadoX + anchoColumna1 / 2 - 15;
    ytextoC1 = altoZapata1 / 2 + altoColumna1 / 2 - 10;

    var textPoint = new paper.Point(xtextoC1, ytextoC1);
    // Crear un objeto de texto en el punto especificado
    var text = new paper.PointText(textPoint);

    // Establecer el contenido del texto
    text.content = "." + anchoColumna1;

    // Otras propiedades del texto (opcional)
    text.fillColor = "black"; // Color del texto
    text.fontSize = 25; // Tamaño de fuente
    text.fontFamily = "Arial"; // Familia de fuente
    text.fontWeight = "bold"; // Peso de la fuente (opcional)

    // texto ancho columna 2
    // Crear un punto de texto en las coordenadas especificadas
    xtextoC2 = width - anchoZapata2 / 2 - anchoColumna2 / 2 - espaciadoX / 2;
    ytextoC2 = altoZapata1 / 2 + altoColumna1 / 2 - 10;

    var textPoint = new paper.Point(xtextoC2, ytextoC2);
    // Crear un objeto de texto en el punto especificado
    var text = new paper.PointText(textPoint);

    // Establecer el contenido del texto
    text.content = "." + anchoColumna2;

    // Otras propiedades del texto (opcional)
    text.fillColor = "black"; // Color del texto
    text.fontSize = 25; // Tamaño de fuente
    text.fontFamily = "Arial"; // Familia de fuente
    text.fontWeight = "bold"; // Peso de la fuente (opcional)

    // texto alto columna 1
    // Crear un punto de texto en las coordenadas especificadas
    xtextoC1 = 5;
    ytextoC1 = altoZapata1 / 2 + espaciadoY + 10;

    var textPoint = new paper.Point(xtextoC1, ytextoC1);
    // Crear un objeto de texto en el punto especificado
    var text = new paper.PointText(textPoint);

    // Establecer el contenido del texto
    text.content = "." + altoColumna1;

    // Otras propiedades del texto (opcional)
    text.fillColor = "black"; // Color del texto
    text.fontSize = 25; // Tamaño de fuente
    text.fontFamily = "Arial"; // Familia de fuente
    text.fontWeight = "bold"; // Peso de la fuente (opcional)

    // texto alto columna 2
    // Crear un punto de texto en las coordenadas especificadas
    xtextoC2 = width - anchoZapata2 / 2 - 10;
    ytextoC2 = altoZapata2 / 2 + espaciadoY + 10;

    var textPoint = new paper.Point(xtextoC2, ytextoC2);
    // Crear un objeto de texto en el punto especificado
    var text = new paper.PointText(textPoint);

    // Establecer el contenido del texto
    text.content = "." + altoColumna2;

    // Otras propiedades del texto (opcional)
    text.fillColor = "black"; // Color del texto
    text.fontSize = 25; // Tamaño de fuente
    text.fontFamily = "Arial"; // Familia de fuente
    text.fontWeight = "bold"; // Peso de la fuente (opcional)

    // Actualiza el canvas
    paper.view.draw();
  }

  // Llamar a la función para graficar cuando se carga el documento
  graficar(280, 320, 340, 320, 60, 40, 80, 40); // Puedes ajustar el ancho y alto de cada zapata y columna aquí
});
