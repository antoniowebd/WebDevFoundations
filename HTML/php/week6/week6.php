<!DOCTYPE html>
<html>
<head>
    <title>Week 6 Homework: SQL Injection Demo</title>
    <!--<link rel="stylesheet" href="style.css">-->
</head>
<body>
    <h1>SQL Injection Demonstration</h1>

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

$user=$pass=""; // Initialize variables

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //Sanitize data
    $user = test_input($_POST["username"]);
    $pass = test_input($_POST["password"]);

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

// Sanitization Function
function test_input($data) {
    if (isset($data)){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
    }
    return $data;
}

?>

<form id="Injection" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username">
        <br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        <br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>