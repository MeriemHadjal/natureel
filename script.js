// VARIABLES
var menu = document.querySelector('.container_menu');
var burgerOpen = document.querySelector('.fa-bars');
var burgerClose = document.querySelector('.fa-times');
var concept = document.querySelector('#concept');
var sports = document.querySelector('#sports');
var last_article = document.querySelector('#last_article');
var footer = document.querySelector('#footer');
// var voir_site = document.querySelector('.fa-angle-double-down');
var quiSommesNous = document.querySelector('.page-item-140');

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

// voir_site.addEventListener('click', function () {

//   concept.style.display = "block";
//   sports.style.display = "block";
//   last_article.style.display = "block";
//   footer.style.display = "block";
//   // concept.style.display = "block";
// });


// quiSommesNous.addEventListener('click', function (Event) {
//   Event.preventDefault();
//   menu.style.top = "-1000px";
//   menu.style.transition = "0.5s";
//   burgerClose.style.display = "none";
//   burgerOpen.style.display = "block";
//   concept.style.display = "block";
//   sports.style.display = "block";
//   last_article.style.display = "block";
//   footer.style.display = "block";
//   window.location.hash = '#concept';
 
// });


//SCROLL cuisine

jQuery.post(
  ajaxurl,
  {
    'action': 'mon_action_cuisine',
    // 'param': 'coucou'
  },

  function (response) {
    jQuery('.somewhere_cuisine').append(response);
  }
);

// fonction load_more

var offsetCuisine = 3;

jQuery(window).scroll(function () {

  if (jQuery(window).scrollTop() == jQuery(document).height() - jQuery(window).height()) {
    // console.log('OUAI');

    jQuery.post(
      ajaxurl,
      {
        'action': 'load_more_cuisine',
        'offset': offsetCuisine
      },

      function (response) {
        offsetCuisine = offsetCuisine + 3;
        jQuery('.a_la_suite_cuisine').append(response);
        // console.log(response);
      }
    );
  }
});

//SCROLL sport

jQuery.post(
  ajaxurl,
  {
  'action': 'mon_action_sport',
  // 'param': 'coucou'
  },
  
  function (response) {
  jQuery('.somewhere_sport').append(response);
  }
  
  );
  
  // fonction load_more
  
  var offsetSport = 1;
  
  jQuery(window).scroll(function () {
  
  if (jQuery(window).scrollTop() == jQuery(document).height() - jQuery(window).height()) {
  // console.log('OUAI');
  
  jQuery.post(
  ajaxurl,
  {
  'action': 'load_more_sport',
  'offset': offsetSport
  },
  
  function (response) {
  offsetSport = offsetSport + 1;
  jQuery('.a_la_suite_sport').append(response);
  // console.log(response);
  }
  );
  }
  });