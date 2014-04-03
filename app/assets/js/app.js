//= include ../../../bower_components/jquery/dist/jquery.js
//= include ../../../bower_components/foundation/js/foundation.js
//= include ../../../bower_components/fancybox/source/jquery.fancybox.js
//= include ../../../bower_components/fancybox/source/helpers/jquery.fancybox-media.js
//= include ../../../bower_components/unveil/jquery.unveil.js
//= include ../../../bower_components/jquery.countdown/dist/jquery.countdown.js
//= include ../../../bower_components/datatables/media/js/jquery.dataTables.js
//= include jquery.livesearch.js

      //localVendor: './app/assets/vendor/**/*.js', 


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
  oTable = $('.faq-table').dataTable({
    //"aoColumns": [null],
    "bPaginate": false,
    //"bLengthChange": false,
    "bFilter": true,
    "bSort": true,
    "sDom": '<"top">rt<"bottom"lp><"clear">',
    //"bInfo": false,
    "bAutoWidth": false,
    // "oLanguage": {
    //   "sSearch": "Filter by keyword: "
    // }

  });

  $('.faq-table-filter').keyup(function(){
        oTable.fnFilter( $(this).val() );
  });

  $('.ec-countdown').countdown('2014/04/17 20:00:00', function(event) {
    $(this).html(event.strftime('%-D Days %H:%M:%S'));
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