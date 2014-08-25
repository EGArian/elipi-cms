<?php
require_once 'database.php';
require_once 'functions.php';
class login extends db {
    public function isMember($username, $password) {
        if (isset ( $username ) && isset ( $password )) {
            $username = $this->secure ( $username );
            $password = MakeHash ( $this->secure ( $password ) );
            $result = $this->FetchQuery ( "select * FROM user WHERE `username`='{$username}' AND `password`='{$password}'" );
            if ($result != array ())
                return true;
        }
        return false;
    }
    public function isMod($username){
        $username=Escape($username);
        $result = $this->FetchQuery ( "select * FROM user WHERE `username`='{$username}' AND `mod`= 1" );
        if ($result!=array()){
            return true;
        }
        return false;
            
    }
}

?>