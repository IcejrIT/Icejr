const carouselSlideSec = document.querySelector('.carousel-slide-sec');
const carouselImagesSec =  document.querySelectorAll('.carousel-slide-sec img');

const prev = document.querySelector('#prev');
const next = document.querySelector('#next');

let counterSec = 1;
const sizeSec = carouselImagesSec[0].clientWidth;

carouselSlideSec.style.transform = 'translateX(' + (-sizeSec * counterSec) + 'px)';

next.addEventListener('click', () => {
if (counterSec >= carouselImagesSec.length -1) return;
carouselSlideSec.style.transition = "transform 0.4s ease-in-out";
counterSec++;
carouselSlideSec.style.transform = 'translateX(' + (-sizeSec * counterSec) + 'px)';
});
    
prev.addEventListener('click', () => {
if (counterSec <= 0) return;
carouselSlideSec.style.transition = "transform 0.4s ease-in-out";
counterSec--;
carouselSlideSec.style.transform = 'translateX(' + (-sizeSec * counterSec) + 'px)';
});


carouselSlideSec.addEventListener('transitionend', () => {
if (carouselImagesSec[counterSec].id === "secLastClone"){
carouselSlideSec.style.transition = "none";
counterSec = carouselImagesSec.length-6;
carouselSlideSec.style.transform = 'translateX(' + (-sizeSec * counterSec) + 'px)';
}
});

carouselSlideSec.addEventListener('transitionend', () => {
if (carouselImagesSec[counterSec].id === "secfirstClone"){
carouselSlideSec.style.transition = "none";
counterSec = carouselImagesSec.length-(counterSec+4);
carouselSlideSec.style.transform = 'translateX(' + (-sizeSec * counterSec) + 'px)';
}
});


