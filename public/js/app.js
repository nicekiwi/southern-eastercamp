
function searchFunction(searchTerm) 
{
  var resultBox = $('#faq-query-results ul');

  resultBox.html('');

  $.getJSON( "/faq/question/query/" + searchTerm, function( data ) 
  {
    if(data.length > 0)
    {
      $.each( data, function( key, val ) {
        resultBox.append( "<li><a href='/faq/question/"+val.id+"'>" + val.question + "</a></li>" );
      });
    }
  });
}

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
  //initMaps();

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

  //$('#faq-table').dataTable();

  $("img.unveil").unveil(100);

  //if($('#sender_question').length > 0){$('#sender_question').livesearch({searchCallback: searchFunction,queryDelay: 250,});}

});