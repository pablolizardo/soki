new Vivus('logo', {
	type: 'oneByOne',
	duration: 20,
	pathTimingFunction: Vivus.EASE,
	animTimingFunction : Vivus.EASE
});

window.addEventListener('load',function() {
	$("a").on('click', function(event) {
		if (this.hash !== "") {
			event.preventDefault();
			var hash = this.hash;
			$('html, body').animate({
				scrollTop: $(hash).offset().top
			}, 1800, function(){
				window.location.hash = hash;
			});
		} 
	});
});


