<?php

use PhpOffice\PhpSpreadsheet\Writer\Pdf;

require_once(__DIR__ . '../../assets/plugins/tcpdf/tcpdf.php');

date_default_timezone_set('America/Lima');
class MYPDF extends TCPDF
{
    public $name_modulo;
    public $name_proyect;
    public $name_entidad_pro;
    public $name_direccion_pro;
    public $name_codigo_Local;
    public $name_codigo_Modular;
    public $name_UnidadEjecutora;
    public $imagen_logo;
    protected $html;

    public function __construct($name_modulo, $name_proyect, $name_entidad_pro, $name_direccion_pro, $name_codigo_Local, $name_codigo_Modular, $name_UnidadEjecutora, $imagen_logo)
    {
        parent::__construct();
        $this->name_modulo = $name_modulo;
        $this->name_proyect = $name_proyect;
        $this->name_entidad_pro = $name_entidad_pro;
        $this->name_direccion_pro = $name_direccion_pro;
        $this->name_codigo_Local = $name_codigo_Local;
        $this->name_codigo_Modular = $name_codigo_Modular;
        $this->name_UnidadEjecutora = $name_UnidadEjecutora;
        $this->imagen_logo = $imagen_logo;
    }

    public function Header()
    {
        // Acceder a los datos del POST
        $name_modulo = $this->name_modulo;
        $name_proyect = $this->name_proyect;
        $name_clocal = $this->name_codigo_Local;
        $name_cmodular = $this->name_codigo_Modular;
        $name_uEjecutora = $this->name_UnidadEjecutora;
        $name_entidad_pro = $this->name_entidad_pro;
        $imagen_logo = $this->imagen_logo;
        $path = dirname(__FILE__);
        $logo = $path . '../../imgpdf/logo_entidad.png';

        /**Logo Derecha */
        $bMargin = $this->getBreakMargin();
        $auto_page_break = $this->AutoPageBreak;
        $this->SetAutoPageBreak(false, 0);
        //$img_file = '/img/logo.png';
        $img_file = dirname(__FILE__) . '../../imgpdf/escudoP.png';
        $this->Image($img_file, 30, 5, 20, 20, '', '', '', false, 30, '', false, false, 0);
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        $this->setPageMark();

        $this->Ln(20);
        /**Logo Izquierdo  $this->Image('src imagen', Eje X, Eje Y, Tamaño de la Imagen );*/
        $this->Image($imagen_logo, 180, 5, 15);

        //texto centrado para los nombres $this->SetFont('helvetica', 'B', 18); //('helvetica','B',8)
        $this->Ln(-35);
        // Establecer la posición XY para comenzar a dibujar el texto
        $this->SetXY(65, 5); // Ajusta las coordenadas XY según tus necesidades

        // Establecer la fuente y el tamaño
        $this->SetFont('times', 'BI', 8);

        // Definir el ancho y alto de la celda
        $cellWidth = 100; // Ajusta el ancho según tus necesidades
        $cellHeight = 20; // Ajusta el alto según tus necesidades

        // Dibujar el texto en una celda multi línea
        $this->MultiCell($cellWidth, $cellHeight, $name_proyect . ".  CODIGO LOCAL: " . $name_clocal . ";  CODIGO MODULAR: " . $name_cmodular . "; UNIDAD EJECUTORA: " . $name_entidad_pro, 0, 'C');
    }

    public function Footer()
    {
        // Acceder a los datos del POST
        $name_entidad_pro = $this->name_entidad_pro;
        $name_direccion_pro = $this->name_direccion_pro;

        // Establecer la posición y la fuente del texto
        $this->SetY(-15);
        $this->SetFont('helvetica', '', 8);

        // Concatenar los dos párrafos HTML en una sola cadena
        $this->html = '<p style="text-align:left; border-top:1px solid #999;"><strong>' . $name_entidad_pro . '</strong></p>';
        $this->html .= '<p style="text-align:left;"><strong>' . $name_direccion_pro . '</strong></p>';

        // Escribir el HTML en el pie de página
        $this->writeHTML($this->html, true, false, true, false, '');

        // Mover a la posición para el número de página
        $this->SetX(-15);
        $this->SetY(-15);
        // Agregar el número de página a la derecha
        $this->Cell(0, 10, 'Página ' . $this->getAliasNumPage() . '|' . $this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Obtener los datos del formulario POST
    $name_modulo = $_POST["Modlulo"];
    $name_proyect = $_POST["namePro"];
    $name_entidad_pro = $_POST["entidad_pro"];
    $name_direccion_pro = $_POST["direccionPro"];
    $name_codigo_Local = $_POST["codLocal"];
    $name_codigo_Modular = $_POST["codMod"];
    $name_UnidadEjecutora = $_POST["undejec"];
    $name_normativaMN = $_POST['normativa_MC'];

    //logos de portadas
    $imagen_portada = $_FILES['img_portada']['tmp_name'];
    $imagen_modulo = $_FILES['img_modulo']['tmp_name'];
    $imagen_logo = $_FILES['logo_pro']['tmp_name'];

    //Componentes estructurales
    // $datosTablaJSON = $_POST['input_datos_tabla'];
    // $datosTabla = json_decode($datosTablaJSON, true);

    // Crear una instancia de MYPDF pasando los datos necesarios
    $pdf = new MYPDF($name_modulo, $name_proyect, $name_entidad_pro, $name_direccion_pro, $name_codigo_Local, $name_codigo_Modular, $name_UnidadEjecutora, $imagen_logo, 'S', 'mm', 'A4', true, 'UTF-8', false);



    //establecer margenes
    $pdf->SetMargins(25, 35, 25);
    $pdf->SetHeaderMargin(20);
    $pdf->setPrintFooter(true); //Defino el estado del footer
    $pdf->setPrintHeader(true); //Defino el estado del Header
    $pdf->SetAutoPageBreak(false);

    // set default header data
    $pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

    if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
        require_once(dirname(__FILE__) . '/lang/eng.php');
        $pdf->setLanguageArray($l);
    }

    //-------------------------------------------------------------------------------

    // Agregar página
    $pdf->SetFont('times', '', 13);
    $pdf->AddPage();

    // Mostrar el título centrado y la imagen de la portada
    $pdf->SetFont('times', 'BI', 20);
    $pdf->MultiCell(0, 10, 'MEMORIA DE CÁLCULO ESPECIALIDAD ESTRUCTURAS', 0, 'C');
    $pdf->MultiCell(0, 10, $name_modulo, 0, 'C');
    $pdf->Image($imagen_portada, 50, 60, 100, 105, '', '', '', false, 300, '', false, false, 0);

    // Mostrar el nombre del proyecto centrado
    $pdf->SetFont('times', '', 11);
    $pdf->Ln(110);
    $html = "<p><strong>PROYECTO:</strong> $name_proyect</p>";
    $pdf->writeHTML($html, true, false, true, false, '');

    // Mostrar la imagen del módulo
    $pdf->Image($imagen_modulo, 30, 190, 150, 80, '', '', '', false, 300, '', false, false, 0);

    //----------------------------------------------------------------
    //indice de la memoria de calculo

    // Establece el tipo de fuente y tamaño para el índice
    $pdf->SetFont('times', 'BI', 15);

    // Agrega una nueva página para el índice
    $pdf->AddPage();

    // set a bookmark for the current position
    $pdf->Bookmark('1. GENERALIDADES', 0, 0, '', 'B', array(0, 64, 128));
    //print a line using Cell()
    $pdf->Cell(0, 10, '1. GENERALIDADES', 0, 1, 'L');

    // $pdf->AddPage();

    $pdf->Bookmark('1.1. ALCANCES DEL DOCUMENTO', 1, 0, '', '', array(128, 0, 0));
    $pdf->Cell(0, 10, '1.1. ALCANCES DEL DOCUMENTO', 0, 1, 'L');

    $pdf->SetFont('times', '', 10);
    $html = "
        <p style='margin-top: 10px;'>El proyecto estructural desarrollado
        se basó en proponer las medidas óptimas más 
        adecuadas para el buen desempeño de los módulos 
        del proyecto, sometidas a cargas de gravedad 
        y a solicitaciones sísmicas. Estas edificaciones 
        han sido modeladas según los parámetros indicados 
        en las actuales normas estructurales vigentes y 
        teniendo en cuenta las hipótesis de análisis estructural</p>
        ";
    $pdf->writeHTML($html, true, false, true, false, '');

    // $pdf->AddPage();
    $pdf->SetFont('times', 'BI', 15);
    $pdf->Bookmark('1.2. DESCRIPCIÓN DE LOS COMPONENTES ESTRUCTURALES.', 1, 0, '', '', array(128, 0, 0));
    $pdf->Cell(0, 10, '1.2. DESCRIPCIÓN DE LOS COMPONENTES ESTRUCTURALES.', 0, 1, 'L');

    if (isset($_POST['dataCE'])) {
        // Obtener los datos JSON del input oculto
        $datosTablaJSON = $_POST['dataCE'];

        // Decodificar los datos JSON a un array asociativo
        $datosTabla = json_decode($datosTablaJSON, true);

        // Verificar si la decodificación fue exitosa
        if ($datosTabla === null && json_last_error() !== JSON_ERROR_NONE) {
            // Error al decodificar los datos JSON
            $pdf->MultiCell(0, 10, 'Error al decodificar los datos JSON.', 0, 'L');
        } else {
            // Los datos se decodificaron correctamente
            foreach ($datosTabla as $fila) {
                // Verificar si existe la clave 'imagen' en la fila
                $descripcionImagen = $fila['descripcion'];
                if (isset($fila['imagen'])) {
                    // Obtener el tipo de imagen (png, jpeg, etc.)
                    $tipoImagen = explode(';', $fila['imagen'])[0];
                    $tipoImagen = explode(':', $tipoImagen)[1];

                    // Obtener los datos base64 de la imagen
                    $datosImagen = explode(',', $fila['imagen'])[1];

                    // Crear una imagen a partir de los datos base64
                    $imagen = base64_decode($datosImagen);

                    // Guardar la imagen temporalmente
                    $rutaImagenTemp = tempnam(sys_get_temp_dir(), 'img');
                    file_put_contents($rutaImagenTemp, $imagen);

                    // Verificar si hay suficiente espacio en la página actual
                    $espacioDisponible = $pdf->getPageHeight() - $pdf->GetY();
                    $alturaImagen = 80; // Supongamos que la altura de la imagen es fija en 80
                    if ($espacioDisponible < $alturaImagen + 20) { // Consideramos también el espacio para la descripción
                        // No hay suficiente espacio, agregar nueva página
                        $pdf->AddPage();
                    }

                    // Mostrar la imagen en el PDF
                    $pdf->Ln(2);
                    $pdf->Image($rutaImagenTemp, 70, $pdf->GetY(), 80, 80);
                    $pdf->Ln(80);
                    $pdf->Cell(0, 10, $descripcionImagen, 0, 1, 'C');
                    // Borrar la imagen temporal después de usarla
                    unlink($rutaImagenTemp);

                    $pdf->Ln(); // Salto de línea después de la imagen
                } else {
                    $pdf->MultiCell(0, 10, 'Datos de imagen no válidos.', 0, 'L');
                }
            }

            // Iniciar la tabla HTML con estilos CSS
            $tablaCe = '
                <table cellspacing="0" cellpadding="1" border="1"  align="center">
                    <tbody>';

            // Crear un array asociativo para almacenar los datos agrupados por encabezado
            $datosAgrupados = [];

            // Iterar sobre los datos de la tabla y agruparlos por encabezado
            foreach ($datosTabla as $fila) {
                foreach ($fila as $encabezado => $valor) {
                    // Excluir la captura de imagen y descripción
                    if ($encabezado !== "imagen" && $encabezado !== "descripcion" && $encabezado !== "numero") {
                        // Agregar el valor al array correspondiente al encabezado
                        $datosAgrupados[$encabezado][] = $valor;
                    }
                }
            }

            // Iterar sobre los datos agrupados y construir las filas de la tabla
            foreach ($datosAgrupados as $encabezado => $valores) {
                $valoresConcatenados = implode(',', $valores);
                // Agregar la fila a la tabla con estilos CSS para centrar y bordes
                $tablaCe .= "
                    <tr>
                        <td style='border: 1px solid #000; padding: 8px; text-align: center;'>$encabezado</td>
                        <td style='border: 1px solid #000; padding: 8px; text-align: center;'>$valoresConcatenados</td>
                    </tr>";
            }

            // Cerrar la tabla HTML
            $tablaCe .= '
                </tbody>
            </table>';

            // Verificar si estamos cerca del pie de página
            if ($pdf->GetY() + 500 > $pdf->getPageHeight()) {
                $pdf->AddPage(); // Agregar una nueva página si es necesario
            }

            // Escribir la tabla HTML en el PDF
            $pdf->writeHTML($tablaCe, true, false, true, false, '');
        }
    } else {
        // El input oculto dataCE no está presente en los datos del formulario
        $pdf->MultiCell(0, 10, 'No se recibieron datos del formulario.', 0, 'L');
    }

    // -----------------------------------------------------------------------------

    $pdf->Bookmark('1.3. MARCO NORMATIVO', 1, 0, '', '', array(128, 0, 0));
    $pdf->Cell(0, 10, '1.3. MARCO NORMATIVO', 0, 1, 'L');

    $pdf->SetFont('helvetica', '', 9);


    $tbl = <<<EOD
        <table cellspacing="0" cellpadding="1" border="1">
            <tr>
                <td colspan="2" align="center"><h3><strong>MARCO NORMATIVO ESTRUCTURAS</strong></h3></td>
            </tr>
            <tr>
                <td rowspan="2" align="center">E.010</td>
                <td>Madera</td>
            </tr>
            <tr>
                <td>Modificación de la Norma Técnica E.010(D.S. 005-2014-VIVIENDA)</td>
            </tr>
            <tr>
                <td align="center">E0.20</td>
                <td>Cargas</td>
            </tr>
            <tr>
                <td rowspan="2" align="center">E0.30</td>
                <td>Diseño Sismorresistente (R.M. N° 355-2018-VIVIENDA)</td>
            </tr>
            <tr>
                <td>Modificación de artículos 11, 12, 16 y 27 (R.M. N° 043-2019-VIVIENDA) </td>
            </tr>   
            <tr>
                <td align="center">E0.40</td>
                <td>Vidrio</td>
            </tr>
            <tr>
                <td align="center">E0.50</td>
                <td>Suelos y Cimentaciones</td>
            </tr>
            <tr>
                <td align="center">E0.60</td>
                <td>Concreto Armado (D.S. Nº 010-2009-VIVIENDA)</td>
            </tr>
            <tr>
                <td align="center">E0.70</td>
                <td>Albañería</td>
            </tr>
            <tr>
                <td rowspan="3" align="center">E0.80</td>
                <td>Adobe</td>
            </tr>
            <tr>
                <td>Diseño y Construcción con Tierra Reforzada (R.M. Nº 121-2017-VIVIENDA)</td>
            </tr>
            <tr>
                <td>Fe de Erratas RM. Nº 121-2017-VIVIENDA</td>
            </tr>
            <tr>
                <td align="center">E0.90</td>
                <td>Estrutras Metalicas</td>
            </tr>
            <tr>
                <td align="center">E0.100</td>
                <td>Bambú (D.S. Nº 011-2012-VIVIENDA)</td>
            </tr>
        </table>
        EOD;

    $pdf->writeHTML($tbl, true, false, false, false, '');

    // -----------------------------------------------------------------------------

    $pdf->AddPage();
    $pdf->Ln(10);
    $pdf->SetFont('times', 'BI', 15);
    $pdf->Bookmark('1.4. MATERIALES DE DISEÑO', 1, 0, '', '', array(128, 0, 0));
    $pdf->Cell(0, 10, '1.4. MATERIALES DE DISEÑO', 0, 1, 'L');
    $pdf->SetFont('times', '', 9);
    $html = "
        <p style='margin-top: 10px;'>Se consideró las siguientes características de los materiales que conforman esta estructura.</p>
        ";
    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->Ln(5);
    $pdf->SetFont('times', '', 9);
    $mtd = <<<EOD
        <table cellspacing="0" cellpadding="1" border="1"  align="center">
            <tr>
                <td>Peso específico del concreto</td>
                <td>ɣc = 2.4 tonf/m3</td>
            </tr>
            <tr>
                <td>Resistencia del concreto</td>
                <td>f’c = 210 kg/cm2</td>
            </tr>
            <tr>
                <td>Amortiguamiento para el concreto</td>
                <td>0.05</td>
            </tr>
            <tr>
                <td>Módulo de elasticidad del concreto</td>
                <td>Ec = 15000(f’c)^0.5 kg/cm^2</td>
            </tr>
            <tr>
                <td>Módulo de Poisson del concreto</td>
                <td>μc = 0.15</td>
            </tr>
            <tr>
                <td>Acero corrugado</td>
                <td>ASTM A615-GRADO 60</td>
            </tr>
            <tr>
                <td>Peso específico del acero</td>
                <td>ɣacero = 7.85 tonf/m3</td>
            </tr>
            <tr>
                <td>Resistencia de fluencia del acero</td>
                <td>f’y = 4200 kg/cm2</td>
            </tr>
            <tr>
                <td>Módulo de elasticidad del Acero</td>
                <td>Eacero = 2000000 kg/cm^2</td>
            </tr>
            <tr>
                <td>Peso específico de la albañilería</td>
                <td>ɣalb = 1.8 tonf/m3</td>
            </tr>
            <tr>
                <td>Resistencia de pilas de albañilería (Tipo V)</td>
                <td>f’m = 85 kg/cm2</td>
            </tr>
            <tr>
                <td>Resistencia de muretes de albañilería</td>
                <td>v’m = 9.2 kg/cm2</td>
            </tr>
            <tr>
                <td>Módulo de elasticidad de la albañilería</td>
                <td>Ealb = 500(f’m) kg/cm^2</td>
            </tr>
            <tr>
                <td>Módulo de Poisson de la albañilería</td>
                <td>μalb = 0.25</td>
            </tr>
            <tr>
                <td>Cemento</td>
                <td>Tipo I</td>
            </tr>
        </table>
    EOD;

    $pdf->writeHTML($mtd, true, false, false, false, '');

    //----------------------------------------------------------------
    $pdf->AddPage();
    $pdf->SetFont('times', 'BI', 15);
    // set a bookmark for the current position
    $pdf->Bookmark('2. ANÁLISIS DE CARGAS POR GRAVEDAD', 0, 0, '', 'B', array(0, 64, 128));

    // print a line using Cell()
    $pdf->Cell(0, 10, '2. ANÁLISIS DE CARGAS POR GRAVEDAD', 0, 1, 'L');

    $pdf->Bookmark('2.1. MODELO ESTRUCTURAL', 1, 0, '', '', array(128, 0, 0));
    $pdf->Cell(0, 10, '2.1. MODELO ESTRUCTURAL', 0, 1, 'L');
    $pdf->SetFont('times', '', 9);
    $acg = "
        <p style='margin-top: 10px;'>En el análisis sísmico de los módulos del proyecto se 
        utilizó el programa ETABS. Los diversos módulos fueron analizados con modelos 
        tridimensionales, suponiendo losas infinitamente rígidas frente a acciones en su plano.
        En el análisis de la estructura se supuso un comportamiento lineal y elástico. 
        Los elementos de concreto armado se representaron con elementos lineales. 
        Los muros de albañilería se modelaron con elementos tipo Shell, con rigideces de membrana 
        y de flexión, aun cuando estas últimas son poco significativas. Los modelos se analizaron 
        considerando sólo los elementos estructurales, sin embargo, los elementos no estructurales 
        han sido ingresados en el modelo como solicitaciones de carga debido a que aquellos no son 
        importantes en la contribución de la rigidez y resistencia de la edificación.</p>
        ";
    $pdf->writeHTML($acg, true, false, true, false, '');

    $pdf->Image($imagen_portada, 70, 100, 100, 105, '', '', '', false, 300, '', false, false, 0);


    $pdf->Ln(115);
    $pdf->SetFont('times', 'BI', 15);
    $pdf->Bookmark('2.2. CASOS DE CARGA', 1, 0, '', '', array(128, 0, 0));
    $pdf->Cell(0, 10, '2.2. CASOS DE CARGA', 0, 1, 'L');
    $pdf->Ln(2);
    $pdf->SetFont('times', '', 9);
    $acg = "
        <p style='margin-top: 10px;'>Para el diseño estructural de los módulos del presente proyecto se 
        utilizaron las siguientes cargas acordes al RNE. E060 (Concreto Armado).</p>
    ";
    $pdf->writeHTML($acg, true, false, true, false, '');
    $pdf->Ln(2);
    $pdf->SetFont('times', '', 9);
    $mtd = <<<EOD
        <table cellspacing="0" cellpadding="1" border="1"  align="center">
            <tr>
                <td>Load Case Name</td>
                <td>Load Case Type</td>
            </tr>
            <tr>
                <td>Modal</td>
                <td>Modal-Eigen</td>
            </tr>
            <tr>
                <td>CM</td>
                <td>Lienar Static</td>
            </tr>
            <tr>
                <td>CV</td>
                <td>Lienar Static</td>
            </tr>
            <tr>
                <td>CVT</td>
                <td>Lienar Static</td>
            </tr>
            <tr>
                <td>SEX</td>
                <td>Lienar Static</td>
            </tr>
            <tr>
                <td>SEY</td>
                <td>Lienar Static</td>
            </tr>
            <tr>
                <td>SDX</td>
                <td>Response Spectrum</td>
            </tr>
            <tr>
                <td>SDY</td>
                <td>Response Spectrum</td>
            </tr>
        </table>
    EOD;
    $pdf->writeHTML($mtd, true, false, false, false, '');
    $pdf->Ln(-5);
    $pdf->SetFont('times', 'BI', 9);
    $pdf->Cell(0, 10, 'Casos de carga usados en el proyecto', 0, 1, 'C');

    if ($pdf->GetY() > ($pdf->getPageHeight() - 30)) { // Cambia 20 según tu necesidad de espacio al pie de página
        $pdf->AddPage(); // Agregar nueva página si los datos están cerca del pie de página
    }

    $pdf->SetFont('times', '', 9);
    $acg = "Siendo:<br>CM = carga muerta<br>CV = carga viva de entrepiso<br>CVT = carga viva de techo<br>SEX = carga sísmica estática en dirección X<br>SEY = carga sísmica estática en dirección Y<br>SDX = carga sísmica dinámica en dirección X<br>SDY = carga sísmica dinámica en dirección Y";
    $pdf->writeHTML($acg, true, false, true, false, '');


    $pdf->Ln(5);
    //variables
    $dat_factorZona = $_POST["factorZona"];
    $dat_tipoperfil = $_POST["tipoPerfil"];
    // Definir la variable $zona basada en $dat_factorZona
    $zona = "";
    if ($dat_factorZona == 0.10) {
        $zona = "Zona 1";
    } else if ($dat_factorZona == 0.25) {
        $zona = "Zona 2";
    } else if ($dat_factorZona == 0.35) {
        $zona = "Zona 3";
    } else if ($dat_factorZona == 0.45) {
        $zona = "Zona 4";
    }
    $dat_factorUso = $_POST["factorUso"];
    $factorUso = "";
    if ($dat_factorUso == 1.5) {
        $factorUso = "A";
    } else if ($dat_factorUso == 1.3) {
        $factorUso = "B";
    } else if ($dat_factorUso == 1.0) {
        $factorUso = "C";
    } else if ($dat_factorUso == 1.01) {
        $factorUso = "D";
    }

    $dat_coefx = $_POST["coefX"];
    $dat_coefy = $_POST["coefy"];
    //seccion X
    $dat_factorIAx = $_POST["factorIAX"];
    $dat_factorIPx = $_POST["factorIPX"];
    //seccion Y
    $dat_factorIAy = $_POST["factorIAY"];
    $dat_factorIPy = $_POST["factorIPY"];

    //factor suelo
    $valorFactorS = null;
    $valorFactorP = null;
    $Tp = null;
    $Tl = null;

    // FACTOR DE SUELO(TABLA N°3)
    $factorS = array(
        'S0' => array('0.45' => 0.80, '0.35' => 1.00, '0.25' => 1.05, '0.10' => 1.10),
        'S1' => array('0.45' => 0.80, '0.35' => 1.00, '0.25' => 1.15, '0.10' => 1.20),
        'S2' => array('0.45' => 0.80, '0.35' => 1.00, '0.25' => 1.20, '0.10' => 1.40),
        'S3' => array('0.45' => 0.80, '0.35' => 1.00, '0.25' => 1.60, '0.10' => 2.00),
    );
    // Verificar si el tipo de perfil y la zona existen en la matriz
    if (array_key_exists($dat_tipoperfil, $factorS) && array_key_exists($dat_factorZona, $factorS['S0'])) {
        // Obtener el valor del factor
        $valorFactorS = $factorS[$dat_tipoperfil][$dat_factorZona];
        // echo "El valor del factor para el perfil $dat_tipoperfil y zona $dat_factorZona es: $valorFactorS";
    } else {
        // echo "No se encontró el tipo de perfil o la zona especificada en la matriz.";
    }
    // Definir la matriz de factores
    $Periodico = array(
        'S0' => array('Tp' => 0.3, 'Tl' => 3.0),
        'S1' => array('Tp' => 0.4, 'Tl' => 2.5),
        'S2' => array('Tp' => 0.6, 'Tl' => 2.0),
        'S3' => array('Tp' => 1.0, 'Tl' => 1.6),
    );
    // Verificar si el tipo de perfil existe en la matriz
    if (array_key_exists($dat_tipoperfil, $Periodico)) {
        // Obtener el valor del factor
        $valorFactorP = $Periodico[$dat_tipoperfil];
        $Tp = $valorFactorP['Tp'];
        $Tl = $valorFactorP['Tl'];
        // echo "El valor del factor para el perfil $dat_tipoperfil es: Tp=$Tp y Tl=$Tl";
    } else {
        // echo "No se encontró el tipo de perfil especificado en la matriz.";
    }

    $Rx = $dat_coefx * $dat_factorIAx * $dat_factorIPx;
    $RY = $dat_coefy * $dat_factorIAy * $dat_factorIPy;
    $gravedadXY = 9.81;
    //direccion en XX
    $T = [
        't1' => 0,
        't2' => 0.0200,
        't3' => 0.0400,
        't4' => 0.0600,
        't5' => 0.0800,
        't6' => 0.1000,
        't7' => 0.1200,
        't8' => 0.1400,
        't9' => 0.1600,
        't10' => 0.1800,
        't11' => 0.2000,
        't12' => 0.2500,
        't13' => 0.3000,
        't14' => 0.3500,
        't15' => 0.4000,
        't16' => 0.4500,
        't17' => 0.5000,
        't18' => 0.5500,
        't19' => 0.6000,
        't20' => 0.6500,
        't21' => 0.7000,
        't22' => 0.7500,
        't23' => 0.8000,
        't24' => 0.8500,
        't25' => 0.9000,
        't26' => 0.9500,
        't27' => 1.0000,
        't28' => 1.1000,
        't29' => 1.2000,
        't30' => 1.3000,
        't31' => 1.4000,
        't32' => 1.5000,
        't33' => 1.6000,
        't34' => 1.7000,
        't35' => 1.8000,
        't36' => 1.9000,
        't37' => 2.0000,
        't38' => 2.2500,
        't39' => 2.7500,
        't40' => 3.0000,
        't41' => 4.0000,
        't42' => 5.0000,
        't43' => 6.0000,
        't44' => 7.0000,
        't45' => 8.0000,
        't46' => 9.0000,
        't47' => 10.0000,
    ];
    //formula para sacar la C
    $C = []; // Array para almacenar los valores de C

    foreach ($T as $key => $value) {
        if ($value <= $Tp) {
            $c = 2.5;
        } elseif ($Tp < $value && $value <= $Tl) { // Nota el cambio aquí para usar && en lugar de ||
            $c = 2.5 * ($Tp / $value);
        } elseif ($value > $Tl) {
            $c = 2.5 * (($Tp * $Tl) / ($value * $value));
        }
        $C[$key] = $c;
    }
    // Fórmula para sacar SA
    $Sa = [];

    foreach ($C as $key => $c) { // Aquí deberías iterar sobre $C ya que ya calculaste los valores
        // Calcular el valor de Sa para este dato
        $Sa[$key] = $dat_factorZona * $dat_factorUso * $c * $valorFactorS / $Rx;
    }



    // Construir la tabla HTML
    $esXX = '
        <table cellspacing="0" cellpadding="1" border="1"  align="center">
            <tr>
                <td colspan="4"><h3><strong>Espectro de Pseudoaceleraciones en dirección “XX”</strong></h3></td>
            </tr>
            <tr>
                <td>Funcion Name</td>
                <td>Espectro en XX</td>
                <td>Fuction Damping Ratio</td>
                <td>0.005</td>
            </tr>
            <tr>
                <td>Seismic Zona</td>
                <td style="border: 1px solid #000; padding: 8px; text-align: center;">' . $zona . '</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Ocupacion Category</td>
                <td style="border: 1px solid #000; padding: 8px; text-align: center;">' . $factorUso . '</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Soilt Type</td>
                <td style="border: 1px solid #000; padding: 8px; text-align: center;">' . $dat_tipoperfil . '</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Irregularity Factor. Ia</td>
                <td style="border: 1px solid #000; padding: 8px; text-align: center;">' . $dat_factorIAx . '</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Irregularity Factor .Ip</td>
                <td style="border: 1px solid #000; padding: 8px; text-align: center;">' . $dat_factorIPx . '</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Basci Response Modification Factor. R0</td>
                <td style="border: 1px solid #000; padding: 8px; text-align: center;">' . $dat_coefx . '</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="5">
                </td>
            </tr>   
        </table>';

    $pdf->writeHTML($esXX, true, false, false, false, '');

    $pdf->Ln(-5);
    $pdf->SetFont('times', '', 9);
    $pdf->Cell(0, 10, 'Espectro de Pseudoaceleraciones en dirección “X”', 0, 1, 'C');

    $pdf->Ln(5);

    $esyy = '
        <table cellspacing="0" cellpadding="1" border="1"  align="center">
            <tr>
                <td colspan="4"><h3><strong>Espectro de Pseudoaceleraciones en dirección “YY”</strong></h3></td>
            </tr>
            <tr>
                <td>Funcion Name</td>
                <td>Espectro en YY</td>
                <td>Fuction Damping Ratio</td>
                <td>0.005</td>
            </tr>
            <tr>
                <td>Seismic Zona</td>
                <td style="border: 1px solid #000; padding: 8px; text-align: center;">' . $zona . '</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Ocupacion Category</td>
                <td style="border: 1px solid #000; padding: 8px; text-align: center;">' . $factorUso . '</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Soilt Type</td>
                <td style="border: 1px solid #000; padding: 8px; text-align: center;">' . $dat_tipoperfil . '</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Irregularity Factor. Ia</td>
                <td style="border: 1px solid #000; padding: 8px; text-align: center;">' . $dat_factorIAy . '</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Irregularity Factor .Ip</td>
                <td style="border: 1px solid #000; padding: 8px; text-align: center;">' . $dat_factorIPy . '</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Basci Response Modification Factor. R0</td>
                <td style="border: 1px solid #000; padding: 8px; text-align: center;">' . $dat_coefy . '</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
            
            </tr>   
        </table>';
    $pdf->writeHTML($esyy, true, false, false, false, '');
    $pdf->Ln(-5);
    $pdf->SetFont('times', '', 9);
    $pdf->Cell(0, 10, 'Espectro de Pseudoaceleraciones en dirección “Y”', 0, 1, 'C');
    //----------------------------------------------------------------
    if ($pdf->GetY() > ($pdf->getPageHeight() - 30)) { // Cambia 20 según tu necesidad de espacio al pie de página
        $pdf->AddPage(); // Agregar nueva página si los datos están cerca del pie de página
    }
    //------------------------------------------------------------------}
    $pdf->Ln(10);
    $pdf->SetFont('times', 'BI', 15);
    $pdf->Bookmark('2.3. COMBINACIONES DE CARGA', 1, 0, '', '', array(128, 0, 0));
    $pdf->Cell(0, 10, '2.3. COMBINACIONES DE CARGA', 0, 1, 'L');
    $pdf->Ln(-5);

    if (isset($_POST["concretoArmado"])) {
        $pdf->SetFont('times', '', 9);
        $imagen_CA = $_FILES['concretoArmadoFileInput']['tmp_name'];
        $pdf->Ln(3);
        $ccargas = "
            <p>Para el diseño estructural de los módulos del presente 
            proyecto se utilizó las siguientes combinaciones acordes 
            al RNE. E060 (Concreto Armado).</p>
            ";
        $pdf->writeHTML($ccargas, true, false, true, false, '');
        $pdf->Ln(2);
        $pdf->Image($imagen_CA, 60, 210, 80, 50, '', '', '', false, 300, '', false, false, 0);
    }
    // Verifica si el checkbox de Acero está seleccionado
    elseif (isset($_POST["acero"])) {
        $pdf->SetFont('times', '', 9);
        $imagen_Acero = $_FILES['aceroFileInput']['tmp_name'];
        $pdf->Ln(3);
        $ccargas = "
            <p>Para calcular o estimar las cargas que se aplicarán en la 
            estructura se tomarán las cargas referenciales acorde a la norma 
            E.020 del R.N.E. </p>
            ";
        $pdf->writeHTML($ccargas, true, false, true, false, '');
        $pdf->Ln(2);
        $pdf->Image($imagen_Acero, 60, 210, 80, 50, '', '', '', false, 300, '', false, false, 0);
    } else {
        // Ningún checkbox seleccionado
        $ccargas = "
            <p>No Existe Datos. Seleccione una de las opciones de Combinación de Carga.</p>
            ";
        $pdf->writeHTML($ccargas, true, false, true, false, '');
    }

    //----------------------------------------------------------------
    if ($pdf->GetY() > ($pdf->getPageHeight() - 90)) { // Cambia 20 según tu necesidad de espacio al pie de página
        $pdf->AddPage(); // Agregar nueva página si los datos están cerca del pie de página
    }
    //------------------------------------------------------------------}
    $pdf->Ln(-5);
    $pdf->SetFont('times', 'BI', 15);
    $pdf->Bookmark('2.4. METRADO DE CARGAS', 1, 0, '', '', array(128, 0, 0));
    $pdf->Cell(0, 10, '2.4. METRADO DE CARGAS', 0, 1, 'L');

    $pdf->SetFont('times', 'BI', 12);
    $pdf->Cell(0, 10, 'Carga Muerta', 0, 1, 'L');
    $pdf->SetFont('times', '', 9);
    $pdf->Ln(5);

    $mcv = <<<EOD
        <table >
            <tr>
                <td>Concreto</td>
                <td>2400 kgf/m<sup>3</sup></td>
            </tr>
            <tr>
                <td>Albañilería</td>
                <td>1800 kgf/m<sup>3</sup></td>
            </tr>
            <tr>
                <td>Aligerado (h=20cm)</td>
                <td>300 kgf/m</td>
            </tr>
            <tr>
                <td>Carga muerta general</td>
                <td>200 kgf/m<sup>2</sup></td>
            </tr>
            <tr>
                <td>Tarrajeo</td>
                <td>2000 kgf/m<sup>2 </sup></td>
            </tr>
        </table>
    EOD;
    $pdf->writeHTML($mcv, true, false, false, false, '');

    $pdf->Ln(5);
    //Variables
    $name_yc = floatval($_POST["yc"]);
    $name_ysSimple = floatval($_POST["ysSimple"]);
    $name_ysCemento = floatval($_POST["YSCemento"]);

    $ppm = floatval($_POST["ppm"]);
    $psctm = floatval($_POST["psctm"]);
    $efp = floatval($_POST["efp"]);
    $etarr = floatval($_POST["etarr"]);

    //Formula y Resultados
    $pacabado = ($name_ysSimple * $efp / 1000);
    $ptarrajeado = ($name_ysCemento * $etarr / 1000);
    $pporcelanato = ($ppm / 1000);
    $ptijeras = $psctm / (1000 * 2.4);
    $totalCM = $pacabado + $ptarrajeado + $pporcelanato + $ptijeras;
    //cm2
    $pacabadoKC = $pacabado * 1000;
    $ptarrajeadoKC = $ptarrajeado * 1000;
    $pporcelanatoKC = $pporcelanato * 1000;
    $ptijerasKC = $ptijeras * 1000;
    $totalCMKC =  $pacabadoKC + $ptarrajeadoKC + $pporcelanatoKC + $ptijerasKC;
    $pdf->SetFont('times', '', 9);

    $mcm = '
        <table cellspacing="0" cellpadding="1" border="1" align="center">
            <tr>
                <td colspan="5"><h3><strong>Metrado de carga muerta sobre losa aligerada</strong></h3></td>
            </tr>
            <tr>
                <td colspan="5">Datos</td>
            </tr>
            <tr>
                <td>yc</td>
                <td style="border: 1px solid #000; padding: 8px; text-align: center;">' . $name_yc . '</td>
                <td>kg/cm<sup>3</sup></td>
                <td colspan="2">Peso específico del concreto armado</td>
            </tr>
            <tr>
                <td>ys</td>
                <td style="border: 1px solid #000; padding: 8px; text-align: center;">' . $name_ysSimple . '</td>
                <td>kg/m<sup>3</sup></td>
                <td colspan="2">Peso específico del concreto simple</td>
            </tr>
            <tr>
                <td>ycemento</td>
                <td style="border: 1px solid #000; padding: 8px; text-align: center;">' . $name_ysCemento . '</td>
                <td>kg/m<sup>3</sup></td>
                <td colspan="2">Peso específico del cemento</td>
            </tr>
            <tr>
                <td></td>
                <td style="border: 1px solid #000; padding: 8px; text-align: center;">' . $ppm . '</td>
                <td>kg/m<sup>2</sup></td>
                <td colspan="2">Peso de porcelanato por m<sup>2</sup></td>
            </tr>
            <tr>
                <td></td>
                <td style="border: 1px solid #000; padding: 8px; text-align: center;">' . $psctm . '</td>
                <td>kg/m</td>
                <td colspan="2">Peso de sobrecarga de cobertura + tijerales de madera</td>
            </tr>
            <tr>
                <td></td>
                <td style="border: 1px solid #000; padding: 8px; text-align: center;">' . $efp . '</td>
                <td>m</td>
                <td colspan="2">Espesor de falso piso</td>
            </tr>
            <tr>
                <td></td>
                <td style="border: 1px solid #000; padding: 8px; text-align: center;">' . $etarr . '</td>
                <td>m</td>
                <td colspan="2">Espesor de tarrajeado</td>
            </tr>

            <tr>
                <td colspan="5">Resultados</td>
            </tr>

            <tr>
                <td>Peso acabados</td>
                <td style="border: 1px solid #000; padding: 8px; text-align: center;">' . $pacabado . '</td>
                <td>tonf/m<sup>2</sup></td>
                <td style="border: 1px solid #000; padding: 8px; text-align: center;">' . $pacabadoKC . '</td>
                <td>kg/cm<sup>2</sup></td>
            </tr>
            <tr>
                <td>Peso tarrejeado</td>
                <td style="border: 1px solid #000; padding: 8px; text-align: center;">' . $ptarrajeado . '</td>
                <td> tonf/m<sup>2</sup></td>
                <td style="border: 1px solid #000; padding: 8px; text-align: center;">' . $ptarrajeadoKC . '</td>
                <td>kg/cm<sup>2</sup></td>
            </tr>
            <tr>
                <td>Peso del porcelanato</td>
                <td style="border: 1px solid #000; padding: 8px; text-align: center;">' . $pporcelanato . '</td>
                <td>tonf/m<sup>2</sup></td>
                <td style="border: 1px solid #000; padding: 8px; text-align: center;">' . $pporcelanatoKC . '</td>
                <td>kg/cm<sup>2</sup></td>
            </tr>
            <tr>
                <td>Peso de tijerales</td>
                <td style="border: 1px solid #000; padding: 8px; text-align: center;">' . $ptijeras . '</td>
                <td> tonf/m<sup>2</sup></td>
                <td style="border: 1px solid #000; padding: 8px; text-align: center;">' . $ptijerasKC . '</td>
                <td>kg/cm<sup>2</sup></td>
            </tr>
            <tr>
                <td>Total</td>
                <td style="border: 1px solid #000; padding: 8px; text-align: center;">' . $totalCM . '</td>
                <td>tonf/m<sup>2</sup></td>
                <td style="border: 1px solid #000; padding: 8px; text-align: center;">' . $totalCMKC . '</td>
                <td>kg/cm<sup>2</sup></td>
            </tr>
        </table>';
    $pdf->writeHTML($mcm, true, false, false, false, '');

    $pdf->SetFont('times', 'BI', 12);
    $pdf->Cell(0, 10, 'Carga viva', 0, 1, 'L');


    $dat_factorUso = $_POST["factorUso"];

    $dat_edifEsnA1 = $_POST["EEA1"];
    $dat_edifEsnA2 = $_POST["EEA2"];
    $dat_edifimportante = $_POST["edifImportante"];
    $dat_edifcomunes = $_POST["edifcomunes"];
    $dat_ediftemporales = $_POST["ediftemporares"];

    $pdf->SetFont('times', '', 9);
    $Metrcv = <<<EOD
        <table cellspacing="0" cellpadding="1" border="1"  align="center">
            <thead>
                <tr>
                    <th>OCUPA</th>
                    <th>USO</th>
                    <th>CARGAS</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Almacenaje</td>
                    <td>Almacenaje</td>
                    <td>500</td>
                </tr>
                <tr>
                    <td>Baños</td>
                    <td>Baños</td>
                    <td>300</td>
                </tr>
                <tr>
                    <td>Bibliotecas</td>
                    <td>Salas de lectura</td>
                    <td>300</td>
                </tr>
                <tr>
                    <td>Bibliotecas</td>
                    <td>Salas de almacenaje con estantes fijos (no apilables)</td>
                    <td>750</td>
                </tr>
                <tr>
                    <td>Bibliotecas</td>
                    <td>Corredores y escaleras</td>
                    <td>400</td>
                </tr>
                <tr>
                    <td>Centros_de_Educación</td>
                    <td>Aulas</td>
                    <td>250</td>
                </tr>   
                <tr>
                    <td>Centros_de_Educación</td>
                    <td>Talleres</td>
                    <td>350</td>
                </tr>   
                <tr>
                    <td>Centros_de_Educación</td>
                    <td>Auditorio,Gimnacios,etc</td>
                    <td>400</td>
                </tr>   
                <tr>
                    <td>Centros_de_Educación</td>
                    <td>Laboratorios</td>
                    <td>300</td>
                </tr>   
                <tr>
                    <td>Centros_de_Educación</td>
                    <td>Corredores y escaleras</td>
                    <td>400</td>
                </tr>
                <tr>
                    <td>Garajes</td>
                    <td>Para parqueo exclusivo de vehiculos de pasajeros, con altura de entrada menor que 2.40 m</td>
                    <td>250</td>
                </tr>  
                <tr>
                    <td>Garajes</td>
                    <td>Para otros vehiculos</td>
                    <td>350</td>
                </tr>  
                <tr>
                    <td>Hospitales</td>
                    <td>Salas de operación, laboratorios, y áreas de servicio</td>
                    <td>300</td>
                </tr>
                <tr>
                    <td>Hospitales</td>
                    <td>Cuartos</td>
                    <td>200</td>
                </tr>
                <tr>
                    <td>Hospitales</td>
                    <td>Corredores y escaleras</td>
                    <td>400</td>
                </tr>
                <tr>
                    <td>Hoteles</td>
                    <td>Cuartos</td>
                    <td>200</td>
                </tr>
                <tr>
                    <td>Hoteles</td>
                    <td>Salas Publicas</td>
                    <td>400</td>
                </tr> 
                <tr>
                    <td>Hoteles</td>
                    <td>Almacenaje y servicios</td>
                    <td>500</td>
                </tr> 
                <tr>
                    <td>Hoteles</td>
                    <td>Corredores y escaleras</td>
                    <td>400</td>
                </tr> 
                <tr>
                    <td>Industria</td>
                    <td>Industria</td>
                    <td>400</td>
                </tr> 
                <tr>
                    <td>Instituciones_Penales</td>
                    <td>Celdas y zona de habitación</td>
                    <td>200</td>
                </tr>
                <tr>
                    <td>Instituciones_Penales</td>
                    <td>Zonas Públicas</td>
                    <td>400</td>
                </tr> 
                <tr>
                    <td>Instituciones_Penales</td>
                    <td>Corredores y escaleras</td>
                    <td>400</td>
                </tr> 
                <tr>
                    <td>Lugares_de_Asamblea</td>
                    <td>Con asientos fijos</td>
                    <td>400</td>
                </tr> 
                <tr>
                    <td>Lugares_de_Asamblea</td>
                    <td>Salones de baile, restaurantes, museos,gimnacios y vestibulos de teatros y cines</td>
                    <td>400</td>
                </tr>
                <tr>
                    <td>Lugares_de_Asamblea</td>
                    <td>Graderias y tribunas</td>
                    <td>500</td>
                </tr>
                <tr>
                    <td>Lugares_de_Asamblea</td>
                    <td>Corredores y escaleras</td>
                    <td>500</td>
                </tr>
                <tr>
                    <td>Oficinas</td>
                    <td>Exceptuando salas de archivo y computación</td>
                    <td>250</td>
                </tr>
                <tr>
                    <td>Oficinas</td>
                    <td>Salas de archivo</td>
                    <td>500</td>
                </tr>
                <tr>
                    <td>Oficinas</td>
                    <td>Salas de Computación</td>
                    <td>250</td>
                </tr> 
                <tr>
                    <td>Oficinas</td>
                    <td>Corredores y escaleras</td>
                    <td>400</td>
                </tr> 
                <tr>
                    <td>Teatros</td>
                    <td>Vestidores</td>
                    <td>200</td>
                </tr> 
                <tr>
                    <td>Teatros</td>
                    <td>Cuarto de Proyección</td>
                    <td>300</td>
                </tr>
                <tr>
                    <td>Teatros</td>
                    <td>Escenario</td>
                    <td>750</td>
                </tr>  
                <tr>
                    <td>Teatros</td>
                    <td>Zonas Públicas</td>
                    <td>400</td>
                </tr>  
                <tr>
                    <td>Tiendas</td>
                    <td>Tiendas</td>
                    <td>500</td>
                </tr>  
                <tr>
                    <td>Tiendas</td>
                    <td>Corredores y escaleras</td>
                    <td>500</td>
                </tr>
                <tr>
                    <td>Viviendas</td>
                    <td>Viviendas</td>
                    <td>200</td>
                </tr>
                <tr>
                    <td>Viviendas</td>
                    <td>Corredores y escaleras</td>
                    <td>200</td>
                </tr>             
            </tbody>
        </table>
    EOD;
    $pdf->writeHTML($Metrcv, true, false, false, false, '');

    // Obtener la altura de la página actual y la posición actual en Y
    $pageHeight = $pdf->getPageHeight(-5);
    $currentY = $pdf->GetY();

    // Calcular la mitad de la página
    $halfPage = $pageHeight / 2;

    // Definir un margen de seguridad para evitar que la tabla se imprima demasiado cerca del pie de página
    $margin = 90;

    // Verificar si estamos en la mitad o más cerca del final de la página actual
    if ($currentY >= $halfPage - $margin) {
        // Agregar una nueva página
        $pdf->AddPage();

        // Obtener la segunda mitad de las filas de la tabla
        $rows = explode('</tr>', $Metrcv);
        $half_rows = ceil(count($rows) / 2); // Dividir las filas en dos partes
        $second_half = implode('</tr>', array_slice($rows, $half_rows));

        // Escribir la segunda mitad de la tabla
        $pdf->writeHTML('<table>' . $second_half . '</table>', true, false, false, false, '');
    } else {
        // Si no estamos cerca del final de la página actual, simplemente escribir la tabla en la página actual
        $pdf->writeHTML($Metrcv, true, false, false, false, '');
    }



    if ($dat_factorUso == 1.5) {
        $pdf->SetFont('times', '', 9);
        $cvedificacion = <<<EOD
           <p>* Establecimiento de sector (Publicos y Privados) del segundo y tercer nivel 
           con aislamiento sismico en la Base(Zona 4,3,2,1).</p>
           <p>* Establecimiento de sector salud (Publicos y Privados) del segundo y tercer 
           nivel sin establecimiento de salud no comprendidos en la Categoria A1.</p>
        EOD;
        $pdf->writeHTML($cvedificacion, true, false, false, false, '');
    } else if ($dat_factorUso == 1.3) {
        $pdf->SetFont('times', '', 9);
        $cvedificacion = <<<EOD
            * Establecimiento de sector (Publicos y Privados) del segundo y tercer nivel con aislamiento sismico en la Base(Zona 4,3,2,1).
            * Establecimiento de sector salud (Publicos y Privados) del segundo y tercer nivel sin establecimiento de salud no comprendidos en la Categoria A1.
        EOD;
        $pdf->writeHTML($cvedificacion, true, false, false, false, '');
    } else if ($dat_factorUso == 1.0) {
        $pdf->SetFont('times', '', 9);
        $cvedificacion = <<<EOD
            <table >
                <tr>
                    <td>Concreto</td>
                    <td>2400 kgf/m<sup>3</sup></td>
                </tr>
                <tr>
                    <td>Albañilería</td>
                    <td>1800 kgf/m<sup>3</sup></td>
                </tr>
                <tr>
                    <td>Aligerado (h=20cm)</td>
                    <td>300 kgf/m</td>
                </tr>
                <tr>
                    <td>Carga muerta general</td>
                    <td>200 kgf/m<sup>2</sup></td>
                </tr>
                <tr>
                    <td>Tarrajeo</td>
                    <td>2000 kgf/m<sup>2 </sup></td>
                </tr>
            </table>
        EOD;
        $pdf->writeHTML($cvedificacion, true, false, false, false, '');
    } else {
        $pdf->SetFont('times', '', 9);
        $cvedificacion = <<<EOD
            <table >
                <tr>
                    <td>Concreto</td>
                    <td>2400 kgf/m<sup>3</sup></td>
                </tr>
                <tr>
                    <td>Albañilería</td>
                    <td>1800 kgf/m<sup>3</sup></td>
                </tr>
                <tr>
                    <td>Aligerado (h=20cm)</td>
                    <td>300 kgf/m</td>
                </tr>
                <tr>
                    <td>Carga muerta general</td>
                    <td>200 kgf/m<sup>2</sup></td>
                </tr>
                <tr>
                    <td>Tarrajeo</td>
                    <td>2000 kgf/m<sup>2 </sup></td>
                </tr>
            </table>
        EOD;
        $pdf->writeHTML($cvedificacion, true, false, false, false, '');
    }

    if (isset($_POST['dataCViva'])) {
        // Obtener los datos JSON del input oculto
        $imagesCV = $_POST['dataCViva'];

        // Decodificar los datos JSON a un array asociativo
        $datosimgCV = json_decode($imagesCV, true);

        // Verificar si la decodificación fue exitosa
        if ($datosimgCV === null && json_last_error() !== JSON_ERROR_NONE) {
            // Error al decodificar los datos JSON
            $pdf->MultiCell(0, 10, 'Error al decodificar los datos JSON.', 0, 'L');
        } else {
            // Los datos se decodificaron correctamente
            foreach ($datosimgCV as $fila) {
                // Verificar si existe la clave 'imagen' en la fila
                $descripcionImagencv = $fila['descripcionCE'];
                if (isset($fila['imagenCE'])) {
                    // Obtener el tipo de imagen (png, jpeg, etc.)
                    $tipoImagen = explode(';', $fila['imagenCE'])[0];
                    $tipoImagen = explode(':', $tipoImagen)[1];

                    // Obtener los datos base64 de la imagen
                    $datosImagen = explode(',', $fila['imagenCE'])[1];

                    // Crear una imagen a partir de los datos base64
                    $imagen = base64_decode($datosImagen);

                    // Guardar la imagen temporalmente
                    $rutaImagenTemp = tempnam(sys_get_temp_dir(), 'img');
                    file_put_contents($rutaImagenTemp, $imagen);

                    // Verificar si hay suficiente espacio en la página actual
                    $espacioDisponible = $pdf->getPageHeight() - $pdf->GetY();
                    $alturaImagen = 80; // Supongamos que la altura de la imagen es fija en 80
                    if ($espacioDisponible < $alturaImagen + 20) { // Consideramos también el espacio para la descripción
                        // No hay suficiente espacio, agregar nueva página
                        $pdf->AddPage();
                    }

                    // Mostrar la imagen en el PDF
                    $pdf->Ln(2);
                    $pdf->Image($rutaImagenTemp, 70, $pdf->GetY(), 80, 80);
                    $pdf->Ln(80);
                    $pdf->Cell(0, 10, $descripcionImagencv, 0, 1, 'C');
                    // Borrar la imagen temporal después de usarla
                    unlink($rutaImagenTemp);

                    $pdf->Ln(); // Salto de línea después de la imagen
                } else {
                    $pdf->MultiCell(0, 10, 'Datos de imagen no válidos.', 0, 'L');
                }
            }
        }
    } else {
        // El input oculto dataCE no está presente en los datos del formulario
        $pdf->MultiCell(0, 10, 'No se recibieron datos del formulario.', 0, 'L');
    }


    // fixed link to the first page using the * character
    $html = '<a href="#*1" style="color:blue;">link to INDEX (page 1)</a>';
    $pdf->writeHTML($html, true, false, true, false, '');
    //----------------------------------------------------------------

    $pdf->AddPage();
    $pdf->SetFont('times', 'BI', 12);
    // set a bookmark for the current position
    $pdf->Bookmark('3. ANÁLISIS SÍSMICO', 0, 0, '', 'B', array(0, 64, 128));
    //print a line using Cell()
    $pdf->Cell(0, 10, '3. ANÁLISIS SÍSMICO', 0, 1, 'L');

    $pdf->AddPage();
    $pdf->Bookmark('3.1. VERIFICACIÓN DE IRREGULARIDAD', 1, 0, '', '', array(128, 0, 0));
    $pdf->Cell(0, 10, '3.1. VERIFICACIÓN DE IRREGULARIDAD', 0, 1, 'L');

    $pdf->AddPage();
    $pdf->Bookmark('3.2.ANÁLISIS SÍSMICO ESTÁTICO', 1, 0, '', '', array(128, 0, 0));
    $pdf->Cell(0, 10, '3.2. ANÁLISIS SÍSMICO ESTÁTICO', 0, 1, 'L');

    $pdf->AddPage();
    $pdf->Bookmark('3.3. ANÁLISIS SÍSMICO DINÁMICO', 1, 0, '', '', array(128, 0, 0));
    $pdf->Cell(0, 10, '3.3. ANÁLISIS SÍSMICO DINÁMICO', 0, 1, 'L');

    $pdf->AddPage();
    $pdf->Bookmark('3.4. JUNTA SÍSMICA ENTRE LOS MÓDULOS', 1, 0, '', '', array(128, 0, 0));
    $pdf->Cell(0, 10, '3.4.JUNTA SÍSMICA ENTRE LOS MÓDULOS', 0, 1, 'L');

    //----------------------------------------------------------------

    $pdf->AddPage();

    // set a bookmark for the current position
    $pdf->Bookmark('4. DISEÑO DE ELEMENTOS ESTRUCTURALES', 0, 0, '', 'B', array(0, 64, 128));
    //print a line using Cell()
    $pdf->Cell(0, 10, '4. DISEÑO DE ELEMENTOS ESTRUCTURALES', 0, 1, 'L');

    $pdf->AddPage();

    $pdf->AddPage();
    $pdf->Bookmark('4.1. DISEÑO DE LOSAS ALIGERADAS', 1, 0, '', '', array(128, 0, 0));
    $pdf->Cell(0, 10, '4.1. DISEÑO DE LOSAS ALIGERADAS', 0, 1, 'L');

    $pdf->AddPage();
    $pdf->Bookmark('4.2. DISEÑO DE ESCALERAS', 1, 0, '', '', array(128, 0, 0));
    $pdf->Cell(0, 10, '4.2. DISEÑO DE ESCALERAS', 0, 1, 'L');

    $pdf->AddPage();
    $pdf->Bookmark('4.3. DISEÑO DE VIGAS', 1, 0, '', '', array(128, 0, 0));
    $pdf->Cell(0, 10, '4.3. DISEÑO DE VIGAS', 0, 1, 'L');

    $pdf->AddPage();
    $pdf->Bookmark('4.4. DISEÑO DE PLACAS (MUROS DE CORTE)', 1, 0, '', '', array(128, 0, 0));
    $pdf->Cell(0, 10, '4.4. DISEÑO DE PLACAS (MUROS DE CORTE)', 0, 1, 'L');

    $pdf->AddPage();
    $pdf->Bookmark('4.5. DISEÑO DE MUROS PORTANTES', 1, 0, '', '', array(128, 0, 0));
    $pdf->Cell(0, 10, '4.5. DISEÑO DE MUROS PORTANTES', 0, 1, 'L');

    $pdf->AddPage();
    $pdf->Bookmark('4.6. DISEÑO DE CIMENTACIÓN', 1, 0, '', '', array(128, 0, 0));
    $pdf->Cell(0, 10, '4.6. DISEÑO DE CIMENTACIÓN', 0, 1, 'L');

    //----------------------------------------------------------------
    $pdf->AddPage();
    // set a bookmark for the current position
    $pdf->Bookmark('5. CONCLUSIONES Y RECOMENDACIONES', 0, 0, '', 'B', array(0, 64, 128));
    //print a line using Cell()
    $pdf->Cell(0, 10, '5. CONCLUSIONES Y RECOMENDACIONES', 0, 1, 'L');

    // add some pages and bookmarks
    // for ($i = 2; $i < 12; $i++) {
    //     $pdf->AddPage();
    //     $pdf->Bookmark('Chapter ' . $i, 0, 0, '', 'B', array(0, 64, 128));
    //     $pdf->Cell(0, 10, 'Chapter ' . $i, 0, 1, 'L');
    // }

    // . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .
    // add a new page for TOC
    $pdf->addTOCPage();

    // write the TOC title
    $pdf->SetFont('times', 'B', 16);
    $pdf->MultiCell(0, 0, 'CONTENIDO', 0, 'C', 0, 1, '', '', true, 0);
    $pdf->Ln();

    $pdf->SetFont('dejavusans', '', 12);

    // add a simple Table Of Content at first page
    // (check the example n. 59 for the HTML version)
    $pdf->addTOC(2, 'courier', '.', 'INDEX', 'B', array(128, 0, 0));

    // end of TOC page
    $pdf->endTOCPage();

    // ---------------------------------------------------------


    //MATERIALES DE DISEÑO
    //Obtener el contenido del PDF como una cadena
    $pdfContent = $pdf->Output('MemoriaCalculo.pdf', 'S');
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="MemoriaCalculo.pdf"');
    echo $pdfContent;
    exit;
}
