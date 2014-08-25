<?php
require_once 'inc/m-comment.php';
$post = new comment ();
if (isset ( $_GET ['id'] )) {
    $id = Escape ( $_GET ['id'] );
    if ($results = $post->ReadC ( $_GET ['id'] )) {
        foreach ( $results as $result ) {
            echo 'onvan : ' . "<a href='post.php?id=$result[id]'>" . $result ['name'] . '</a>' . '</br>';
            echo 'matn : ' . $result ['context'] . '</br>';
            echo 'user : ' . $result ['email'] . '</br>';
        }
    } else {
        echo 'nothing set';
    }
}

?>
