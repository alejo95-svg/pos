const hMenu = document.querySelector('.hamburger_menu');
const menu = document.querySelector('.menu');
const move = document.querySelector('.move');
hMenu.addEventListener('click', () => {
    (hMenu.checked)? menu.removeAttribute('hidden') : menu.setAttribute('hidden', false);
});




setInterval(function(){
    $('.active').load('./uUOnline.php');

}, 1000); /* mover todo esto a menu.js */
