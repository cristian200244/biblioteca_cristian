<?php

include_once('../conexion.php');

$id = $_GET['id'];

$query  = "SELECT * FROM libros WHERE id = $id";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$libro  = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>Biblioteca :: Libro</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Información del Libro</h1>
                <div class="card" style="width: 20rem;">
                    <img src="../images/<?= $id ?>.webp" class="card-img-top img-thumbnail rounded" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $libro['titulo'] ?></h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="../index.php" class="btn btn-primary">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>