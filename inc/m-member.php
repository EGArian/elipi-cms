<?php
require_once str_replace ( '\\', '/', dirname ( dirname ( __FILE__ ) ) ) . '/database.php';
class member extends db {
    public function Register($user, $pass, $name, $email) {
        $user = $this->secure ( $user );
        $pass = MakeHash ( $this->secure ( $pass ) );
        $name = $this->secure ( $name );
        $email = $this->secure ( $email );
        $date = date ( 'Y/m/d' );
        $this->SendQuery ( "INSERT INTO `elipi`.`user` (`id`, `username`, `password`, `name`, `email`, `date`) VALUES (NULL, '{$user}', '{$pass}', '{$name}', '{$email}', '{$date}')" );
    }
    public function Remove($id) {
        $id = htmlentities ( $id, ENT_QUOTES, 'utf-8' );
        $this->SendQuery ( "DELETE FROM `elipi`.`user` WHERE `user`.`id` = '{$id}' " );
        return mysql_affected_rows ();
    }
    public function ViewAllMember() {
        $result = $this->FetchQuery ( ' select * from `user` ' );
        return $result;
    }
    public function UpdateMember($id, $user, $pass, $name, $email) {
        if (isset ( $id )) {
            $id = $this->secure ( $id );
            $query = " UPDATE `elipi`.`user` SET ";
            if (isset ( $user )) {
                $user = $this->secure ( $user );
                $query .= " `username` = '{$user}',";
            }
            if (isset ( $pass )) {
                $pass = $this->secure ( $pass );
                $query .= " `password` = '{$pass}',";
            }
            if (isset ( $name )) {
                $name = $this->secure ( $name );
                $query .= " `name` = '{$name}',";
            }
            if (isset ( $email )) {
                $email = $this->secure ( $email );
                $query .= " `email` = '{$email}'";
            }
        }
        
        $query .= " WHERE `user`.`id` = '{$id}'";
        $this->SendQuery ( $query );
        return mysql_affected_rows ();
    }
}
?>