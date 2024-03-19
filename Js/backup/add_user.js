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
const validacion_numero = /^[0-9]{1,5}$/;
const validacion_texto = /^[a-zA-ZáéíóúÁÉÍÓÚ]{1,10}$/;

form.addEventListener('keyup', () => {
    /* nombre_2.removeAttribute('disabled'); */
    if(nombre_1.value){
        nombre_2.disabled = false;
        apellido_1.disabled = false;
        nombre_1.addEventListener('blur', validacionNombre_1);
        if(apellido_1.value){
            apellido_2.disabled = false;
            genero.disabled = false;
        }else {
            apellido_2.disabled = true;
            apellido_2.value = '';
            genero.disabled = true;
            genero.value = 'genero';
            tDocumento.disabled = true;
            tDocumento.value = 'tipo_documento';
            nDocumento.disabled = true;
            nDocumento.value = '';
            correo.disabled = true;
            correo.value = '';
            celular.disabled = true;
            celular.value = '';
            direccion.disabled = true;
            direccion.value = '';
            rol.disabled = true;
            rol.value = 'rol';
        }
        
        nombre_2.addEventListener('blur', validacionNombre_2);
        genero.addEventListener("change", () => {
            if(genero.value != 'genero'){
                tDocumento.disabled = false; 
            }else {
                tDocumento.disabled = true;
                tDocumento.value = 'tipo_documento';
                nDocumento.disabled = true;
                nDocumento.value = '';
                correo.disabled = true;
                correo.value = '';
                celular.disabled = true;
                celular.value = '';
                direccion.disabled = true;
                direccion.value = '';
                rol.disabled = true;
                rol.value = 'rol';
            }
        });

        tDocumento.addEventListener("change", () => {
            if(tDocumento.value != 'tipo_documento'){ 
                nDocumento.disabled = false;
            }else { 
                nDocumento.disabled = true;
                nDocumento.value = '';
                correo.disabled = true;
                correo.value = '';
                celular.disabled = true;
                celular.value = '';
                direccion.disabled = true;
                direccion.value = '';
                rol.disabled = true;
                rol.value = 'rol';
            }
        });

        if(nDocumento.value){
            correo.disabled = false;
        }else {
            correo.disabled = true;
            correo.value = '';
            celular.disabled = true;
            celular.value = '';
            direccion.disabled = true;
            direccion.value = '';
            rol.disabled = true;
            rol.value = 'rol';           
        }

        if(correo.value){
            celular.disabled = false;
        }else {
            celular.disabled = true;
            celular.value = '';
            direccion.disabled = true;
            direccion.value = '';
            rol.disabled = true;
            rol.value = 'rol';
        }
        correo.addEventListener('blur', validacion);
        if(celular.value){
            direccion.disabled = false;
        }else {
            direccion.disabled = true;
            direccion.value = '';
            rol.disabled = true;
            rol.value = 'rol';
        }

        if(direccion.value){
            rol.disabled = false;
        }else {
            rol.disabled = true;
            rol.value = 'rol';
        }

        rol.addEventListener('change', ( evt ) => {
            if(rol.value != 'rol'){
                upload_image.removeAttribute('disabled');
                if(upload_image != ''){
                    submit.disabled = false;
                    submit.classList.replace('disabled-button-form', 'enabled-button-form');
                }
                submit.disabled = false;
                submit.classList.replace('disabled-button-form', 'enabled-button-form');
            }else {
                submit.disabled = true;
                submit.classList.replace('enabled-button-form', 'disabled-button-form');
            }
        }
        
        
        );

    }else {
        nombre_2.disabled = true;
        nombre_2.value = '';
        apellido_1.disabled = true;
        apellido_1.value = '';
        apellido_2.disabled = true;
        apellido_2.value = '';
        genero.disabled = true;
        genero.value = 'genero';
        tDocumento.disabled = true;
        tDocumento.value = 'tipo_documento';
        nDocumento.disabled = true;
        nDocumento.value = '';
        correo.disabled = true;
        correo.value = '';
    }
});

upload_image.addEventListener('change', () => {
    if(upload_image.value) {
        btn_upload.classList.replace('text-uploadImage', 'text-uploadImage-check');
        console.log('cambio');
    }
});

function validacion(){
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

function validacionNumero(){
    if(!validacion_numero.test(nombre_2.value)){
        alert('Error! Formato invalido, solo se permiten números del 0 al 9');
        nombre_2.classList.replace('input-form', 'input-form-error'); 
        nombre_2.disabled = true;
        setTimeout(() =>{   
            nombre_2.classList.replace('input-form-error', 'input-form');  
            nombre_2.disabled = false;
        }, 1000);
    }
}

function validacionNombre_1(){
    if(!validacion_texto.test(nombre_1.value)){
        alert('Error! Formato invalido, solo se permiten letras.');
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
        alert('Error! Formato invalido, solo se permiten letras.');
        nombre_2.classList.replace('input-form', 'input-form-error'); 
        nombre_2.disabled = true;
        setTimeout(() =>{   
            nombre_2.classList.replace('input-form-error', 'input-form');  
            nombre_2.disabled = false;
        }, 1000);
    }
}