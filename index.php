<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <title>EGP-Eina Gestio Projectes</title>
</head>
<body>

<?php 

  include_once 'php_partials/menu.php';
  
?>

<?php if (isset($_SERVER['nom'])) { ?>

  <div class="container">
    <div class="card">
      <div class="card-body">
        <h1 class="card-title"></h1>
      </div>
    </div>
  </div>

<?php } else {?> 

  <div></div>

<?php } ?>



</body>
<script src="bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
</html>