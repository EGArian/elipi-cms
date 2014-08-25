<?php
require_once str_replace ( '\\', '/', dirname ( dirname ( __FILE__ ) ) ) . '/database.php';
class category extends db {
    public function ReadC() {
        $result = $this->FetchQuery ( 'select * from `category` ' );
        return $result;
    }
    public function CreateC($cat) {
        if (isset ( $cat )) {
            $cat = Escape ( $cat );
            $result = $this->SendQuery ( "INSERT INTO `elipi`.`category` (`id`, `name`) VALUES (NULL, '{$cat}')" );
            return $result;
        }
        return false;
    }
    public function DeleteC($id) {
        if (isset ( $id )) {
            $id = Escape ( $id );
            $result = $this->SendQuery ( "DELETE FROM `elipi`.`category` WHERE `category`.`id` = '{$id}'" );
            return $result;
        }
        return false;
    }
    public function UpdateC($value, $id) {
        if (isset ( $value ) && isset ( $id )) {
            $value = Escape ( $value );
            $id = Escape ( $id );
            $result = $this->SendQuery ( "UPDATE `elipi`.`category` SET `name` = '{$value}' WHERE `category`.`id` = '{$id}'" );
            return $result;
        }
        return false;
    }
    public function getCat($id){
        $result = $this->FetchQuery ("select * from `category` where `id`='{$id}' " );
        return $result;
    }
}
