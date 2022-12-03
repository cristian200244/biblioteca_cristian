<?php
// eliminar
require_once("../conexion.php");

$id = $_GET['id'];

$query  = "DELETE FROM personas WHERE id = $id";
$result = mysqli_query($con, $query) or die(mysqli_error($con));

header('Location: index.php');