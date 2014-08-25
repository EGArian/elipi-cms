<?php
require_once str_replace ( '\\', '/', dirname ( dirname ( __FILE__ ) ) ) . '/database.php';
require_once str_replace ( '\\', '/', dirname ( dirname ( __FILE__ ) ) ) . '/functions.php';
class comment extends db {
    public function CreateC($name, $email, $link, $context, $pi) {
        if (isset ( $name, $email, $context )) {
            $name = Escape ( $name );
            $context = Escape ( $context );
            $email = Escape ( $email );
            $link = Escape ( $link );
            $pi = Escape ( $pi );
            $date = date ( 'Y/m/d' );
            $this->SendQuery ( "INSERT INTO `elipi`.`comment` (`id`, `name`, `email`, `link`, `context`, `post-id`, `date`) VALUES (NULL, '{$name}', '{$email}', '{$link}', '{$context}', '{$pi}', '{$date}')" );
        }
        return $this->Affected ();
    }
    public function DeleteC($id) {
        if (isset ( $id )) {
            $id = Escape ( $id );
            $result = $this->SendQuery ( "DELETE FROM `elipi`.`comment` WHERE `comment`.`id` = '{$id}'" );
        }
        return $this->Affected ();
    }
    public function UpdateC($id,$context,$confirmed) {
        if (isset ( $id )) {
            $query = "UPDATE `comment` SET";
            if (isset ( $context )) {
                $context = Escape ( $context );
                $query .= " `context`='{$context} ' ,";
            }
            if (isset ( $confirmed )) {
                $confirmed = Escape ( $confirmed );
                $query .= " `confirmed`='{$confirmed}'";
            }
            $query .= " WHERE `comment`.`id` = '{$id}'";
            $this->SendQuery ( $query );
        }
        return $this->Affected ();
    }
    public function ReadC($pid) {
        if (isset ( $pid )) {
            $pid = Escape ( $pid );
            $result = $this->FetchQuery ( "SELECT * FROM `comment` WHERE `post-id` ='{$pid}' AND `confirmed`= 1 " );
            if ($result == array ()) {
                return false;
            }
        } 
        return $result;
    }
}
?>