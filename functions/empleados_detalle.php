<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/detalle_empleados.css">
    <title>View Details</title>
</head>
<body>
    <?php
        include("connectionDB/connection.php"); // Asegúrate de que la ruta es correcta

        if (!isset($_REQUEST['id'])) {
            echo "ID de empleado no especificado.";
            exit();
        }
        $id = $_REQUEST['id'];

        $sql = "SELECT nombre, correo, rol FROM empleados WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($nombre, $email, $rol);
        $stmt->fetch();

        // Crear el objeto stdClass y asignar propiedades
        $empleado = new stdClass();
        $empleado->nombre = $nombre;
        $empleado->email = $email;
        $empleado->rol = ($rol == 1) ? "Gerente" : "Ejecutivo";

        $stmt->close();
        $conn->close();
    ?>


    <div class="detalle-container">
        <h1>Detalle del Empleado</h1>
        <table class="detalle-tabla">
            <tr><th>Nombre</th><td><?php echo htmlspecialchars($empleado->nombre); ?></td></tr>
            <tr><th>Correo</th><td><?php echo htmlspecialchars($empleado->email); ?></td></tr>
            <tr><th>Rol</th><td><?php echo htmlspecialchars($empleado->rol); ?></td></tr>
        </table>
        <div class="acciones">
            <a href="empleados_lista.php" class="boton-regresar">Regresar al listado</a>
        </div>
    </div>
</body>
</html>