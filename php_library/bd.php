<?php

session_start();

function errorMessage($e)
{

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

  } else {
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

function openBD()
{

  $servername = "localhost";
  $username = "root";
  $password = "mysql";

  try {

    $conn = new PDO("mysql:host=$servername;dbname=egp", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";

  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }

  return $conn;
}


function register_usuari($nom_usuari, $password)
{

  $conn = openBD();

  try {

    $password_xifrada = password_hash($password, PASSWORD_DEFAULT);

    $sentencia_text = "INSERT INTO usuaris(nom, contrasenya) VALUES (:nom, :contrasenya)";
    $sentencia = $conn->prepare($sentencia_text);
    $sentencia->bindParam(':nom', $nom_usuari);
    $sentencia->bindParam(':contrasenya', $password_xifrada);
    $sentencia->execute();

    $_SESSION['mensaje'] = 'Registre afegit corrctament';
  } catch (PDOException $e) {

    $_SESSION['error'] = $e->getCode() . ' - ' . $e->getMessage();
  }
  $conn = null;
}


function verificar_usuari($nom_usuari, $password)
{

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

function select_projecte($id_projecte){

  $conn = openBD();

  try {
    
    $sentencia_text = "SELECT * FROM projectes WHERE id = :id";
    $sentencia = $conn->prepare($sentencia_text);
    $sentencia->bindParam(":id", $id_projecte);
    $sentencia->execute();
    $resultat = $sentencia->fetch();

    return $resultat;
    
  } catch (PDOException $e) {
    $_SESSION['error'] = $e->getCode() . ' - ' . $e->getMessage();
  }


  $conn = null;
}



function select_projectes($id_usuari)
{

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

  } catch (PDOException $e) {

    $_SESSION['error'] = $e->getCode() . ' - ' . $e->getMessage();
  }

  $conn = null;
}

function crear_projectes($nom_projecte)
{

  $conn = openBD();

  $id_usuari = $_SESSION['usuari']['id'];

  $conn->beginTransaction();

  try {

    $sentencia_text = "INSERT INTO projectes (nom) VALUES (:nom)";
    $sentencia = $conn->prepare($sentencia_text);
    $sentencia->bindParam(':nom', $nom_projecte);
    $sentencia->execute();
    $id_projecte = $conn->lastInsertId();

    $sentencia_text = "SELECT id FROM rol WHERE rol = 'admin'";
    $sentencia = $conn->prepare($sentencia_text);
    $sentencia->execute();
    //Ens retorna una unica columna. Podria fer servir fetch i agafar l'id del array
    $id_rol = $sentencia->fetchColumn();

    $sentencia_text = "INSERT INTO usuaris_projecte_rol (id_usuaris, id_projectes, id_rol) VALUES (:id_usuari, :id_projecte, :id_rol)";
    $sentencia = $conn->prepare($sentencia_text);
    $sentencia->bindParam(":id_usuari", $id_usuari);
    $sentencia->bindParam("id_projecte", $id_projecte);
    $sentencia->bindParam(":id_rol", $id_rol);
    $sentencia->execute();

    $conn->commit();

  } catch (PDOException $e) {

    $conn->rollBack();
    $_SESSION['error'] = $e->getCode() . ' - ' . $e->getMessage();
  }

  $conn = null;

}

function borrar_projecte($id_projecte)
{
    $conn = openBD();

    $conn->beginTransaction(); 
    try {
        
        $sentencia_text = "DELETE FROM usuaris_projecte_rol WHERE id_projectes = :id";
        $sentencia = $conn->prepare($sentencia_text);
        $sentencia->bindParam(":id", $id_projecte);
        $sentencia->execute();

        $sentencia_text = "DELETE FROM projectes WHERE id = :id";
        $sentencia = $conn->prepare($sentencia_text);
        $sentencia->bindParam(":id", $id_projecte);
        $sentencia->execute();


        $conn->commit(); 
    } catch (PDOException $e) {
        $conn->rollBack(); 
        $_SESSION['error'] = $e->getCode() . ' - ' . $e->getMessage();
    }

    $conn = null;
}


