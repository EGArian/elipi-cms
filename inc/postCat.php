<?php
require_once str_replace ( '\\', '/', dirname ( dirname ( __FILE__ ) ) ) . '/database.php';
class postCat extends db {
    public function insert($pid,$cid){
        $this->SendQuery("INSERT INTO `elipi`.`postcat` (`post-id`, `cat-id`) VALUES ('{$pid}', '{$cid}')");
    }
    public function GetCatPost($id){
        $id=Escape($id);
        $results=$this->FetchQuery("SELECT * FROM `postcat` WHERE `post-id` = '{$id}'");
        if($results==array()){
            return false;
        }
        foreach ($results as $result ){
            $cats=$result['cat-id'];
            $mycats=$this->FetchQuery("SELECT * FROM `category` WHERE `id`='{$cats}'");
            foreach ($mycats as $cat){
                echo $cat['name'];
            }
            
        }
        
    }
}

?>