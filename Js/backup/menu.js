const timer = document.querySelector('.timer');
const card_timer = document.querySelector('.card-timer');

let time = 12000;
let count = time;

setInterval(function(){
    document.onmousemove = function(){
        count = time;
        timer.innerText = '';
        card_timer.setAttribute('hidden', 'true');
    }
    console.log(count);
    if(count <= time/2){
        card_timer.removeAttribute('hidden');
        timer.innerText = 'La sesion se cerrara en '+count+" segundos";


        if(count % 2 == 0 ){
            timer.style.border = '2px solid red';
            timer.style.background = 'red';
            timer.style.opacity = '0.9';
        }else {
            timer.style.border = '1px solid black';
            timer.style.background = 'var(--verde_activo)';
            timer.style.opacity = '0.9';
        }
         
    }

    if(count <= 0){
        location.href = '../Controller/close_session.php';
    }

    count--;
}, 1000);
