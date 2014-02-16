
function searchFunction(searchTerm) 
{
  var resultBox = $('#faq-query-results');
  var resultList = $('ul', resultBox);

  resultList.html('');

  $.getJSON( "/faq/question/query/" + searchTerm, function( data ) 
  {
    if(data.length > 0)
    {
      if(resultBox.hasClass('hidden')) resultBox.removeClass('hidden');

      $.each( data, function( key, val ) {
        resultList.append( "<li><a href='/faq/question/"+val.id+"'>" + val.question + "</a></li>" );
      });
    }
  });
}

$(document).foundation();

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

  $(".fancybox").fancybox({
    width: 1280,
    height: 720,
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

  $("img.unveil").unveil(100);

  $('#sender_question').livesearch({searchCallback: searchFunction,queryDelay: 250,});

});