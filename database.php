<?php
require_once 'defaults.php';
class db {
    private $connection;
    public function __construct() {
        $this->connection = mysql_connect ( HOST, USER, PASS );
        mysql_select_db ( DB, $this->connection );
        mysql_query ( 'set names \'utf8\'' );
        mysql_set_charset ( 'utf-8' );
    }
    public function SendQuery($value) {
        if ($this->connection) {
            return mysql_query ( $value, $this->connection );
        }
        return false;
    }
    public function FetchQuery($value) {
        $myresults = array ();
        if ($this->connection) {
            $results = $this->SendQuery ( $value );
            if (mysql_num_rows ( $results ) > 0) {
                while ( $result = mysql_fetch_assoc ( $results ) ) {
                    $myresults [] = $result;
                }
            }
            return $myresults;
        }
    }
    public function Affected(){
        $result=mysql_affected_rows($this->connection);
        return $result;
    }
    public function secure($value) {
        return mysql_real_escape_string ( $value );
    }
}