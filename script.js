// VARIABLES
var menu = document.querySelector('.container_menu');
var burgerOpen = document.querySelector('.fa-bars');
var burgerClose = document.querySelector('.fa-times');

//EVENTS

burgerOpen.addEventListener('click', function () {

  menu.style.top = "0";
  menu.style.transition = "0.5s";
  burgerOpen.style.display = "none";
  burgerClose.style.display = "block";

});

burgerClose.addEventListener('click', function () {

  menu.style.top = "-1000px";
  menu.style.transition = "0.5s";
  burgerClose.style.display = "none";
  burgerOpen.style.display = "block";
});



