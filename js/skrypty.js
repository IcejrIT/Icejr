// Header !!!!!!!!!!
var header = document.getElementById("header");
var sticky = header.offsetTop;

// Ładowanie strony !!!!!!!!!!

window.onload = function (){
window.onscroll = function() {Follow()};

setInterval(time, 5000);

// Slider 1 !!!!!!!!!!
const carouselSlide = document.querySelector('.carousel-slide');
const carouselImages =  document.querySelectorAll('.carousel-slide img');


let counter = 1;
const size = carouselImages[0].clientWidth;

carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';

carouselSlide.addEventListener('transitionend', () => {
if (carouselImages[counter].id === "firstClone"){
carouselSlide.style.transition = "none";
counter = carouselImages.length-(counter+4);
carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';
}
});


// Slider 2 !!!!!!!!!!
const carouselSlideSec = document.querySelector('.carousel-slide-sec');
const carouselImagesSec =  document.querySelectorAll('.carousel-slide-sec img');

const prev = document.querySelector('#prev');
const next = document.querySelector('#next');

let counterSec = 1;
const sizeSec = carouselImagesSec[0].clientWidth;

carouselSlideSec.style.transform = 'translateX(' + (-sizeSec * counterSec) + 'px)';

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

// Header !!!!!!!!!!
function Follow() {
    if (window.pageYOffset > sticky) {
      header.classList.add("sticky");
    } else {
      header.classList.remove("sticky");
    }
  }

// Slider 1 !!!!!!!!!!
function time(){
if (counter >= carouselImages.length -1) return;
carouselSlide.style.transition = "transform 0.4s ease-in-out";
counter++;
carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';
}

// Slider 2 !!!!!!!!!!
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
        

};