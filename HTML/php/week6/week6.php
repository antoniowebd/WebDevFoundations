<?php


$servername = 'php-mysql-exercisedb.slccwebdev.com'; 
$dbname = 'php_mysql_exercisedb'; 
$username = 'phpmysqlexercise'; 
$password = 'mysqlexercise'; 


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Secure SQL query using prepared statements
    $stmt = $conn->prepare("SELECT * FROM users_juan WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $user, $pass);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Login successful!";
    } else {
        echo "Invalid username or password.";
    }

    $stmt->close();
}

$conn->close();
?>