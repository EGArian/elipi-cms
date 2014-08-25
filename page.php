<?php
require_once 'inc/m-page.php';
$page = new page ();
if (isset ( $_GET ['id'] )) {
    $id = Escape ( $_GET ['id'] );
    $results = $page->ReadPg ( $_GET ['id'] );  
    foreach ( $results as $result ) {
        echo 'onvan : ' . "<a href='post.php?id=$result[id]'>" . $result ['title'] . '</a>' . '</br>';
        echo 'matn : ' . $result ['context'] . '</br>';
        echo 'user : ' . $result ['user-id'] . '</br>';
    }
} else {
    $results = $page->ReadPg ();
    foreach ( $results as $result ) {
        echo 'onvan : ' . "<a href='post.php?id=$result[id]'>" . $result ['title'] . '</a>' . '</br>';
        echo 'matn : ' . $result ['context'] . '</br>';
        echo 'user : ' . $result ['user-id'] . '</br>';
    }
}
?>
