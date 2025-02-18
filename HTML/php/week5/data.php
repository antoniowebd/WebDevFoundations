<?php

//Secret connecction details
$host = 'mysql.kberrio.slccwebdev.com'; //Where out database is located
$dbname = 'kb_class'; //Name of our database
$username = 'kb_student'; //Username to access the database
$password = '@Tacos4Life@'; //Password to access the database

try{
    //Creating our connection string
    $dsn = "mysql:host=$host;dbname=$dbname"; //Data Source Name

    //Making the actual connection
    $pdo = new PDO($dsn, $username, $password);

    //Set up super powers (error shields) -> makes debugging easier!
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connected successfully<br>";

    //Let's create a table to store some cool data
    $createTable = "
        CREATE TABLE IF NOT EXISTS ant_cool_products (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            price DECIMAL (10,2),
            awesomeness_level INT DEFAULT 5
        )";

    $pdo->exec($createTable);
    echo "Table created successfully<br>";

    //Let's add some fun cool products
    $insertProduct = "
        INSERT INTO ant_cool_products (name, price, awesomeness_level)
        VALUES ('Laser Sword', 100.00, 10),
               ('Hoverboard', 500.00, 8),
               ('Jetpack', 1000.00, 9),
               ('Invisibility Cloak', 200.00, 7),
               ('Time Machine', 10000.00, 10),
               ('Excalibur', 150.00, 10)";
    
    $pdo->exec($insertProduct);

    $lastId = $pdo->lastInsertId();
    echo "Added a Cool Product with ID: $lastId<br>";

    //Let's get all the cool products
    $results = $pdo->query("SELECT * FROM ant_cool_products");

    //Show everything we found
    echo "<br> Here's what's in ouur store: <br>";
    while($row = $results->fetch(PDO::FETCH_ASSOC)){
        echo "ID: " . $row['id'] .  
            " | Name: " . $row['name'] . 
            " | Price: " . $row['price'] . 
            " | Awesomeness Level: " . $row['awesomeness_level'] . "<br>";
    }

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}