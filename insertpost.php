<?php
require_once 'inc/m-post.php';
require_once 'functions.php';

if (isset ( $_POST ['title'] )) {
    $m = new post ();
    $m->CreateP ( $_POST ['title'], $_POST ['context'], 2, 30 );
    Redirect ( ADDRESS . 'insertpost.php' );
}
?>

<html>
<head>
<script src="ckeditor/ckeditor.js"></script>

</head>
<body>
	<form action="" method="post">
		<input name="title" type="text"><br>
		<textarea id="test" name="context" cols="50" rows="5"></textarea>
		<script> 


   CKEDITOR.replace( 'context');

 </script>
		<br> <input name="" type="submit">
	</form>

</body>

</html>