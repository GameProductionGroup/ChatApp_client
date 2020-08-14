<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'chatapp');
define('DB_USER','chatapp');
define('DB_PASSWORD','');

$options = array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET CHARACTER SET 'utf8'");

try{
    $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD, $options);
    echo "Connect Succeed.";
}catch(PDOException $e){
    echo "CONNECTION_ERROR:" . $e->getMessage();
    exit();
}

?>
