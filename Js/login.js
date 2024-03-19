const form = document.querySelector('.form');
const text_email = document.querySelector('.text-email');
const text_pwd = document.querySelector('.text-pwd');
const input = document.querySelector('.input');
const input_pwd = document.querySelector('.input-pwd-eye');
const pwd = document.querySelector('.pwd');
const img_pwd = document.querySelector('.img_pwd');
const btn = document.querySelector('.send');
const err1 = document.querySelector('.err1');
const err2 = document.querySelector('.err2');
const err_email = document.querySelector('.text-email-err');
const err_pwd = document.querySelector('.text-pwd-err');
const validacion_email = /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/;
const validacion_pwd = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/;

// Esta funcion habilita/deshabilita input password y botton login
form.addEventListener('keyup', () => {
    if(form.correo.value) {
        pwd.disabled = false;
        if(form.pwd.value){
            btn.disabled = false;
            img_pwd.removeAttribute('hidden');
            btn.classList.replace('disabled-button', 'enabled-button');
        }else {
            btn.disabled = true;
            img_pwd.setAttribute('hidden', true);
            btn.classList.replace('enabled-button', 'disabled-button');
            pwd.type = 'password';
            img_pwd.setAttribute('src', "../img/ojo_abierto.png");
        }
    }else {
        img_pwd.setAttribute('hidden', true);
        btn.classList.replace('enabled-button', 'disabled-button');
        btn.disabled = true;
        pwd.value = '';
        pwd.disabled = true;
    }
});

// Esta funcion habilita y deshabilita la contraseña
img_pwd.addEventListener('click', () =>{
    switch(pwd.type) {
        case 'password':
            pwd.type = 'text';
            img_pwd.setAttribute('src', "../img/ojo_cerrado.png");
        break;
        case 'text':
            pwd.type = 'password';
            img_pwd.setAttribute('src', "../img/ojo_abierto.png"); 
        break;          
    }
});

input.addEventListener('blur', validacion);

/* form.addEventListener('submit', (event) => */
function validacion(){
    
    if(!validacion_email.test(form.correo.value)){
        err_email.innerHTML = "Correo invalido";
        /* err1.innerHTML = "Invalid email or password"; */
       /*  img_pwd.setAttribute('hidden', true); */
        input.classList.replace('input', 'input-error'); 
        /* input_pwd.classList.replace('input-pwd-eye', 'input-error-pwd'); */
        text_email.classList.replace('text-email', 'text-error');
/*         text_pwd.classList.replace('text-pwd', 'text-error'); */
        form.reset();

        setTimeout(() =>{   
            err_email.innerHTML = "";
            /*err1.innerHTML = ""; */
/*             form.pwd.value = ""; */
            btn.classList.replace('enabled-button', 'disabled-button');
/*             img_pwd.setAttribute('hidden', true);
            pwd.type = 'password'; */
/*             img_pwd.setAttribute('src', "../img/ojo_abierto.png"); */ 
            btn.disabled = true;
            input.classList.replace('input-error', 'input');  
/*             input_pwd.classList.replace('input-error-pwd', 'input-pwd-eye'); */
            text_email.classList.replace('text-error', 'text-email');
/*             text_pwd.classList.replace('text-error', 'text-pwd'); */
        }, 1000);
    }
}

function validacionPwd(){
    if(!validacion_pwd.test(form.pwd.value)){
        err_pwd.innerHTML = "Correo o Contraseña invalida";
        img_pwd.setAttribute('hidden', true);
        input.classList.replace('input', 'input-error'); 
        input_pwd.classList.replace('input-pwd-eye', 'input-error-pwd');
        text_pwd.classList.replace('text-pwd', 'text-error');
        text_email.classList.replace('text-email', 'text-error');

        setTimeout(() =>{
            text_pwd.classList.replace('text-error', 'text-pwd');
            text_email.classList.replace('text-error', 'text-email');
            err_pwd.innerHTML = "";
            form.pwd.value = "";
            btn.classList.replace('enabled-button', 'disabled-button');
            img_pwd.setAttribute('hidden', true);
            pwd.type = 'password';
             img_pwd.setAttribute('src', "../img/ojo_abierto.png");
            btn.disabled = true;
            input.classList.replace('input-error', 'input');  
            input_pwd.classList.replace('input-error-pwd', 'input-pwd-eye');
            form.reset();
        }, 1000);
    }
}