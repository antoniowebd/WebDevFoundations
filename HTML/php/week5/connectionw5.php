<?php

try {
    //DB configuration
    $dsn = "mysql:host=php-mysql-exercisedb.slccwebdev.com; dbname=php_mysql_exercisedb";
    $username="phpmysqlexercise";
    $password="mysqlexercise";
    //PDO connection
    $pdo= new PDO($dsn,$username,$password);
    $pdo→setAttrribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected Successfully";
} 
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}
