// Foundation JavaScript
// Documentation can be found at: http://foundation.zurb.com/docs
$(document).foundation({
	tooltip : {
		disable_for_touch: true
	},
});

$(document).ready(function()
{
  $('a.lightbox').nivoLightbox();

  $('#ec-countdown').countdown({ 
    until: new Date("April 17, 2014 20:00:00"),
    compactLabels: ['y', 'm', 'w', 'Days'],
    compact: true
  });

  $('.ec-triangles').parallax("50%", 0.4);

  // $('#news-posts').masonry({
  //   itemSelector: '.news-post',
  //   transitionDuration: 0
  // });
});