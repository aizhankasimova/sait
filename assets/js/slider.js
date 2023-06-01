const images = document.querySelectorAll('.slider .line_slider img');
const sliderLine = document.querySelector('.slider .line_slider');
let count = 0;
let width;

function init() {
    width = document.querySelector('.slider').offsetWidth;
    images.forEach(item => {
        item.style.width = width + 'px';
        item.style.height = '400px';
    });
    rollSlider();
}

init();

document.querySelector('#next').addEventListener('click', function () {
    count++;
    if (count >= images.length) {
        count = 0;
    }
    rollSlider();
});

document.querySelector('#prev').addEventListener('click', function () {
    count--;
    if (count < 0) {
        count = images.length - 1;
    }
    rollSlider();
});

function rollSlider() {
    sliderLine.style.transform = 'translate(-' + count * width + 'px)';
}

let timer = 0;
makeTimer(); 
function makeTimer(){
   clearInterval(timer)
   timer = setInterval(function(){
    count++;
    if (count >= images.length) {
        count = 0;
    }
    rollSlider();
    init();
   },10000);
 }
