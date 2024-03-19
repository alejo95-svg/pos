const form = document.querySelector('.form_add_product');
const nombre = document.querySelector('#nombre');
const tamanio = document.querySelector('#tamanio');
const tProducto = document.querySelector('#tProducto');
const precio = document.querySelector('#precio');
const company = document.querySelector('#company');
const codigo_barras = document.querySelector('#codigo_barras');
const btn = document.querySelector('#submit_form-add-product');
const validacion_numero = /^[0-9]{1,20}$/;
const validacion_texto = /^[a-zA-ZáéíóúÁÉÍÓÚ]{1,10}$/;

form.addEventListener('keyup', () => {
    if(nombre.value){
        tamanio.disabled = false;
    }else{
        tamanio.disabled = true;
    }
    nombre.addEventListener('blur', validacionNombre);
    tamanio.addEventListener('change', () => {
        if(tamanio.value != 'tamanio'){
            tProducto.disabled = false;
            if(nombre.value && tamanio.value && tProducto.value && precio.value && company.value && codigo_barras.value){
                btn.disabled = false;
                btn.classList.replace('disabled-button-form', 'enabled-button-form');
            }
        }else{
            tProducto.disabled = true;
            btn.disabled = true;
            btn.classList.replace('enabled-button-form', 'disabled-button-form');
        }
    });

    tProducto.addEventListener('change', () => {
        if(tProducto.value != 'tipoProducto'){
            precio.disabled = false;
            if(nombre.value && tamanio.value && tProducto.value && precio.value && company.value && codigo_barras.value){
                btn.disabled = false;
                btn.classList.replace('disabled-button-form', 'enabled-button-form');
            }
        }else{
            precio.disabled = true;
            btn.disabled = true;
            btn.classList.replace('enabled-button-form', 'disabled-button-form');
        }
    });

    if(precio.value){
        company.disabled = false;
    }else{
        company.disabled = true;
    }
    precio.addEventListener('blur', validacionPrecio);

    company.addEventListener('change', () => {
        if(company.value != 'company'){
            codigo_barras.disabled = false;
            if(nombre.value && tamanio.value && tProducto.value && precio.value && company.value && codigo_barras.value){
                btn.disabled = false;
                btn.classList.replace('disabled-button-form', 'enabled-button-form');
            }
        }else {
            codigo_barras.disabled = true;
            btn.disabled = true;
            btn.classList.replace('enabled-button-form', 'disabled-button-form');
        }
    });

    if(codigo_barras.value){
        btn.disabled = false;
        btn.classList.replace('disabled-button-form', 'enabled-button-form');
    }else {
        btn.disabled = true;
        btn.classList.replace('enabled-button-form', 'disabled-button-form');
    }
    codigo_barras.addEventListener('blur', validacionCodigoBarras);  
});

function validacionNombre(){
    if(!validacion_texto.test(nombre.value)){
        alert('Error! Formato inválido, sólo se permiten letras.');
        nombre.classList.replace('input-form', 'input-form-error'); 
        nombre.disabled = true;
        tamanio.disabled = true;
        setTimeout(() =>{   
            nombre.classList.replace('input-form-error', 'input-form');  
            nombre.disabled = false;
        }, 1000);
    }
}

function validacionPrecio(){
    if(!validacion_numero.test(precio.value)){
        alert('Error! Formato inválido, sólo se permiten numeros.');
        precio.classList.replace('input-form', 'input-form-error'); 
        precio.disabled = true;
        company.disabled = true;
        setTimeout(() =>{   
            precio.classList.replace('input-form-error', 'input-form');  
            precio.disabled = false;
        }, 1000);
    }
}

function validacionCodigoBarras(){
    if(!validacion_numero.test(codigo_barras.value)){
        alert('Error! Formato inválido, sólo se permiten numeros.');
        codigo_barras.classList.replace('input-form', 'input-form-error'); 
        codigo_barras.disabled = true;
        btn.disabled = true;
        btn.classList.replace('enabled-button-form', 'disabled-button-form');
        setTimeout(() =>{   
            codigo_barras.classList.replace('input-form-error', 'input-form');  
            codigo_barras.disabled = false;
        }, 1000);
    }
}