<?php
require_once "templates/header.php";
?>

<textarea name="editor" id="editor"></textarea>

<script src="<?=$CURRENT_URL?>/../vendor/ckeditor/ckeditor.js"></script>

<script>
	ClassicEditor
		.create( document.querySelector( '#editor' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );
</script>

<?php
require_once __DIR__ . "/../templates/footer.php";
?>