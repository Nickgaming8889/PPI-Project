<?php
require_once 'connectionDB/connection.php';

$correo = $_REQUEST['email'];

// Validar el correo
if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    // Preparar la consulta para verificar si el correo ya existe
    $stmt = $conn->prepare("SELECT correo FROM empleados WHERE eliminar = 0 AND correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "El correo ya está registrado.";
    } else {
        // Preparar la inserción si no existe
        $stmt->close(); // Cerrar la declaración anterior
        $stmt = $conn->prepare("INSERT INTO empleados (correo) VALUES (?)");
        $stmt->bind_param("s", $correo);
        
        if ($stmt->execute()) {
            echo "Correo guardado con éxito.";
        } else {
            echo "Error al guardar el correo: " . $stmt->error;
        }
    }

    $stmt->close();
} else {
    echo "El correo no es válido.";
}

$conn->close();
?>
