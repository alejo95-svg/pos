$(document).ready(function() {
    $('input[name="bUsuario"]').on('keyup', function() {
        var index = $(this).val();
        console.log(index);
        $.ajax({
            url: '../Model/consulta_4.php',
            type: 'POST',
            data: {bUsuario: index,
                    },
            success: function(response){
                $('#rBusqueda').html(response);
            }
        });
    });
});



