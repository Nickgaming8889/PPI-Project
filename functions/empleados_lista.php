<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Estilo general */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Contenedor de la tabla */
        .table {
            width: 100%;
            max-width: 800px;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        /* Filas de la tabla */
        .row {
            display: flex;
            align-items: center;
            padding: 10px 15px;
            border-bottom: 1px solid #ddd;
        }

        .row:hover {
            background-color: #f1f1f1;
        }

        .empleado:nth-child(even) .row {
            background-color: #f9f9f9;
        }

        /* Columnas de la tabla */
        .id_empleado, .nombre_empleado, .correo_empleado, .rol_empleado {
            flex: 1;
            padding: 8px;
            text-align: left;
            color: #333;
        }

        .del, .details {
            margin-left: 10px;
            padding: 5px;
        }

        /* Botones de acciones */
        .del a, .details a {
            text-decoration: none;
            color: #fff;
            padding: 8px 12px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .del a {
            background-color: #e74c3c;
        }

        .del a:hover {
            background-color: #c0392b;
        }

        .details a {
            background-color: #3498db;
        }

        .details a:hover {
            background-color: #2980b9;
        }

        /* Botón para agregar un nuevo registro */
        .add_register {
            text-align: center;
            margin: 20px auto;
        }

        .add_register button {
            background-color: #27ae60;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .add_register button:hover {
            background-color: #1e8449;
        }

    </style>
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
                <div class="del"><a href="javascript:void(0)" onclick="eliminarEmpleado(<?php echo $employee->id; ?>)">Eliminar</a></div>
                <div class="details"><a href="empleados_detalle.php?id=<?php echo $employee->id?>">Ver Detalles</a></div>
            </div>
            <?php } ?>  
        </div>
    </div>
    
    <div class="add_register">
        <form action="registro_empleado.php" method="post">
            <button type="submit">Add Register</button>
        </form>
    </div>
</body>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="../scripts/scripts.js"></script>
</html>
