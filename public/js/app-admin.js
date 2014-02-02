// Foundation JavaScript
// Documentation can be found at: http://foundation.zurb.com/docs
$(document).foundation();

$(document).ready(function()
{
	var textarea = $('.content-editor').hide();
	
	var editor = ace.edit("content-editor");
		editor.setTheme("ace/theme/monokai");
		editor.getSession().setMode("ace/mode/markdown");
		editor.getSession().setValue(textarea.val());
		editor.getSession().on('change', function(){
			textarea.val(editor.getSession().getValue());
		});

	$("a.fancybox").fancybox({
		defaults : {padding: 0, width: 1000, height: 900},
		helpers : {media: true},
		youtube : {autoplay: 1}

	});
});
