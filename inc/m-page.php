<?php
require_once str_replace ( '\\', '/', dirname ( dirname ( __FILE__ ) ) ) . '/database.php';
require_once str_replace ( '\\', '/', dirname ( dirname ( __FILE__ ) ) ) . '/functions.php';
class page extends db {
    public function CreatePg($title, $context, $user, $cat) {
        if (isset ( $title ) && isset ( $user ) && $title != '') {
            
            if ($result = $this->FetchQuery ( "select * from `user` where `id`='{$user}'" )) {
                $title = Escape ( $title );
                $context = Escape ( $context );
                $user = Escape ( $user );
                $cat = Escape ( $cat );
                $date = date ( 'Y/m/d' );
                $this->SendQuery ( "INSERT INTO `elipi`.`page` (`id`, `title`, `context`, `user-id`, `cat-id`, `date`) VALUES (NULL, '{$title}', '{$context}', '{$user}', '{$cat}', '{$date}')" );
            }
        }
        return $this->Affected ();
    }
    public function DeletePg($id) {
        if (isset ( $id )) {
            $id = Escape ( $id );
            $result = $this->SendQuery ( "DELETE FROM `elipi`.`page` WHERE `page`.`id` = '{$id}'" );
        }
        return $this->Affected ();
    }
    public function UpdatePg($id, $title, $context, $cat) {
        if (isset ( $id )) {
            $query = "UPDATE `page` SET";
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
            $query .= " WHERE `page`.`id` = '{$id}'";
            $this->SendQuery ( $query );
        }
        return $this->Affected ();
    }
    public function ReadPg($id) {
        if (isset ( $id )) {
            $id = Escape ( $id );
            $result = $this->FetchQuery ( "SELECT * FROM `page` WHERE `id` ='{$id}' " );
            return $result;
        }
    }
}
?>