<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/registro_empleados.css">
    <title>Alta de empleados</title>
</head>
<body>
    <h1>Alta de empleados</h1>
    <div class="go_back">
        <button><a href="empleados_lista.php">Regresar al listado</a></button>
    </div>
    <form id="formRegistrarEmpleado" action="empleados_salva.php" method="post">
        <div class="register_inputs">
            <div class="input">
                <input type="text" name="nombre" id="nombre" placeholder="Nombre">
            </div>
            <div class="input">
                <input type="text" name="apellido" id="apellido" placeholder="Apellidos">
            </div>
            <div class="input">
                <input type="email" name="email" id="email" placeholder="Email" onblur="validarCorreo()">
                <div id="emailMessage" class="error-message"></div>
            </div>
            <div class="input">
                <input type="password" name="password" id="password" placeholder="Password">
            </div>
            <div class="input">
                <select name="rol" id="rol">
                    <option value="0">Select Option</option>
                    <option value="1">Gerente</option>
                    <option value="2">Ejecutivo</option>
                </select>
            </div>
        </div>
        <div class="save_register">
            <button type="button" onclick="guardarEmpleado()" class="save_btn">Guardar</button>
        </div>
        <div id="message" class="error-message"></div>        
    </form>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="../scripts/scripts.js"></script>
</body>
</html>
