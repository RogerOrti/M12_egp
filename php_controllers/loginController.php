<?php           
session_start();

require_once "../php_library/bd.php";

if (isset($_POST['iniciar'])) {

    $usuari = verificar_usuari($_POST['nom'], $_POST['contrasenya']);

    if (!$usuari) {

        $_SESSION['mensaje'] = 'Usuari o contrasenya incorrectes';
        header('Location: ../login.php');
        exit();
    }

    $_SESSION['usuari'] = $usuari;

    header('Location: ../projectes.php');
    exit();
}
