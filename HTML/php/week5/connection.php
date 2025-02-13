<?php

try {
    //DB configuration
    $dsn = "mysql:host=mysql.kberrio.slccwebdev.com; dbname=kb_class";
    $username="kb_student";
    $password="@Tacos4Life@";
    //PDO connection
    $pdo= new PDO($dsn,$username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected Successfully";
} 
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}
