// Foundation JavaScript
// Documentation can be found at: http://foundation.zurb.com/docs
$(document).foundation();

$(document).ready(function()
{
	$('.redactor-editor').redactor();

	$("a.fancybox").fancybox({
		defaults : {padding: 0, width: 1000, height: 900},
		helpers : {media: true},
		youtube : {autoplay: 1}

	});
});

$(document).on('submit', '.delete-form', function(){
	return confirm('Are you sure?');
});