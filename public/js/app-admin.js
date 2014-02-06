// Foundation JavaScript
// Documentation can be found at: http://foundation.zurb.com/docs
$(document).foundation();

$(document).ready(function()
{
	if($('#content-editor').length > 0)
	{
		var textarea = $('.content-editor').hide();
		
		var editor = ace.edit("content-editor");
			editor.setTheme("ace/theme/monokai");
			editor.getSession().setMode("ace/mode/markdown");
			editor.getSession().setUseWrapMode(true);
			editor.setShowPrintMargin(false);
			editor.getSession().setValue(textarea.val());
			editor.getSession().on('change', function(){
				textarea.val(editor.getSession().getValue());
			});
	}
	

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