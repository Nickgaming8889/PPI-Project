function enviarAjax() {
    var numero = $('#numero').val();
    if (numero == '' || numero <= 0) {
        $('#mensaje').html("Faltan campos por llenar");
        setTimeout("$('#mensaje').html('');",5000);
    }
    else {
        //Hace algo...
        $.ajax({
            url     : '../functions/respuesta.php',
            type    : 'post',
            dataType: 'text',
            data    : 'numero='+numero,
            success : function(res) {
                console.log(res);
                if (res == 1) {
                    $('#mensaje').html('Aprobaste');
                }
                $('#mensaje').html('Reprobaste');
                setTimeout("$('#mensaje').html('')", 5000);
            }, error: function() {
                alert('Error archivo no encontrado...');
            }
        })
    }
}

function validarCampos() {
    const nombre = $("#nombre").val().trim();
    const apellido = $("#apellido").val().trim();
    const email = $("#email").val().trim();
    const password = $("#password").val().trim();
    const rol = $("#rol").val();

    return nombre && apellido && email && password && rol !== "0";
}

function mostrarMensaje(id, mensaje) {
    $(`#${id}`).text(mensaje).show();
    setTimeout(() => {
        $(`#${id}`).fadeOut();
    }, 5000);
}

function validarCorreo() {
    const email = $("#email").val().trim();
    if (email) {
        $.ajax({
            url: "validacion_correo.php",
            type: "POST",
            data: { email: email },
            success: function (response) {
                if (response === "existe") {
                    mostrarMensaje("emailMessage", `El correo ${email} ya existe.`);
                    $("#email").data("valido", false);
                } else {
                    $("#email").data("valido", true);
                }
            }
        });
    }
}

function eliminarEmpleado(id) {
    if (!confirm("¿Estás seguro de que deseas eliminar este empleado?")) {
        return;
    }

    $.ajax({
        url: "empleados_elimina.php",
        type: "GET",
        data: { id: id },
        success: function(response) {
            const result = JSON.parse(response);

            if (result.success) {
                alert("Empleado eliminado con éxito.");
                location.reload();
            } else {
                alert(result.error || "Error al eliminar el empleado.");
            }
        },
        error: function() {
            alert("Ocurrió un error en la solicitud de eliminación.");
        }
    });
}

function guardarEmpleado() {
    const nombre = $("#nombre").val();
    const apellido = $("#apellido").val();
    const email = $("#email").val();
    const password = $("#password").val();
    const rol = $("#rol").val();

    $.ajax({
        url: "empleados_salva.php",
        type: "POST",
        data: {
            nombre: nombre,
            apellidos: apellido,
            email: email,
            password: password,
            rol: rol
        },
        success: function(response) {
            window.location.href = "empleados_lista.php";
        },
        error: function() {
            $("#message").text("Ocurrió un error al registrar el empleado.");
        }
    });
}