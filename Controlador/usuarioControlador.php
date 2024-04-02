<?php
include_once '../Modelo/usuarioModelo.php';
session_start();
$user = $_POST['email'];
$pass = $_POST['password'];
$Usuario = new Usuario();
if (!empty($_SESSION['us_tipo'])) {
    switch ($_SESSION['us_tipo']) {
        case 1:
            header('location: ../Vistas/adm_principal.php');
            break;

        case 2:
            header('location: ../Vistas/adm_Jefe.php');
            break;
        
        case 3:
            header('location: ../Vistas/adm_principal.php');
            break;
    }
}
else {
    $Usuario->logearse($user,$pass);
    if(!empty($Usuario->objetos)){
        foreach ($Usuario->objetos as $objetos){
            $_SESSION['Usuario'] = $objetos->id_usuario;
            $_SESSION['us_tipo'] = $objetos->us_tipo;
            $_SESSION['nombre_us'] = $objetos->nombre_us;
            $_SESSION["apellidos_us"]=$objetos->apellidos_us;
        }
        switch ($_SESSION['us_tipo']) {
            case 1:
                header('location: ../Vistas/adm_principal.php');
                break;

            case 2:
                header('location: ../Vistas/adm_Jefe.php');
                break;
            
            case 3:
                header('location: ../Vistas/adm_principal.php');
                break;
        }

    }
    else {
        header('location: ../login.php');
    }
}
