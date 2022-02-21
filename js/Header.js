var header = document.getElementById("header");
var sticky = header.offsetTop;

function Follow() {
    if (window.pageYOffset > sticky) {
      header.classList.add("sticky");
    } else {
      header.classList.remove("sticky");
    }
  }


window.onload = function (){
    window.onscroll = function() {Follow()};
};