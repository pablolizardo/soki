
new Vivus('logo', {
    type: 'oneByOne',
    duration: 100,
    pathTimingFunction: Vivus.EASE,
    animTimingFunction : Vivus.EASE
});



$(function() {
$('#main').smoothState({ 
	debug: false ,
	anchors: 'a',
		onStart: {
		    // How long this animation takes
		    duration: 200,
		    // A function that dictates the animations that take place
		    render: function ($container) {
	    }
	  }
});});


