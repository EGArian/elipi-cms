<!doctype html>
<html>
<head>
<meta charset="utf-8" />
</head>
<body>

<?php
require_once 'functions.php';
require_once 'defaults.php';
require_once 'inc/m-post.php';
require_once 'inc/postCat.php';
$post = new post ();
if (isset ( $_GET ['id'] )) {
    $id = Escape ( $_GET ['id'] );
    if ($results = $post->ReadP ( $_GET ['id'] )) {
        foreach ( $results as $result ) {
            echo 'onvan : ' . "<a href='post.php?id=$result[id]'>" . $result ['title'] . '</a>' . '</br>';
            echo 'matn : ' . $result['context'] . '</br>';
            echo 'user : ' . $result ['user-id'] . '</br><hr>';
            require_once 'comment.php';
        }
        $cat=new postCat();
        $myCat=$cat->GetCatPost($_GET ['id']);
    }
    else {
        Redirect(ADDRESS .'404.php');
    }
} else {
    $results = $post->ReadP ();
    foreach ( $results as $result ) {
        echo 'onvan : ' . "<a href='post.php?id=$result[id]'>" . $result ['title'] . '</a>' . '</br>';
        echo  html_entity_decode($result['context']) ;
        echo 'user : ' . $result ['user-id'] . '</br>';
    }
}
?>

</body>
</html>