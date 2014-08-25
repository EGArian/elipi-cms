CKEDITOR.editorConfig = function( config ) {
	config.toolbarGroups = [
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'forms' },
		{ name: 'tools' },
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'others' },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ name: 'styles' },
		{ name: 'colors' },
	];
	config.removeButtons = 'Underline,Subscript,Superscript';
	config.format_tags = 'p;h1;h2;h3;pre';
		config.removeDialogTabs = 'image:advanced;link:advanced';
		config.enterMode = CKEDITOR.ENTER_P;
		config.enterMode = CKEDITOR.ENTER_DIV;
        config.enterMode = CKEDITOR.ENTER_BR;
        config.autoParagraph = false;
        config.extraPlugins = 'filebrowser';
        config.extraPlugins = 'popup';
        config.filebrowserBrowseUrl = 'ckeditor/kcfinder/browse.php?opener=ckeditor&type=files';
        config.filebrowserImageBrowseUrl = 'ckeditor/kcfinder/browse.php?opener=ckeditor&type=images';
		config.filebrowserFlashBrowseUrl = 'ckeditor/kcfinder/browse.php?opener=ckeditor&type=flash';
		config.filebrowserUploadUrl = 'ckeditor/kcfinder/upload.php?opener=ckeditor&type=files';
		config.filebrowserImageUploadUrl = 'ckeditor/kcfinder/upload.php?opener=ckeditor&type=images';
		config.filebrowserFlashUploadUrl = 'ckeditor/kcfinder/upload.php?opener=ckeditor&type=flash';
		config.extraPlugins = 'entities';
   
};


