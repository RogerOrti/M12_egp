<?php

require_once "../php_library/bd.php";


header("Content-Type: application/json");

$id_usuari = $_SESSION['usuari']['id'];
$conn = openBD();

$sentencia_text = "SELECT p.id, p.nom 
FROM projectes p
INNER JOIN usuaris_projecte_rol upr ON p.id = upr.id_projectes
WHERE upr.id_usuaris = :id_usuari";

try {
    $sentencia = $conn->prepare($sentencia_text);
    $sentencia->bindParam(':id_usuari', $id_usuari);
    $sentencia->execute();
    $resultat = $sentencia->fetchAll();

} catch (PDOException $e) {
    $_SESSION['error'] = "Error: " . $e->getMessage();
}

echo json_encode($resultat);