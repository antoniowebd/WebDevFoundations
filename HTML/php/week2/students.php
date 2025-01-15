<?php
    session_start();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Grades</title>
    <link rel="stylesheet" href="style.css">
    
</head>


<body>
    <h1>Enter Student Details</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    

        <label for="name">Student Name:</label>
        <input type="text" id="name" name="name" required><br><br>


        <label for="grade">Student Grade:</label>
        <input type="number" id="grade" name="grade" min="0" max="100" required><br><br>


        <button type="submit" name="submit">Add Student</button>
    </form>


    
    <?php

    // Handle form submission
// Initialize the students array in the session
    if (!isset($_SESSION['students'])) {
        $_SESSION['students'] = [];
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $name = htmlspecialchars($_POST['name']);
        $grade = (int) $_POST['grade'];


        // Add the new student to the array
        $_SESSION['students'][] = [
            'name' => $name,
            'grade' => $grade
        ];
    }


    // Display the student data
    if (!empty($_SESSION['students'])) {
        echo "<h2>Student List</h2>";
        echo "<table border='1' cellpadding='10' cellspacing='0'>";
        echo "<tr><th>Name</th><th>Grade</th></tr>";


        foreach ($_SESSION['students'] as $student) {
            echo "<tr>";
            echo "<td>{$student['name']}</td>";
            echo "<td>{$student['grade']}</td>";
            echo "</tr>";
        }


        echo "</table>";
    }
    ?>
</body>
</html>