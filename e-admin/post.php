
<?php
include '../defaults.php';
include '../functions.php';
session_start ();

if (! isset ( $_SESSION ['validate'] )) {
    Redirect ( ADDRESS . 'e-admin/error.php' );
} else {
    ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<link href="css/bootstrap.rtl.css" rel="stylesheet" />
<link href="css/font-awesome.css" rel="stylesheet" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?php echo TITLE?> ارسال پست</title>
<link href="assets/css/custom.css" rel="stylesheet" />
</head>
<body>
	<form action="" method="post">
		<div id="wrapper">
			<nav class="navbar navbar-default navbar-cls-top " role="navigation"
				style="margin-bottom: 0">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse"
						data-target=".sidebar-collapse">
						<span class="sr-only">Toggle navigation</span> <span
							class="icon-bar"></span> <span class="icon-bar"></span> <span
							class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php">Elipi Admin</a>
				</div>
				<div
					style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;">
					Last access : 30 May 2014 &nbsp; <a href="#"
						class="btn btn-danger square-btn-adjust">Logout</a>
				</div>
			</nav>
			<nav class="navbar-default navbar-side" role="navigation"
				style="padding: 20px; background: #F2F2F2;">


				<h3>
					<span class="fa fa-check-square-o label label-primary"> موضوعات</span>
				</h3>

				<div class="cats">
                <?php
    require_once str_replace ( '\\', '/', dirname ( dirname ( __FILE__ ) ) ) . '/inc/m-category.php';
    $cats = new category ();
    $cat = $cats->ReadC ();
    foreach ( $cat as $ca ) {
        echo '<input type="checkbox" value="' . $ca ['id'] . '" name="postname[]">' . $ca ['name'] . '</input><br>';
    }
    ?>
		</div>
			</nav>
			<div id="page-wrapper">
				<div id="page-inner">
<?php
    require_once '../inc/m-post.php';
    require_once '../inc/postCat.php';
    if (isset ( $_POST ['title'] )) {
        $user = new db ();
        $myuser = $user->FetchQuery ( "select * from user WHERE `username`= '{$_SESSION['user']}'" );
        $post = new post ();
        if ($post->CreateP ( $_POST ['title'], $_POST ['context'], $myuser [0] ['id'] )) {
            $postId=mysql_insert_id();
            $ids = $_POST ['postname'];
            $allcat = new postCat ();
            foreach ( $ids as $id ) {
                $allcat->insert ( $postId, $id );
            }
          
        }
        Redirect(ADDRESS . '/e-admin/post.php');
    }
    ?>
<script src="ckeditor/ckeditor.js"></script>


					<input name="title" class="form-control" type="text"
						placeholder="عنوان مطلب..."><br> <br>
					<textarea id="test" name="context" cols="50" rows="5"></textarea>
					<script> 
   CKEDITOR.replace( 'context' ,{
	   language :'fa' ,
   }
		   );
    </script>
					<br> <input name="send" value="ارسال"
						class="btn btn-default btn-lg active" type="submit">

				</div>

			</div>
		</div>
	</form>
</body>
</html>

<?php
}
?>
