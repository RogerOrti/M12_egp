<?php

require_once "../php_library/bd.php";


header("Content-Type: application/json");

$conn = openBD();

$sentencia_text = "SELECT p.* 
FROM projectes p
INNER JOIN usuaris_projecte_rol upr ON p.id = upr.id_projectes
WHERE upr.id_usuaris = :id_usuari";

$sentencia = $conn->prepare($sentencia_text);
$sentencia->bindParam(':id_usuari', $id_usuari);
$sentencia->execute();

$resultat = $sentencia->fetchAll();

echo json_encode($resultat);