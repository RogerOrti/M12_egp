<?php

function openBD(){

    $servername = "localhost";
    $username = "root";
    $password = "mysql";
    
    try {

      $conn = new PDO("mysql:host=$servername;dbname=egp", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Connected successfully";

    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }

    return $conn;
}



function register_usuari($nom_usuari, $password){

    $conn = openBD();

    $sentencia_text = "INSERT INTO usuaris(nom, contrasenya) VALUES (:nom, :contrasenya)";
    $sentencia = $conn->prepare($sentencia_text);
    $sentencia->bindParam(':nom', $nom_usuari);
    $sentencia->bindParam(':contrasenya', $password);
    $sentencia->execute();

    $conn = null;


}