<!DOCTYPE html>
<html>
<head>
    <title>Student Grades</title>
</head>
<body>
    <h1>Enter Student Details</h1>
    <form method="post">
        <label for="name">Student Name:</label>
        <input type="text" id="name" name="name" required><br><br>


        <label for="grade">Student Grade:</label>
        <input type="number" id="grade" name="grade" min="0" max="100" required><br><br>


        <button type="submit" name="submit">Add Student</button>
    </form>


    <?php
    session_start();


    // Initialize the students array in the session
    if (!isset($_SESSION['students'])) {
        $_SESSION['students'] = [];
    }


    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
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
</html><?php
session_start();
/*
session_start needs to be before other code on our site.
Session data needs to be stored before other data
or else it won't work when we upload it to a Dreamhost
  */
?>
<!DOCTYPE html>
<html>
<body>

<!-- Student Form -->
<h2>Student Grades Management</h2>
<!-- Set Form Action & Form Method -->
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Student Name: <input type="text" name="student_name">
  Grade: <input type="text" name="student_grade">
  <input type="submit" value="Add Student">
</form>

<!-- Handle Form Submission & Manage Data -->
<?php
// store data in array

if (!isset($_SESSION['students'])) {
    $_SESSION['students'] = array();
}

// set global variables

global $total_students;
global $total_sum;

// Track total number of students & sum of grades

$total_students = isset($_SESSION['total_students']) ? $_SESSION['total_students'] : 0;
$total_sum = isset($_SESSION['total_sum']) ? $_SESSION['total_sum'] : 0;

// capture data

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
}
?>

<!-- Display Student Data & Calculate Grades -->

<?php

// Display Data

function displayStudents($students) {
    echo "<h3>Student List:</h3>";
    echo "<table border='1'><tr><th>Name</th><th>Grade</th></tr>";
    foreach ($students as $student) {
        echo "<tr><td>" . $student['name'] . "</td><td>" . $student['grade'] . "</td></tr>";
    }
    echo "</table>";
}

// Calculate Average Grade

function calculateAverage($total_sum, $total_students) {
    return $total_students > 0 ? $total_sum / $total_students : 0;
}

// Calculate Highest Grade

function findHighestGrade($students) {
    $max = -INF;
    foreach ($students as $student) {
        if ($student['grade'] > $max) {
            $max = $student['grade'];
        }
    }
    return $max;
}

// Calculate Lowest Grade

function findLowestGrade($students) {
    $min = INF;
    foreach ($students as $student) {
        if ($student['grade'] < $min) {
            $min = $student['grade'];
        }
    }
    return $min;
}

// Display Grades Data

if (!empty($_SESSION['students'])) {
    displayStudents($_SESSION['students']);
    echo "<h3>Statistics:</h3>";
    echo "Average Grade: " . calculateAverage($total_sum, $total_students) . "<br>";
    echo "Highest Grade: " . findHighestGrade($_SESSION['students']) . "<br>";
    echo "Lowest Grade: " . findLowestGrade($_SESSION['students']) . "<br>";
}
?>

</body>
</html>