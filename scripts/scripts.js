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

function entra() {
    console.log('Entra al Campo');
    alert('Entra al Campo');
}

function sale() {
    var correo = $('correo').val();

    var num = 1;

}