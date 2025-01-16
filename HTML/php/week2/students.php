
<?php
    session_start();
    /* Include the start() function at the very beginning of the file is important to have access to 
     related functions like $SESSION and to store user-specific data*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Grade Manager</title>
    <link rel="stylesheet" href="style.css">
    
</head>

<!--Add FORM method 
The method attribute of an HTML <form> element determines the HTTP method to be 
    used when submitting form data to the server. There are two common methods: GET and POST
-->
<body>
    <h1>Enter Student Details</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    

        <label for="name">Student Name:</label>
        <input type="text" id="name" name="name" required><br><br>


        <label for="grade">Student Grade (0-100):</label>
        <input type="number" id="grade" name="grade" min="0" max="100" required><br><br>


        <button  class="button button2" type="submit" name="submit">Add Student</button>
    </form>


    
    <?php

    // Handle form submission
    // Initialize the students array in the session
    if (!isset($_SESSION['students'])) {
        $_SESSION['students'] = array();
    }

    // Global variables
    global $total_students;
    global $total_grades;

    // Counting total number of students and sum of grades

    $total_students = isset($_SESSION['total_students']) ? $_SESSION['total_students'] :0;
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
        // The variable increment in 1 for each student stored in the array
        $total_students++;
        $total_grades+=$grade;
        $_SESSION['total_students']=$total_students;
        $_SESSION['total_grades']=$total_grades;

    }

    /*if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $student_name = $_POST['student_name'];
        $student_grade = $_POST['student_grade'];
        
        if (!empty($student_name) && is_numeric($student_grade)) {
            $_SESSION['students'][] = array("name" => $student_name, "grade" => $student_grade);
            
            $total_students++;
            $total_sum += $student_grade;
    
            $_SESSION['total_students'] = $total_students;
            $_SESSION['total_sum'] = $total_sum;
        } else {
            echo "Please enter a valid name and numeric grade.";
        }
    }*/


?>
<?php
    // Calculate average grade taking the sum of all the student's grades and divided by the number of students
    function average($total_grades, $total_students): float|int {
        return $total_students > 0 ? $total_grades / $total_students : 0;
    }

    // Calculate highest grade using a loop
    function highest($students){
        $max=-INF;
        foreach ($students as $student) {
            if ($student['grade'] > $max) {
                $max=$student['grade'];
            }
        }
        return $max;
    }

    // Calculate lowest grade using a loop
    function lowest($students){
        $min=INF;
        foreach ($students as $student) {
            if ($student['grade'] < $min) {
                $min=$student['grade'];
            }
        }
        return $min;
    }
    // Calculate the sum of all the grades
    function sumar($students){
        
            $sum=array_sum(array_column($students,"grade"));
            return $sum;
    }

    // Display grades using a table and a loop

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
        echo "Average Grade " . round(sumar($_SESSION['students']) / $total_students,1) . "<br>";
        echo "Highest Grade " . highest($_SESSION['students']) . "<br>";
        echo "Lowest Grade " . lowest($_SESSION['students']) . "<br>";


    }
    ?>

</body>
</html>