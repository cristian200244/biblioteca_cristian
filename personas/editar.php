<?php

require_once('../conexion.php');
$id = $_GET['id'];

$query = "SELECT * FROM personas WHERE  id = $id";
$result = mysqli_query($con, $query);
$data = mysqli_fetch_assoc($result);

$query = "SELECT p.id, CONCAT(IFNULL(primer_nombre,''),' ',IFNULL(segundo_nombre,''),' ',IFNULL(primer_apellido,''),' ',IFNULL(segundo_apellido,'')) AS nombre_completo, r.nombre AS rol, p.estado FROM personas AS p JOIN roles AS r ON r.id = p.id_rol WHERE p.estado = 1";
$personas = mysqli_query($con, $query) or die(mysqli_error($con));


$query = "SELECT id, nombre FROM roles WHERE estado = 1";
$roles = mysqli_query($con, $query) or die(mysqli_error($con));


$query = "SELECT * FROM personas WHERE  id = $id";
$result = mysqli_query($con, $query);
$data = mysqli_fetch_assoc($result);
?>
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>

<body>
    <h2>Bievenido a la Biblioteca Del Valle</h2>
    <h3>Actualizar Libro</h3>
    <div class="formulario">
        <form action="save.php" method="post">

          

            <label for="primer_nombre">primer nombre</label><br>
            <input type="text" name="primer_nombre" id="primer_nombre" required><br>

            <label for="segundo_nombre">segundo nombre</label><br>
            <input type="text" name="segundo_nombre" id="segundo_nombre" required><br>

            <label for="primer_apellido">primer apellido</label><br>
            <input type="text" name="primer_apellido" id="primer_apellido" required><br>

            <label for="segundo_apellido">segundo apellido</label><br>
            <input type="text" name="segundo_apellido" id="segundo_apellido"><br>

            <label for="email">correo electronico</label><br>
            <input type="text" name="email" id="email"><br>

            <label for="rol">Rol</label><br>
            <select id="id_rol" name="id_rol" required>
                <option selected>Seleccione una Opcion...</option>
                <?php foreach ($roles as $rol) : ?>
                    <option value="<?= $rol['id'] ?>"><?= $rol['nombre']  ?></option>";
                <?php endforeach ?>
                ?>
            </select>
            <br>
            <label for="biografia">Biografia</label><br>
            <textarea name="biografia" id="biografia" cols="20" rows="5"></textarea>

            <button type="submit">Actualizar</button>
            <button><a href="index.php">Inicio</a></button>
        </form>
    </div>
</body>

</html>