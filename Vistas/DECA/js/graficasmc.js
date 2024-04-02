$(document).ready(function () {
    let dfElement = document.getElementById('df');
    let hElement = document.getElementById('H');
    let angterrElement = document.getElementById('angterr');
    let b1Element = document.getElementById('b1');
    let hdElement = document.getElementById('hd');
    let checkbox = document.getElementById('dentellon');

    // Add event listeners to the input elements
    dfElement.addEventListener('input', draw);
    hElement.addEventListener('input', draw);
    angterrElement.addEventListener('input', draw);
    b1Element.addEventListener('input', draw);
    hdElement.addEventListener('input', draw);
    checkbox.addEventListener('change', draw);

    function draw() {
        let inputdf = parseFloat(document.getElementById('df').value);
        let inputh = parseFloat(document.getElementById('H').value);
        let inputanguloIn = parseFloat(document.getElementById('angterr').value);
        //dentellon:
        var inputB1 = parseFloat(document.getElementById('b1').value);
        var inputHd = parseFloat(document.getElementById('hd').value);

        var a = 0.2;
        var b = inputh / 10;//base de pantalla
        var c = (inputh * 0.7);//base de la grafica
        var d = (c / 3);//cerca a df
        var e = (b - a);//altura

        //pantalla: PUNTOS
        var point1 = d - a + b;
        var point2 = d + b;
        var point3 = b + inputHd;
        var point4 = inputh + inputHd;

        //graficas
        paper.setup('grafico');

        //pantalla
        var pathRed = new paper.Path();
        pathRed.strokeColor = 'red';
        pathRed.add(new paper.Point(point1 * 100, point3 * 100));
        pathRed.add(new paper.Point(point1 * 100, point4 * 100));
        pathRed.add(new paper.Point(point2 * 100, point4 * 100));
        pathRed.add(new paper.Point(point2 * 100, point3 * 100));
        pathRed.add(new paper.Point(point1 * 100, point3 * 100));

        // Calculate the dimensions
        // Para pathRed
        var widthRed = Math.abs(point2 - point1) * 100;
        var heightRed = Math.abs(point4 - point3) * 100;

        var textWidthRed = new paper.PointText({
            point: [(point1 + point2) / 2 * 100, (point3 - 0.05) * 100],
            content: 'Ancho: ' + widthRed.toFixed(2) + ' m',
            fillColor: 'black',
            justification: 'center'
        });

        var textHeightRed = new paper.PointText({
            point: [(point2 + 0.05) * 100, (point3 + point4) / 2 * 100],
            content: 'Altura: ' + heightRed.toFixed(2) + ' m',
            fillColor: 'black'
        });

        // Repite este proceso para pathGreen, pathBlue y pathbrown


        //vastago
        var pathGreen = new paper.Path();
        pathGreen.strokeColor = 'green';
        pathGreen.add(new paper.Point(point1 * 100, point3 * 100));
        pathGreen.add(new paper.Point(point1 * 100, point4 * 100));
        pathGreen.add(new paper.Point(d * 100, point4 * 100));
        pathGreen.add(new paper.Point(point1 * 100, point3 * 100));


        //cimentacion
        var pathBlue = new paper.Path();
        pathBlue.strokeColor = 'blue';
        pathBlue.add(new paper.Point(0, point4 * 100));
        pathBlue.add(new paper.Point(c * 100, point4 * 100));
        pathBlue.add(new paper.Point(c * 100, (point4 + a) * 100));
        pathBlue.add(new paper.Point(0, (point4 + a) * 100));
        pathBlue.add(new paper.Point(0, point4 * 100));

        //Pisos
        var pathbrown = new paper.Path();
        pathbrown.strokeColor = 'brown';
        pathbrown.add(new paper.Point(0, (inputdf + inputHd) * 200));
        pathbrown.add(new paper.Point(d * 100, (inputdf + inputHd) * 200));
        pathbrown.add(new paper.Point(d * 100, point3 * 100));
        pathbrown.add(new paper.Point(c * 100, point3 * 100));

        if (checkbox.checked) {
            var pathyellow = new paper.Path();
            pathyellow.strokeColor = 'red';
            pathyellow.add(new paper.Point(inputB1 * 100, (point4 + a) * 100));
            pathyellow.add(new paper.Point(inputB1 * 100, (point4 + 1) * 100));
            pathyellow.add(new paper.Point(inputB1 + b + 1.2 * 100, (point4 + 1) * 100));
            pathyellow.add(new paper.Point(inputB1 + b + 1.2 * 100, (point4 + a) * 100));
            pathyellow.add(new paper.Point(inputB1 * 100, (point4 + a) * 100));
        }
        //detellon


        paper.view.draw();
    }
    draw();
});
