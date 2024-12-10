<?php 

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registre</title>
</head>
<body>
    
    <?php 

        include_once('php_partials/menu.php'); 

    ?>
  <div class="container mt-5">
    <h2 class="text-center">Registre</h2>

    <?php
    
      include_once('php_partial/missatges.php');
    
    
    ?>


    <form class="mx-auto" style="max-width: 400px;" action="php_controllers/registerController.php" method="POST">
      <!-- Camp Nom -->
      <div class="mb-3">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" class="form-control" id="nom" name="nom" placeholder="Escriu el teu nom" required>
      </div>

      <!-- Camp Contrasenya -->
      <div class="mb-3">
        <label for="contrasenya" class="form-label">Contrasenya</label>
        <input type="password" class="form-control" id="contrasenya" name="contrasenya" placeholder="Escriu una contrasenya" required>
      </div>

      <div class="mb-3">
        <label for="contrasenya" class="form-label">Confirmar Contrasenya</label>
        <input type="password" class="form-control" id="confirmar_contrasenya" name="confirmar_contrasenya" placeholder="Torna a escriure la contrasenya" required>
      </div>

      <!-- Botó Envia -->
      <div class="d-grid">
        <button type="submit" class="btn btn-primary" name="registre">Registrar-se</button>
      </div>
    </form>
  </div>


</body>
<script src="bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
</html>