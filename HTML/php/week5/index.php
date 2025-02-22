<!DOCTYPE html>
<html>
<head>
    <title>Week 5 Homework: Survey Form Design</title>
    <link rel="stylesheet" href="style.css">

    <script>
        // JavaScript function to reset form after submission
        function resetForm() {
            document.getElementById("surveyForm").reset();  // Reset the form
        }
    </script>
</head>
<body>
    <h1>Survey Form</h1>
    <!-- Add Database Connection -->
    <?php
    //Secret connecction details
    $host = 'php-mysql-exercisedb.slccwebdev.com'; //Where out database is located
    $dbname = 'php_mysql_exercisedb'; //Name of our database
    $username = 'phpmysqlexercise'; //Username to access the database
    $password = 'mysqlexercise'; //Password to access the database

    // Create connection
    try {
        //DB configuration
        $dsn = "mysql:host=$host; dbname=$dbname";
    //    $username="phpmysqlexercise";
    //    $password="mysqlexercise";
        //PDO connection
        $pdo= new PDO($dsn,$username,$password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected Successfully" . "<br>";
    } 
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }

    // PHP Form Validation
    // Declare Variables
    $name = $email = $age = $gender = $country = $comments = "";
    $interests = array();
    $nameErr = $emailErr = $ageErr = $genderErr = $formErr = "";

    // Sanatize Data
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = test_input($_POST["name"]);
        $email = test_input($_POST["email"]);
        $age = test_input($_POST["age"]);
        $gender = isset($_POST["gender"]) ? test_input($_POST["gender"]) : '';
        $country = test_input($_POST["country"]);
        $comments = test_input($_POST["comments"]);
        $interests = isset($_POST["interests"]) ? implode(", ", $_POST["interests"]) : '';  // Ensuring that interests are not empty
    
        // Validate Data
        if (empty($name)) {
            $nameErr = "Name is required";
        }
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Valid email is required";
        }
        if (empty($age) || !is_numeric($age)) {
            $ageErr = "Age is required and must be a number";
        }
        if (empty($gender)) {
            $genderErr = "Gender is required";
        }
    
        // Proceed with database insert if no errors
        if (empty($nameErr) && empty($emailErr) && empty($ageErr) && empty($genderErr)) {
            // Prepared statement to avoid SQL injection
            $insertProduct = "
                INSERT INTO responses (name, email, age, gender, country, comments, interests)
                VALUES (:name, :email, :age, :gender, :country, :comments, :interests)";
            
            try {
                // Prepare statement
                $stmt = $pdo->prepare($insertProduct);
    
                // Bind parameters
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':age', $age);
                $stmt->bindParam(':gender', $gender);
                $stmt->bindParam(':country', $country);
                $stmt->bindParam(':comments', $comments);
                $stmt->bindParam(':interests', $interests);
    
                // Execute the statement
                $stmt->execute();
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        } else {
            $formErr = "Please fill in all required fields correctly.";
        }
    }

    // Sanatization Function
    function test_input($data) {
        if (isset($data)){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        }
        return $data;
    }

    ?>

<!-- Survey Form -->
<!-- Update Form Action & Form Method -->
<!-- Update to Display Errors & Success Messages -->
<form id="surveyForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" onsubmit="resetForm()">
    <!--<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">-->
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $name;?>" required>
        <span class="error"><?php echo $nameErr;?></span><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $email;?>" required>
        <span class="error"><?php echo $emailErr;?></span><br><br>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" value="<?php echo $age;?>" required>
        <span class="error"><?php echo $ageErr;?></span><br><br>

        <label>Gender:</label>
        <div class="radio-group">
            <input type="radio" id="male" name="gender" value="male" <?php if (isset($gender) && $gender=="male") echo "checked";?>>
            <label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="female" <?php if (isset($gender) && $gender=="female") echo "checked";?>>
            <label for="female">Female</label>
            <input type="radio" id="other" name="gender" value="other" <?php if (isset($gender) && $gender=="other") echo "checked";?>>
            <label for="other">Other</label>
        </div>
        <span class="error"><?php echo $genderErr;?></span><br><br>

        

        <label for="interests">Interests:</label>
        <div class="radio-group">
            <input type="checkbox" id="sports" name="interests[]" value="sports" <?php if (in_array("sports", $interests)) echo "checked";?>>
            <label for="sports">Sports</label>
            <input type="checkbox" id="music" name="interests[]" value="music" <?php if (in_array("music", $interests)) echo "checked";?>>
            <label for="music">Music</label>
            <input type="checkbox" id="travel" name="interests[]" value="travel" <?php if (in_array("travel", $interests)) echo "checked";?>>
            <label for="travel">Travel</label>
        </div>
        <br><br>

        <label for="country">Country:</label>
        <select id="country" name="country">
            <option value="usa" <?php if (isset($country) && $country=="usa") echo "selected";?>>United States</option>
            <option value="canada" <?php if (isset($country) && $country=="canada") echo "selected";?>>Canada</option>
            <option value="uk" <?php if (isset($country) && $country=="uk") echo "selected";?>>United Kingdom</option>
        </select><br><br>

        <label for="comments">Comments:</label><br>
        <textarea id="comments" name="comments" rows="4"><?php echo $comments;?></textarea><br><br>

        <input type="submit" value="Submit">
    </form>

    <!-- Add Form Response -->
    <div id="form-response">
        <?php echo $formErr;?>
    </div>
    <!-- Display Table of Submitted Responses -->

    <h2>Submitted Responses</h2>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Interests</th>
            <th>Country</th>
            <th>Comments</th>
        </tr>
        <?php
     //Let's get all the cool products
     $results = $pdo->query("SELECT * FROM responses_1");        
         //Show everything we found
     echo "Here's the data contained in the table Responses:" . "<br>";
     while($row = $results->fetch(PDO::FETCH_ASSOC)){
        echo "<tr>
        <td>" . $row["name"] . "</td>
        <td>" . $row["email"] . "</td>
        <td>" . $row["age"] . "</td>
        <td>" . $row["gender"] . "</td>
        <td>" . $row["interests"] . "</td>
        <td>" . $row["country"] . "</td>
        <td>" . $row["comments"] . "</td>
      </tr>";
     }
        ?>
    </table>
   
</body>
</html>