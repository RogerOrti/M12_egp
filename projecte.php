<?php

    require_once "php_library/bd.php";

    $id_projecte = isset($_GET['id']) ? $_GET['id'] : null;

    $projecte = select_projecte($id_projecte);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <title>Projecte</title>
</head>
<body>
    <?php 
        include_once 'php_partials/menu.php';  
    ?>
    <?php 
        include_once 'php_partials/missatges.php';  
    ?>

<div class="container mt-3">
        <h1><?php echo $projecte['nom']?></h1>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-danger mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Esborrar projecte
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Esborrar projecte</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Segur que vols esborrar el projecte?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tancar</button>
        <form action="php_controllers/projectesController.php" method="POST">
            <input type="hidden" value='<?php echo $id_projecte ?>' name="id_projecte">
            <button type="submit" class="btn btn-danger" name="borrar_projecte">Borrar</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>



</body>
<script src="bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
</html>