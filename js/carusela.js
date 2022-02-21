const carouselSlide = document.querySelector('.carousel-slide');
const carouselImages =  document.querySelectorAll('.carousel-slide img');


let counter = 1;
const size = carouselImages[0].clientWidth;

carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';



function time(){
if (counter >= carouselImages.length -1) return;
carouselSlide.style.transition = "transform 0.4s ease-in-out";
counter++;
carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';
}

setInterval(time, 5000);

carouselSlide.addEventListener('transitionend', () => {
if (carouselImages[counter].id === "firstClone"){
carouselSlide.style.transition = "none";
counter = carouselImages.length-(counter+4);
carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';
}
});


