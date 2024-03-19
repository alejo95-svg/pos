const bProduct = document.querySelector('.bProduct');
const bDelete = document.querySelector('.button-delete-index');

bProduct.focus();
$(document).ready(function() {
    $('input[name="bProduct"]').on('keyup', function() {
        var index = $(this).val();
        console.log(index);
        $.ajax({
            url: '../Model/consulta_5.php',
            type: 'POST',
            data: {bProduct: index},
            success: function(response){
                $('#rBusqueda').html(response);
            }
        });
    });
});

bProduct.addEventListener('keypress', (e) => {
    if(e.keyCode === 13){
        e.preventDefault();
    }
});

bProduct.addEventListener('keyup', (e) => {
    if(bProduct.value){
       bDelete.removeAttribute('hidden'); 
    }else{
        bDelete.setAttribute('hidden', true);
    }
});

bDelete.addEventListener('click', () => {
    bProduct.value = "";
    bProduct.focus();
});

