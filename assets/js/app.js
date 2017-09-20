(function($) {

	$('a.gallery').featherlightGallery({
		previousIcon: '&#9664;',     /* Code that is used as previous icon */
		nextIcon: '&#9654;',         /* Code that is used as next icon */
		galleryFadeIn: 100,          /* fadeIn speed when slide is loaded */
		galleryFadeOut: 300          /* fadeOut speed before slide is loaded */
	});

})(jQuery);

(function($) {

	$('.single #slides').slick({
		centerMode: true,
		centerPadding: '60px',
		slidesToShow: 3,
		responsive: [
		{
			breakpoint: 768,
			settings: {
				arrows: false,
				centerMode: true,
				centerPadding: '40px',
				slidesToShow: 3
			}
		},
		{
			breakpoint: 480,
			settings: {
				arrows: false,
				centerMode: true,
				centerPadding: '40px',
				slidesToShow: 1
			}
		}
		]
	});


	$('.slide').slick({
		slidesToShow: 4,
		dots: false,
		infinite: false,
		slidesToScroll: 4,
		appendArrows: ".prod-links",
		prevArrow: "<p class='prev'><a rel='prev'></a></p>",
		nextArrow: "<p class='next'><a rel='next'></a></p>",

		responsive: [
		{
			breakpoint: 768,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 3,
			}
		},
		{
			breakpoint: 480,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
			}
		}
		]
	});

})(jQuery);


var vid = document.getElementById("bgvid");
var pauseButton = document.querySelector("#polina button");

if (window.matchMedia('(prefers-reduced-motion)').matches) {
    vid.removeAttribute("autoplay");
    vid.pause();
    pauseButton.innerHTML = "Paused";
}

function vidFade() {
	vid.classList.add("stopfade");
}

vid.addEventListener('ended', function()
{
	// only functional if "loop" is removed 
	vid.pause();
	// to capture IE10
	vidFade();
}); 


pauseButton.addEventListener("click", function() {
	vid.classList.toggle("stopfade");
	if (vid.paused) {
		vid.play();
		pauseButton.innerHTML = "Pause";
	} else {
		vid.pause();
		pauseButton.innerHTML = "Paused";
	}
})

