
new Vivus('logo', {
    type: 'oneByOne',
    duration: 50,
    pathTimingFunction: Vivus.EASE,
    animTimingFunction : Vivus.EASE
});


function isElementInViewport(elem) {
    var $elem = $(elem);

    // Get the scroll position of the page.
    var scrollElem = ((navigator.userAgent.toLowerCase().indexOf('webkit') != -1) ? 'body' : 'html');
    var viewportTop = $(scrollElem).scrollTop();
    var viewportBottom = viewportTop + $(window).height();

    // Get the position of the element on the page.
    var elemTop = Math.round( $elem.offset().top );
    var elemBottom = elemTop + $elem.height();

    return ((elemTop < viewportBottom) && (elemBottom > viewportTop));
}

// Check if it's time to start the animation.
function checkAnimation() {
    var $iphone = $('.iphone-icon');
    if (isElementInViewport($iphone)) {
        $('.iphone-wrap .iphone-icon').addClass('anim-appIcon');
        $('.iphone-wrap .iphone-screen').addClass('anim-appScreen');
    } else {
        $('.iphone-wrap .iphone-icon').removeClass('anim-appIcon');
        $('.iphone-wrap .iphone-screen').removeClass('anim-appScreen');
    }

    var $mockupIcon = $('.mockup-icon');
    if (isElementInViewport($mockupIcon)) {
        $('.mockup-icon').addClass('anim-appIcon');
        $('.mockup-screen').addClass('anim-appScreen');
    } else {
        $('.mockup-icon').removeClass('anim-appIcon');
        $('.mockup-screen').removeClass('anim-appScreen');
    }

    
}



$(document).ready(function(){

  // var imgSlider = simpleslider.getSlider({
  //     container: document.getElementById('galeria'),
  //     prop: 'left',
  //     init: -612,
  //     show: 0,
  //     end: 612,
  //     unit: 'px'
  //   });

  
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 1800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });

    // Capture scroll events
  $(window).scroll(function(){
      checkAnimation();
  });


});



// $(function() {
// $('#main').smoothState({ 
// 	debug: false ,
// 	anchors: 'a',
// 		onStart: {
// 		    // How long this animation takes
// 		    duration: 200,
// 		    // A function that dictates the animations that take place
// 		    render: function ($container) {
// 	    }
// 	  }
// });});


