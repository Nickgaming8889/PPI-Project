<?php
// Conexión a la base de datos
include("conexion.php");

$email = $_POST['email'];

$sql = "SELECT COUNT(*) as count FROM empleados WHERE email = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();

echo ($count > 0) ? "existe" : "no_existe";

$stmt->close();
$conexion->close();
?>
