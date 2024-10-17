<?php
    require_once "connectionDB/connection.php";
    
    $id = $_REQUEST['id'];
    
    $sql = "UPDATE empleados SET eliminar = 1 WHERE id = $id";                                                                  
    $res = $conn->query($sql);

    header("Location: empleados_lista.php");
?>