<?php
require_once str_replace ( '\\', '/', dirname ( dirname ( __FILE__ ) ) ) . '/functions.php';
require_once str_replace ( '\\', '/', dirname ( dirname ( __FILE__ ) ) ) . '/database.php';
class login extends db {
    public function check_user($user, $pass) {
        $user = $this->secure ( $user );
        $pass = MakeHash ( $this->secure ( $pass ) );
        $result = $this->FetchQuery ( "SELECT * FROM user WHERE `username`='{$user}' AND `password`='{$pass}' " );
        if ($result) {
            return true;
        }
        return false;
    }
    public function is_admin($user, $pass) {
        $result = $this->check_user ( $user, $pass );
        if ($result) {
            $myresult = $this->FetchQuery ( "SELECT * FROM user WHERE `username`='{$user}' AND `mod`= 1 " );
            if($myresult){
                return true;
            }

        }
        return false;
    }
}
?>