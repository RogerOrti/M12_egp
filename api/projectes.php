<?php

// session_start();

require_once '../php_library/bd.php';

header("Content-Type: application/json");

$id_usuari = $_SESSION['usuari']['id'];

$conn = openBD();

$sentencia_text = "SELECT p.id, p.nom 
FROM projectes p
INNER JOIN usuaris_projecte_rol upr ON p.id = upr.id_projectes
WHERE upr.id_usuaris = :id_usuari";

$sentencia = $conn->prepare($sentencia_text);
$sentencia->bindParam(':id_usuari', $id_usuari, PDO::PARAM_INT);
$sentencia->execute();
$sentencia->setFetchMode(PDO::FETCH_ASSOC);
$resultat = $sentencia->fetchAll();
echo json_encode($resultat);

$conn = null;