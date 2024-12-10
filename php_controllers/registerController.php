<?php       

session_start();

require_once("../php_library/bd.php");

if (isset($_POST['registre'])) {

    if ($_POST['contrasenya'] == $_POST['confirmar_contrasenya']) {
        register_usuari($_POST['nom'], $_POST['contrasenya']);

        if (isset($_SESSION['error'])) {

            header('Location: register.php');
            exit();
        }

        header('Location: login.php');
    }
    else {
        
    }

}