
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
$(document).foundation();

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

  $(".fancybox").fancybox({
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

  // var container = document.querySelector('#news-posts');
  // var msnry = new Masonry( container, {
  //   itemSelector: '.test-post',
  // });

  //$('#faq-table').dataTable();

  $("img.unveil").unveil(100);

  //if($('#sender_question').length > 0){$('#sender_question').livesearch({searchCallback: searchFunction,queryDelay: 250,});}

});