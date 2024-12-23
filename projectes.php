<?php

    require_once './php_library/bd.php';


    $projectes = select_projectes($_SESSION['nom']);


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

<?php

    print_r($_SESSION['usuari']);

?>



</body>
<script src="bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
</html>