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
elseif (isset($_POST['logout'])) {
    session_start();
    
    session_unset();
    session_destroy();

    header('Location: ../index.php');
exit;
}
if (isset($_POST['registre'])) {

    if ($_POST['contrasenya'] == $_POST['confirmar_contrasenya']) {
        register_usuari($_POST['nom'], $_POST['contrasenya']);

        if (isset($_SESSION['error'])) {

            header('Location: ../register.php');
            exit();
        }

        header('Location: ../login.php');
    }
}