<?php
require_once "connectionDB/connection.php";

$response = ["success" => false];

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "UPDATE empleados SET eliminar = 1 WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $result = $stmt->execute();

    if ($result) {
        $response["success"] = true;
    } else {
        $response["error"] = "Error al intentar eliminar el empleado.";
    }
} else {
    $response["error"] = "ID de empleado no especificado.";
}

header('Content-Type: application/json');
echo json_encode($response);