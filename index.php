<?php
include_once("conexion.php");


$query  = "SELECT * FROM libros";
$libros = mysqli_query($con, $query);
$libro = mysqli_fetch_assoc($libros);

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

    <div class="formulario">
        <button><a href="./personas">personas</a></button>
        <form action="libros/save.php" method="post"><br>
            <div class="field">

                <label for="">Titulo Del Libro </label><br>
                <input type="text" name="titulo" id="titulo" required><br>
                
                <label for="id_autor">Autor Del Libro </label><br>
                <input type="text" name="id_autor" id="id_autor" required><br>
                
                <label for="">Estado </label><br>
                <select name="disponible" id="disponible">
                    <option value="1">Disponible</option>
                    <option value="0">No Disponible</option>
                </select>
                <br>
            </div>
            <label for="">Subir Foto</label><br>
            <input type="file" name="imagen" id="imagen">
            <br><br>
            <button type="submit">Agregar</button>
        </form>
    
        <style>
            .field:has(input:required) label:after {
                content: "*";
                color: red;
            }
        </style>
    </div>
    <div class="tabla">
        <table>
            <tr>
                <th> Libro #</th>
                <th>Titulo Del Libro</th>
                <th>Autor</th>
                <th>Estado</th>
                <th colspan="3">opciones</th>
            </tr>
            <?php
            if (mysqli_num_rows($libros) > 0) {
                $pos = 1;

                while ($libro = mysqli_fetch_assoc($libros)) {

            ?>
                    <tr>
                        <td><?php echo $pos; ?></td>
                        <td><?php echo $libro['titulo']; ?></td>
                        <td><?php echo $libro['id_autor']; ?></td>
                        <td><?php echo $libro['disponible']  ? 'Disponible' : 'No Disponible'; ?></td>

                        <td><button><a href="libros/see.php?id=<?php echo $libro['id']; ?>">ver</a></button></td>
                        <td><button><a href="libros/delete.php?id=<?php echo $libro['id']; ?>">Eliminar</a></button></td>
                        <td><button><a href="libros/editar.php?id=<?php echo $libro['id']; ?>">Editar</a></button></td>

                    </tr>
                <?php $pos++;
                }
            } else { ?>
                <tr>
                    <td colspan=5>No Hay datos Disponibles</td>
                </tr>

                <?php ?>
        </table>
    <?php } ?>
    </div>


</body>

</html>