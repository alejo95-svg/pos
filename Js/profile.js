const image = document.querySelector('.upload_image');
const container_img = document.querySelector('.btn-image');
const button_update = document.createElement('input');

button_update.type = 'submit';
button_update.classList.add('button-update-image');
button_update.value ='Actualizar Foto';
button_update.name = 'nFoto';
/* container_img.appendChild(button_update); */
image.addEventListener('change', () => {
    container_img.appendChild(button_update);
    container_img.style.display = 'flex';
});