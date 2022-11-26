<?php

include_once('../conexion.php');
 

$primer_nombre      = $_POST['primer_nombre'];
$segundo_nombre     = $_POST['segundo_nombre'];
$primer_apellido    = $_POST['primer_apellido'];
$segundo_apellido   = $_POST['segundo_apellido'];
$biografia          = $_POST['biografia'];
$email              = $_POST['email'];
$id_rol             = $_POST['id_rol'];

if (!isset($_POST['id'])) {
    $query = "INSERT INTO personas(primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, biografía, email, id_rol) VALUES ('$primer_nombre', '$segundo_nombre', '$primer_apellido', '$segundo_apellido', '$biografia', '$email', '$id_rol')";
} else {
    $query = "UPDATE personas SET primer_nombre = '$primer_nombre', segundo_nombre = '$segundo_nombre', primer_apellido = '$primer_apellido', segundo_apellido = '$segundo_apellido', biografia= '$biografia', email = '$email', id_rol = '$id_rol' WHERE id = {$_POST['id']}";
}

$result = mysqli_query($con, $query) or die(mysqli_error($con));

header("Location: index.php");