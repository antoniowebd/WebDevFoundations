<?php
    // Connection details
    $host = 'php-mysql-exercisedb.slccwebdev.com'; 
    $dbname = 'php_mysql_exercisedb'; 
    $username = 'phpmysqlexercise'; 
    $password = 'mysqlexercise'; 

    // Create connection
    try {
        $dsn = "mysql:host=$host; dbname=$dbname";
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected Successfully";
    } catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }


/*
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Vulnerable SQL query
    $sql = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Login successful!";
    } else {
        echo "Invalid username or password.";
    }
}

//$conn->close();*/
?>