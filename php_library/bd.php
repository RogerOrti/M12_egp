<?php

session_start();

function errorMessage($e){

  if (!empty($e->errorInfo[1])) {

      switch ($e->errorInfo[1]) {
          case 1062:
              $mensaje = "Registre duplicat";
          break;
          case 1451:
              $mensaje = "Registre amb elements relacionats";
          break;
          default:
              $mensaje = $e->errorInfo[1] . ' - ' . $e->errorInfo[2];
          break;
      }
      
  }
  else {
      switch ($e->getCode()) {
          case '1044':
              $mensaje = "Usuari i/o password incorrectes";
          break;
          case '1049':
              $mensaje = "Base de dades desconeguda";
          break;
          case '2002':
              $mensaje = "Registre amb elements relacionats";
          break;
          
          default:
              $mensaje = $e->errorInfo[1] . ' - ' . $e->getMessage();
          break;
      }
  }
}

function openBD(){

    $servername = "localhost";
    $username = "root";
    $password = "";
    
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

    try {

      $password_xifrada = password_hash($password, PASSWORD_DEFAULT);

      $sentencia_text = "INSERT INTO usuaris(nom, contrasenya) VALUES (:nom, :contrasenya)";
      $sentencia = $conn->prepare($sentencia_text);
      $sentencia->bindParam(':nom', $nom_usuari);
      $sentencia->bindParam(':contrasenya', $password_xifrada);
      $sentencia->execute();

      $_SESSION['mensaje'] = 'Registre afegit corrctament';
    }
    catch (PDOException $e) {

      $_SESSION['error'] = $e->getCode() . ' - ' . $e->getMessage();
    }
    $conn = null;
}


function verificar_usuari($nom_usuari, $password) {

  $conn = openBD();

  try {
    $sentencia_text = "SELECT * FROM usuaris WHERE nom = :nom";
    $sentencia = $conn->prepare($sentencia_text);
    $sentencia->bindParam(':nom', $nom_usuari);
    $sentencia->execute();
    $resultat = $sentencia->fetch(PDO::FETCH_ASSOC);

    if ($resultat && password_verify($password, $resultat['contrasenya'])) {

      return [
          'id' => $resultat['id'],
          'nom' => $resultat['nom']
      ];
    }

  } catch (PDOException $e) {

    $_SESSION['error'] = $e->getCode() . ' - ' . $e->getMessage();
  }

  $conn = null;


}

function select_projectes($id_usuari){

  $conn = openBD();

  try {
    $sentencia_text = "SELECT p.* 
    FROM projectes p
    INNER JOIN usuaris_projecte_rol upr ON p.id = upr.id_projectes
    WHERE upr.id_usuaris = :id_usuari";

    $sentencia = $conn->prepare($sentencia_text);
    $sentencia->bindParam(':id_usuari', $id_usuari);
    $sentencia->execute();

    $resultat = $sentencia->fetchAll();

    return $resultat;

  } catch (\PDOException $e) {

    $_SESSION['error'] = $e->getCode() . ' - ' . $e->getMessage();
  }
  
  $conn = null;
}