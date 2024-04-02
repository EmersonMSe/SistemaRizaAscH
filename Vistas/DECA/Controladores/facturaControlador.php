<?php
require_once '../../../vendor/autoload.php';

use JossMP\Sunat\Ruc;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ruc = $_POST['ruc_empresa'];
    $sunat = new Ruc();
    $empresa = $sunat->get($ruc);
    echo json_encode($empresa);
}
?>
