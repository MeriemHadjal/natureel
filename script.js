// VARIABLES
var menu = document.querySelector('.container_menu');
var burgerOpen = document.querySelector('.fa-bars');
var burgerClose = document.querySelector('.fa-times');
var concept = document.querySelector('#concept');
var sports = document.querySelector('#sports');
var last_article = document.querySelector('#last_article');
var footer = document.querySelector('#footer');
var voir_site = document.querySelector('.fa-angle-double-down');
var quiSommesNous = document.querySelector('.page-item-200');

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

voir_site.addEventListener('click', function () {

  concept.style.display = "block";
  sports.style.display = "block";
  last_article.style.display = "block";
  footer.style.display = "block";
  // concept.style.display = "block";
});

var test = document.querySelector('.page-item-140');

test.addEventListener('click', function (Event) {
  Event.preventDefault();
  menu.style.top = "-1000px";
  menu.style.transition = "0.5s";
  burgerClose.style.display = "none";
  burgerOpen.style.display = "block";
  concept.style.display = "block";
  sports.style.display = "block";
  last_article.style.display = "block";
  footer.style.display = "block";
  window.location.hash = '#concept';
});



