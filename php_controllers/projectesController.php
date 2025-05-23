<?php

// session_start();

require_once "../php_library/bd.php";

if(isset($_POST['crear_projectes'])){

    $nom_projecte = $_POST['nom_projecte'];

    crear_projectes($nom_projecte);

    if (isset($_SESSION['error'])) {

        header("Location: ../projectes.php");
        exit();
    }

    header("Location: ../projectes.php");

}


if(isset($_POST['borrar_projecte'])){

    $id_projecte = $_POST['id_projecte'];

    borrar_projecte($id_projecte);

    if (isset($_SESSION['error'])) {

        header("Location: ../projectes.php");
        exit();
    }

    header("Location: ../projectes.php");

}