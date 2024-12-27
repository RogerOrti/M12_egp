<?php

    require_once './php_library/bd.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <title>Projectes</title>
</head>
<body>
<?php 

    include_once 'php_partials/menu.php';

?>

<div class="container mt-5 d-flex justify-content-center">
    <button class="btn btn-primary " id="crear_projectes">Crear projectes</button>
</div>

</body>
<script src="bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
<script src="scripts/projectes.js"></script>
</html>