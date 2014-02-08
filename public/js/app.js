// Foundation JavaScript
// Documentation can be found at: http://foundation.zurb.com/docs
$(document).foundation({
	tooltip : {
		disable_for_touch: true
	},
  orbit: {
    animation: 'fade',
    timer_speed: 2500,
    pause_on_hover: true,
    animation_speed: 500,
    navigation_arrows: false,
    bullets: false,
    slide_number: false,
    resume_on_mouseout: true,
  }
});

$(document).ready(function()
{
  $('#ec-countdown').countdown({ 
    until: new Date("April 17, 2014 20:00:00"),
    compactLabels: ['y', 'm', 'w', 'Days'],
    compact: true
  });

  $('#ec-countdown-text').countdown({
    until: new Date("April 17, 2014 20:00:00"),
    format: 'd',
    compactLabels: ['y', 'm', 'w', ' days;'],
    compact: true
  });

  $("a.fancybox").fancybox({
    defaults : {
      padding: 0,
      width: 1280,
      height: 720
    },
    helpers : {
      media: true,
      overlay: {
        locked: false
      }
    },
    youtube : {
      autoplay: 1
    }
  });

  $('#faq-table').dataTable();

  $("img.unveil").unveil(100);
});