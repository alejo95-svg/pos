$(document).ready(function() {
    $('input[name="bProduct"]').on('keyup', function() {
        var index = $(this).val();
        console.log(index);
        $.ajax({
            url: '../Model/consulta_7.php',
            type: 'POST',
            data: {bProduct: index,
                    },
            success: function(response){
                $('#rBusqueda').html(response);
            }
        });
    });
});




