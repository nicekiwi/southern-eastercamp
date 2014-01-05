
var draw_triangles = function(shapes)
{
  $.each(shapes, function(index, value) 
  {
      draw_triangle(value[0],value[1],value[2],value[3],value[4],value[5]);
  });
}

var draw_triangle = function(ox,oy,tx,ty,lx,ly)
{
  var canvas = document.getElementById('canvas');

  var rand = function(array)
  {
    return Math.floor(Math.random() * array.length);
  }

  if (canvas.getContext)
  {
    var ctx = canvas.getContext('2d');

    var colors = ['AB7AB4','B457A7','5D4CA1','E063A9'];

    ctx.beginPath();
    ctx.moveTo(ox,oy);
    ctx.lineTo(tx,ty);
    ctx.lineTo(lx,ly);
    ctx.lineTo(ox,oy);

    ctx.fillStyle = colors[rand(colors)];
    ctx.fill();
  }
}

$(document).foundation();
$(document).ready(function()
{
  var shapes = {
    0: ['410','48','475','86','420','135'],
    1: ['410','48','420','135','365','185']
  }

  //$(".logo-layer").each(function(index) {
  $($('.logo-layer').get().reverse()).each(function(index)
  {
    $(this).delay(350*index).fadeIn(250);
  }).promise().done( function()
  {
      $( '.logo-layer' ).last().attr('src','/img/logo-ab/10_logo.svg').hide().fadeIn(250);
  });

  $('a.lightbox').nivoLightbox();

  $('#ec-countdown').countdown({ 
    until: new Date("April 17, 2014 20:00:00"),
    compactLabels: ['y', 'm', 'w', 'Days'],
    compact: true
  }); 

  $('#news-posts').masonry({
    itemSelector: '.news-post',
    transitionDuration: 0
  });

  //$('#nav').localScroll(800);

  //.parallax(xPosition, speedFactor, outerHeight) options:
  //xPosition - Horizontal position of the element
  //inertia - speed to move relative to vertical scroll. Example: 0.1 is one tenth the speed of scrolling, 2 is twice the speed of scrolling
  //outerHeight (true/false) - Whether or not jQuery should use it's outerHeight option to determine when a section is in the viewport
  $('#intro').parallax("50%", 0.1);
  $('#second').parallax("50%", 0.1);
  $('.bg').parallax("50%", 0.4);
  $('#third').parallax("50%", 0.3);
});

$(window).scroll(function() {
    // if ($('#rider').is(':onscreen')) 
    // {
    //     $( "#rider" ).animate(
    //     {
    //       left: "-180",
    //     }, 3000, function() {
    //       // Animation complete.
    //     });
    // } else {
    //   alert('meow');
    //   $('#rider').css({'left':0});
    // }
});

// (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
// (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
// m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
// })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

// ga('create', 'UA-27731360-1', 'eastercamp.org.nz');
// ga('send', 'pageview');