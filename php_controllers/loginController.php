<?php           

session_start();

require_once("../php_library/bd.php");

if(isset($_POST['iniciar'])){       

    verificar_usuari($_POST['nom'],$_POST['contrasenya']);

    if (isset($_SESSION['error'])) {

        header('Location: ../login.php');
        exit();
    }

    $_SESSION['nom'] = $_POST['nom'];

    header('Location: ../index.php');
}