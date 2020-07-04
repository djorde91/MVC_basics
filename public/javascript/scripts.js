tinymce.init({
	
	plugins: "code",

	selector: "textarea.tinymce_class",
	    setup: function (editor) {
        editor.on('change', function () {
            editor.save();
        });
    },

	width: "100%",
	height: 300,

	toolbar1: "code | preview | fullscreen | emoticons | blockquote | cut copy paste | undo redo removeformat | save",
	toolbar2: "table | image | link | charmap | hr | media | alignleft aligncenter alignright alignjustify | outdent indent",
	toolbar3: "fontselect fontsizeselect | forecolor backcolor | bold italic underline strikethrough | subscript"



})


function showDiv() {

    var button = document.getElementById('insertar_form');
  			$("#insertar_form").toggleClass("show_div");
}