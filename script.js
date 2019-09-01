// VARIABLES
var menu = document.querySelector('.container_menu');
var burgerOpen = document.querySelector('.fa-bars');
var burgerClose = document.querySelector('.fa-times');

//EVENTS

burgerOpen.addEventListener('click', function(){

  menu.style.top = "0";
  menu.style.transition = "0.5s";
  burgerOpen.style.display = "none";
  burgerClose.style.display = "block";

});

burgerClose.addEventListener('click', function(){

    menu.style.top = "-1000px";
    menu.style.transition = "0.5s";
    burgerClose.style.display = "none";
    burgerOpen.style.display = "block";
  });


//SCROLL
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

// SCROLL

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


// filtre bien-manger

filterSelectionCuisine("all-bien-manger") // Execute the function and show all columns
function filterSelectionCuisine(c) {
  var x, i;
  x = document.getElementsByClassName("column");
  if (c == "all-bien-manger") c = "";
  // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
  for (i = 0; i < x.length; i++) {
    removeCuisine(x[i], "show");
    if (x[i].className.indexOf(c) > -1) addClassCuisine(x[i], "show");
  }
}

// Show filtered elements
function addClassCuisine(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  console.log(arr1);
  arr2 = name.split(" ");
  console.log(arr2);
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {
      element.className += " " + arr2[i];
    }
  }
}

// Hide elements that are not selected
function removeCuisine(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1); 
    }
  }
  element.className = arr1.join(" ");
}

// Add active class to the current button (highlight it)
var btnContainerCuisine = document.getElementById("filtre_bien_manger");
var btnsCuisine = btnContainerCuisine.getElementsByClassName("btn");
for (var i = 0; i < btnsCuisine.length; i++) {
  btnsCuisine[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
    console.log(current);
  });
}

filterSelectionSport("all-sport-nature") // Execute the function and show all columns
function filterSelectionSport(c) {
  var x, i;
  x = document.getElementsByClassName("column");
  if (c == "all-sport-nature") c = "";
  // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
  for (i = 0; i < x.length; i++) {
    removeSport(x[i], "show");
    if (x[i].className.indexOf(c) > -1) addClassSport(x[i], "show");
  }
}

// Show filtered elements
function addClassSport(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  console.log(arr1);
  arr2 = name.split(" ");
  console.log(arr2);
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {
      element.className += " " + arr2[i];
    }
  }
}

// Hide elements that are not selected
function removeSport(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1); 
    }
  }
  element.className = arr1.join(" ");
}

// Add active class to the current button (highlight it)
var btnContainerSport = document.getElementById("filtre_sport_nature");
var btnsSport = btnContainerSport.getElementsByClassName("btn");
for (var i = 0; i < btnsSport.length; i++) {
  btnsSport[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
    console.log(current);
  });
}
