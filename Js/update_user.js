const form = document.querySelector('.form-add-user');
const nombre_1 = document.querySelector('#nombre_1');
const nombre_2 = document.querySelector('#nombre_2');
const apellido_1 = document.querySelector('#apellido_1');
const apellido_2 = document.querySelector('#apellido_2');
const genero = document.querySelector('#genero');
const tDocumento = document.querySelector('#tDocumento');
const nDocumento = document.querySelector('#nDocumento');
const correo = document.querySelector('#correo');
const celular = document.querySelector('#celular');
const direccion = document.querySelector('#direccion');
const rol = document.querySelector('#rol');
const submit = document.querySelector('#submit_form');
const upload_image = document.querySelector('#archivo');
const btn_upload = document.querySelector('.text-uploadImage');
const validacion_email = /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/;
const validacion_numero = /^[0-9]{1,10}$/;
const validacion_texto = /^[a-zA-ZáéíóúÁÉÍÓÚ]{1,10}$/;

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

submit.disabled = true;
nombre_1.addEventListener('blur', validacionNombre_1);
nombre_2.addEventListener('blur', validacionNombre_2);
apellido_1.addEventListener('blur', validacionApellido_1);
apellido_2.addEventListener('blur', validacionApellido_2);
nDocumento.addEventListener('blur', validacionNDocumento);
correo.addEventListener('blur', validacionCorreo);
celular.addEventListener('blur', validacionCelular);

function validacionCorreo(){
    if(!validacion_email.test(correo.value)){
        correo.classList.replace('input-form', 'input-form-error'); 
        correo.value = 'Correo invalido!';
        correo.disabled = true;
        setTimeout(() =>{   
            correo.classList.replace('input-form-error', 'input-form');  
            correo.value = '';
            correo.disabled = false;
        }, 1000);
    }
}

function validacionNombre_1(){
    if(!validacion_texto.test(nombre_1.value)){
        alert('Error! Formato inválido, sólo se permiten letras.');
        nombre_1.classList.replace('input-form', 'input-form-error'); 
        nombre_1.disabled = true;
        setTimeout(() =>{   
            nombre_1.classList.replace('input-form-error', 'input-form');  
            nombre_1.disabled = false;
        }, 1000);
    }
}

function validacionNombre_2(){
    if(!validacion_texto.test(nombre_2.value)){
        alert('Error! Formato inválido, sólo se permiten letras.');
        nombre_2.classList.replace('input-form', 'input-form-error'); 
        nombre_2.disabled = true;
        setTimeout(() =>{   
            nombre_2.classList.replace('input-form-error', 'input-form');  
            nombre_2.disabled = false;
        }, 1000);
    }
}

function validacionApellido_1(){
    if(!validacion_texto.test(apellido_1.value)){
        alert('Error! Formato inválido, sólo se permiten letras.');
        apellido_1.classList.replace('input-form', 'input-form-error');
        apellido_1.disabled = true;
        setTimeout(() =>{
            apellido_1.classList.replace('input-form-error', 'input-form');
            apellido_1.disabled = false;
        }, 1000);
    }
}

function validacionApellido_2(){
    if(!validacion_texto.test(apellido_2.value)){
        alert('Error! Formato inválido, sólo se permiten letras.');
        apellido_2.classList.replace('input-form', 'input-form-error');
        apellido_2.disabled = true;
        setTimeout(() =>{
            apellido_2.classList.replace('input-form-error', 'input-form');
            apellido_2.disabled = false;
        }, 1000);
    }
}

function validacionNDocumento(){
    if(!validacion_numero.test(nDocumento.value)){
        alert('Error! Formato inválido, sólo se permiten números.');
        nDocumento.classList.replace('input-form', 'input-form-error');
        nDocumento.disabled = true;
        setTimeout(() =>{
            nDocumento.classList.replace('input-form-error', 'input-form');
            nDocumento.disabled = false;
        }, 1000);
    }
}

function validacionCelular(){
    if(!validacion_numero.test(celular.value)){
        alert('Error! Formato inválido, sólo se permiten números.');
        celular.classList.replace('input-form', 'input-form-error');
        celular.disabled = true;
        setTimeout(() =>{
            celular.classList.replace('input-form-error', 'input-form');
            celular.disabled = false;
        }, 1000);
    }
}