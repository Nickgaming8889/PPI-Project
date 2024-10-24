<?php
    require_once 'connectionDB/connection.php';

    $correo = $_REQUEST['correo'];

    $sql = "SELECT correo FROM employees WHERE eliminado = 0 AND correo = '$correo'";
    $res = $conn->query($sql);
    $num = $ru;
?>