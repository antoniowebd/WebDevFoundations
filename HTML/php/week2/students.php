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

    // Global variables
    global $total_students;
    global $total_grades;

    // Counting total number of students and sum of grades

    $total_students = isset($_SESSION['total_studernts']) ? $_SESSION['total_students'] :0;
    $total_grades = isset($_SESSION['total_grades']) ? $_SESSION['total_grades'] :0;

    // Get data

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $name = htmlspecialchars($_POST['name']);
        $grade = (int) $_POST['grade'];


        // Add the new student to the array
        $_SESSION['students'][] = [
            'name' => $name,
            'grade' => $grade
        ];

        $total_students++;
        $total_grades+=$student_grade;

        $_SESSION['total_students']=$total_students;
        $_SESSION['total_grades'] = $total_grades;
    }


    // Display the student data
    /*if (!empty($_SESSION['students'])) {
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
    }*/

    // Calculate average grade
    function average($total_grades, $total_students): float|int {
        return $total_students > 0 ? $total_grades / $total_students : 0;
    }

    // Calculate highest grade
    function highest($students){
        $max=-INF;
        foreach ($students as $student) {
            if ($student['grade'] > $max) {
                $max=$student['grade'];
            }
        }
        return $max;
    }

    // Calculate lowest grade

    function lowest($students){
        $min=INF;
        foreach ($students as $student) {
            if ($student['grade'] < $min) {
                $min=$student['grade'];
            }
        }
        return $min;
    }

    // Display grades

    if (!empty($_SESSION['students'])) {
        echo "<h2>Student Grades</h2>";
        echo "<table border='1' cellpadding='10' cellspacing='0'>";
        echo "<tr><th>Name</th><th>Grade</th></tr>";


        foreach ($_SESSION['students'] as $student) {
            echo "<tr>";
            echo "<td>{$student['name']}</td>";
            echo "<td>{$student['grade']}</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<br>";
        echo "Average Grade " . average($total_grades,$total_students) . "<br>";
        echo "Highest Grade " . highest($_SESSION['students']) . "<br>";
        echo "Lowest Grade " . lowest($_SESSION['students']) . "<br>";
        echo "Suma de grados " . "$total_grades" . "<br>";
        echo "estudiantes " . $total_students . "<br>";
    }

    ?>
</body>
</html>