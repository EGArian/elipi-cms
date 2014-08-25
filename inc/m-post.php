<?php
require_once str_replace ( '\\', '/', dirname ( dirname ( __FILE__ ) ) ) . '/database.php';
require_once str_replace ( '\\', '/', dirname ( dirname ( __FILE__ ) ) ) . '/functions.php';
class post extends db {
    public function CreateP($title, $context, $user) {
        if (isset ( $title ) && isset ( $user ) && $title != '') {         
            if ($result = $this->FetchQuery ( "select * from `user` where `id`='{$user}'" )) {
                $title = Escape ( $title );
                $context = Escape ( $context );
                $user = Escape ( $user );
                $date = date ( 'Y/m/d' );
                $result=$this->SendQuery ( "INSERT INTO `elipi`.`post` (`id`, `title`, `context`, `user-id`, `date`) VALUES (NULL, '{$title}', '{$context}', '{$user}', '{$date}')" );
            }
        }
        return $this->Affected ();
    }
    public function DeleteP($id) {
        if(isset($id))
        {
            $id = Escape ( $id );
            $result = $this->SendQuery ( "DELETE FROM `elipi`.`post` WHERE `post`.`id` = '{$id}'" );
        }
        return $this->Affected ();
    }
    public function UpdateP($id, $title, $context, $cat) {
        if (isset ( $id )) {
            $query = "UPDATE `post` SET";
            if (isset ( $title )) {
                $title = Escape ( $title );
                $query .= " `title`='{$title} ' ,";
            }
            if (isset ( $context )) {
                $context = Escape ( $context );
                $query .= " `context`='{$context} ' ,";
            }
            if (isset ( $cat )) {
                $cat = Escape ( $cat );
                $query .= " `cat-id`='{$cat}'";
            }
            $query .= " WHERE `post`.`id` = '{$id}'";
            $this->SendQuery ( $query );
        }
        return $this->Affected ();
    }
    public function ReadP($id = null) {
        if (isset ( $id )) {
            $id = Escape ( $id );
            $result = $this->FetchQuery ( "SELECT * FROM `post` WHERE `id` ='{$id}' " );
            if ($result == array ()) {
                return false;
            }
        } else {
            $result = $this->FetchQuery ( "SELECT * FROM `post` ORDER BY id DESC" );
        }
        return $result;
    }
}
?>