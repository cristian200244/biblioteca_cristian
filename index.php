<?php
include_once("conexion.php");

$query = "SELECT id, CONCAT(IFNULL(primer_nombre,''),' ',IFNULL(segundo_nombre,''),' ',IFNULL(primer_apellido,''),' ',IFNULL(segundo_apellido,'')) AS autor FROM personas";
$autores = mysqli_query($con, $query) or die(mysqli_error($con));

$query  = "SELECT l.id, l.titulo, CONCAT(IFNULL(primer_nombre,''),' ',IFNULL(segundo_nombre,''),' ',IFNULL(primer_apellido,''),' ',IFNULL(segundo_apellido,'')) AS autor, l.disponible
FROM libros AS l
JOIN personas AS p ON l.id_autor = p.id";
$libros = mysqli_query($con, $query);

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
        <form action="libros/save.php" method="post" enctype="multipart/form-data"><br>
            <div class="field">

                <label for="">Titulo Del Libro </label><br>
                <input type="text" name="titulo" id="titulo" required><br>
                <label for="">Autor Del Libro</label><br>
                <select id="id_autor" name="id_autor" required>
                    <option selected>Seleccione una Opcion...</option>
                    <?php foreach ($autores as $autor) : ?>
                        <option value="<?= $autor['id'] ?>"><?= $autor['autor'] ?></option>;
                    <?php endforeach ?>
                    ?>
                </select>
                <br>
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
            <button type="submit" onclick="validar()">Agregar</button>
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
                        <td><?php echo $libro['autor']; ?></td>
                        <td><?php echo $libro['disponible']  ? 'Disponible' : 'No Disponible'; ?></td>

                        <td><button><a href="libros/see.php?id=<?php echo $libro['id']; ?>">ver</a></button></td>
                        <td><button><a href="libros/delete.php?id=<?php echo $libro['id']; ?>" onclick="clean()">Eliminar</a></button></td>
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

    <script src="save.js">
    </script>
</body>

</html>