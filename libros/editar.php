<?php
require_once('../conexion.php');
$id = $_GET['id'];

$query = "SELECT * FROM libros WHERE  id = $id";
$result = mysqli_query($con, $query);
$data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Document</title>
</head>

<body>
    <h2>Bievenido a la Biblioteca Del Valle</h2>
    <h3>Actualizar Libro</h3>
    <div class="formulario">
        <form action="save.php" method="post">
            <input type="hidden" name="id" value=" <?php echo $data['id']; ?>">
            <label for="">Titulo Del Libro </label><br>
            <input type="text" name="titulo" id="titulo" value=" <?php echo $data['titulo'];?>"><br>
            <label for="">Autor Del Libro</label><br>
            <input type="text" name="id_autor" id="id_autor" value="<?php echo $data['id_autor'];?>"><br>
            <label for="">Estado</label><br>
            <select name="disponible" id="disponible" required>
                <option value="1">Disponible</option>
                <option value="0">No Disponible</option>
            </select>
            <br>
            <label for="">Subir Foto</label><br>
            <input type="file" name="imagen" id="imagen">
            <br><br>
            <button type="submit">Actualizar</button>
            <button><a href="index.php">Inicio</a></button>
            <!-- <input type="button" value="regresar" onclick="location.href='index.php'">
     -->
        </form>
    
    </div>


</body>

</html>