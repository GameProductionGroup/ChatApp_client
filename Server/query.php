<?php

class QueryManager{
    private static $instance;

    private static $query = null;

    private function __construct(){

    }

    private function __clone(){

    }

    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance = new QueryManager;
        }

        return self::$instance;
    }

    public static function setQuery(string $QueryString){
        self::$query = $QueryString;
    }

    public static function getQuery(){
        return self::$query;
    }

}

?>
