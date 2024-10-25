function registroValidacion() {
    var nombre_ = $('#nombre').val();
    var apellido_ = $('#apellido').val();
    var email_ = $('#email').val();
    var password_ = $('#password').val();
    var rol_ = $('#rol').val();

    if (nombre_ != "" && apellido_ != "" && email_ != "" && password_ != "" && rol_ != 0) {

    }
    else {
        $('#mensaje').html("Faltan campos por llenar");
        setTimeout("$('#mensaje').html('');",5000);
    }

}

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

/*function entra() {
    console.log('Entra al Campo');
    alert('Entra al Campo');
}*/

/*function sale() {    
    var email = $('#email').val();    
    if(email !=''){
        $.ajax({
            url: 'validacion_correo.php',
            type: 'post',
            dataType: 'text',
            data: 'email='+ email, 
            success: function(resp) {
                console.log(resp);
                if (resp == 1) {
                    $('#mensaje').html('El correo ya existe');
                }
                setTimeout("$('#mensaje').html('');", 5000);
            },error: function(){
                alert('Error en la conexion...');
            }
        });
    }
}*/

