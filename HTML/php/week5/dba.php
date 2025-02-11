<?php
$host= 'mysql.kberrio.slccwebdev.com';
$dbname = 'kb_class';
$username = 'kb_student';
$password = '@Tacos4Life@';

try {
    $dsn = "mysql:host=$host;dbname=$dbname";
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected Successfully";

    $createtable = "
    CREATE TABLE IF NOT EXICTS cool_productsant (
    idINT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    price DECIMAL(10,2),
    awesomeness_level INT DEFAULT 5
    )";

    $pdo->exec($createtable);
    echo " Table created successfully<br>";

    $insertProduct = "
    INSERT INTO cool_productsant (name, price, awesomeness_level)
    VALUES ('Laser Sword, 100.00, 10),
    ('Hoverboard', 500.0, 8),
    ('Jetpack', 1000.00, 9),
    ('Invisibility Cloak', 200.00, 7),
    ('Time Machine', 1000.00, 10)";

    $pdo->exec($insertProduct);
    $lastId = $pdo->lastInsertId();
    echo "Added a cool product with ID: $lastId<br>";

    $results = $pdo->query("SELECT * FROM cool_productsant");

    echo "<br> Here's what's in our store : <br>";
    while($row = $results ->fetch(PDO::FETCH_ASSOC)){
        echo "ID: " . $row['id'] . 
            "Name: " . $row['name'] . 
            "Price: ". $row['price'] . 
            "Awesomeness: " . $row['awesomeness_level'] . "<br>";
    };

} catch (PDOException $e) {
    echo "Conncetion failed: " . $e->getMessage();
}