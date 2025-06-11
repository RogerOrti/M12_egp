<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <title>Login</title>
</head>
<body>
    <?php 
        include_once 'php_partials/menu.php';  
    ?>
    <div class="container mt-5">
        <h2 class="text-center">Inici sessió</h2>
        <p>Prova de deploy</p>   
        <p>Prova de deploy 2</p>
        <h1>PROVA hola que tal</h1>   
        
    <?php 
        include_once('php_partials/missatges.php');  
    ?>
        <form class="mx-auto" style="max-width: 400px;" action="php_controllers/UsuariController.php" method="POST">
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>
        <div class="mb-3">
            <label for="contrasenya" class="form-label">Contrasenya</label>
            <input type="password" class="form-control" id="contrasenya" name="contrasenya" required>
            <span><a href="register.php">No tens compte? Registra't ara!</a></span>
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-primary" name="iniciar">Iniciar sessió</button>
        </div>
        </form>
    </div>
</body>
<script src="bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
</html>