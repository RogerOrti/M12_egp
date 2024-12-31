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

<?php

    include_once 'php_partials/missatges.php'

?>
<div class="container">
    <div class="row ">
        <div class="col-12 col-md-6 col-lg-4 mt-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Projecte 1</h5>
                    <a href="#" class="btn btn-primary">Accedir projecte</a>
                </div>
            </div>
        </div>
    </div>
</div>






<div class="container mt-5 d-flex justify-content-center">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Nou projecte
    </button>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Projecte</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="php_controllers/projectesController.php" method="POST">
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nom projecte</label>
                    <input type="text" class="form-control" name="nom_projecte">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="crear_projectes">Crear projecte</button>
            </div>
        </form>
        </div>
    </div>
    </div>
</div>

</body>
<script src="bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
<script src="scripts/projectes.js"></script>
</html>