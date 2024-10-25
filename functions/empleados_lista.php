<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/tabla_empleados.css">
    <title>Tabla Empleados</title>
</head>
<body>
    <?php
        require_once 'connectionDB/connection.php';

        $sql = 'SELECT * FROM empleados WHERE eliminar = 0';
        $result = $conn->query($sql);

        if (!$result) {
            die('Query failed: '. $conn->error);
        }

        $employees = array();

        while ($row = $result->fetch_assoc()) {
            $employee = new stdClass();
            $employee->id = $row['id'];
            $employee->name = $row['nombre'];
            $employee->email = $row['correo'];
            $employee->role = $row['rol'] == 1 ? "Gerente" : "Ejecutivo";
            $employees[] = $employee;   
        }
    ?> 
    
    <div class="table">
        <?php foreach ($employees as $employee) { ?>
        <div class="empleado">
            <div class="row">
                <div class="id_empleado"><?php echo $employee->id; ?></div>
                <div class="nombre_empleado"><?php echo $employee->name; ?></div>
                <div class="correo_empleado"><?php echo $employee->email; ?></div>
                <div class="rol_empleado"><?php echo $employee->role; ?></div>
                <div class="del"><input type="submit" onclick="return eliminarEmpleados()"></div>
            </div>
            <?php } ?>  
        </div>
    </div>
    
    <div class="add_register">
        <form action="registrar_empleado.html" method="post">
            <button type="submit">Add Register</button>
        </form>
    </div>
</body>
</html>
