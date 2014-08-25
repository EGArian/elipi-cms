<?php
function MakeHash($value) {
    return md5 ( $value );
}
function Escape($entery) {
    return htmlentities ( $entery, ENT_QUOTES, 'utf-8' );
}
function Redirect($url) {
    header ( 'location: ' . $url );
}
