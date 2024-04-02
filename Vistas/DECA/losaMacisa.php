<?php
session_start();
if ($_SESSION['us_tipo'] == 1 || $_SESSION['us_tipo'] == 2) {
?>

<head>
    <style>
        .row {
            height: 80vh;
        }

        #formContainer {
            height: 100%;
            overflow-y: auto;
        }

        #resultadosContainer {
            height: 100%;
            overflow-y: auto;
        }

        .form-group input {
            max-width: 200px;
        }

        .form-group {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<?php
include_once "assets/views/header.php";
include_once "assets/views/nav.php";
?>
<div class="content-wrapper">
    <section class="content-header">

        <div class="d-flex justify-content-between">
            <h1>DISEÑO DE LOSA MACISA</h1>
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="../adm_principal.php">Inicio</a></li>
                <li class="breadcrumb-item active">Diseño de Losa Macisa</li>
            </ol>

        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 px-4" id="formColumn">
                <div class="d-flex justify-content-between align-items-center">
                    <button class="btn btn-primary" type="button" id="toggleFormButton">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                </div>
                <div id="formContainer">
                    <div class="card">
                        <div class="card-header">
                            <h3>Datos generales</h3>
                        </div>
                        <div class="card-body">
                            <form id="datosForm">
                                <div class="form-group text-center d-flex flex-column">
                                    <label for="fy" class="d-block">Fy</label>
                                    <div class="input-group-append">
                                        <input type="number" class="form-control" id="fy" name="fy" step="0.01" required value="4200">
                                        <span class="input-group-text">Kg/cm²</span>
                                    </div>
                                </div>
                                <div class="form-group text-center d-flex flex-column">
                                    <label for="fdc">f'c</label>
                                    <div class="input-group-append">
                                        <input type="number" class="form-control" id="fdc" name="fdc" step="0.01" required value="210">
                                        <span class="input-group-text">Kg/cm²</span>
                                    </div>
                                </div>
                                <div class="form-group text-center d-flex flex-column">
                                    <label for="t">t</label>
                                    <div class="input-group-append">
                                        <input type="number" class="form-control" id="t" name="t" step="0.01" required value="60">
                                        <span class="input-group-text">cm</span>
                                    </div>
                                </div>
                                <div class="form-group text-center d-flex flex-column">
                                    <label for="b">b</label>
                                    <div class="input-group-append">
                                        <input type="number" class="form-control" id="b" name="b" step="0.01" required value="100">
                                        <span class="input-group-text">cm</span>
                                    </div>
                                </div>
                                <div class="form-group text-center d-flex flex-column">
                                    <label for="mu">Mu</label>
                                    <div class="input-group-append">
                                        <input type="number" class="form-control" id="mu" name="mu" step="0.01" required value="1400000">
                                        <span class="input-group-text">(Kg-cm)</span>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Calcular</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9" id="resultadosContainer">
                <div class="card">
                    <div class="card-header">
                        <h3>Resultados</h3>
                    </div>
                    <div class="card-body">
                        <table class="table" id="reqData" style="display: none;">
                            <thead style="font-size: 13px;background-color: #4e5c77; color:white">
                                <tr>
                                    <th colspan="2">1. REQUISITO DE DISEÑO</th>
                                    <th scope="col">DATOS
                                    <th>
                                </tr>
                            </thead>
                            <tbody style=" font-size: 11px;">
                                <tr>
                                    <td>Esfuerzo de fluencia del acero</td>
                                    <td>Fy</td>
                                    <td id="fyVal"></td>
                                </tr>
                                <tr>
                                    <td>Esfuerzo a compresion del concreto</td>
                                    <td>f'c</td>
                                    <td id="fcVal"></td>
                                </tr>
                                <tr>
                                    <td>t</td>
                                    <td>t</td>
                                    <td id="tVal"></td>
                                </tr>
                                <tr>
                                    <td>b</td>
                                    <td>b</td>
                                    <td id="bVal"></td>
                                </tr>
                                <tr>
                                    <td>Mu</td>
                                    <td>Mu </td>
                                    <td id="muVal"></td>
                                </tr>
                            </tbody>

                        </table>

                        <div id="resultados"></div>
                        <div id="resultados2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="./js/losaMacisa.js"></script>

<?php
include_once "assets/views/footer.php";
} else {
    header('Location: ../login.php');
}
?>