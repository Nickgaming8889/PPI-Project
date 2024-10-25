<?php
    require_once "connectionDB/connection.php";
    $first_name_ = $_POST['nombre'];
    $surnames_ = $_POST['apellidos'];
    $email_ = $_POST['email'];
    $password_ = $_POST['password'];
    $rol_ = $_POST['rol'];

    $full_name_ = $first_name_. " ". $surnames_;

    $sql = "INSERT INTO empleados (nombre, correo, rol, contra) VALUES ('$full_name_',  '$email_', '$rol_', '$password_')";
    $res = $conn->query($sql);

    header("Location: empleados_lista.php");
?>