<?php
session_start();
/*
session_start needs to be before other code on our site.
Session data needs to be stored before other data
or else it won't work when we upload it to a Dreamhost
  */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Grade Manager</title>
    <link rel="stylesheet" href="style.css">
    
</head>

<body>
<header>
        <h1>Student Grades Management</h1>
</header>

<!-- Student Form -->
<!--<h2>Student Grades Management</h2>-->
<!-- Set Form Action & Form Method -->
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Student Name: <input type="text" name="student_name" required><br><br>
  Grade (0-100): <input type="text" name="student_grade" required><br><br>
  <input class="button button2"  type="submit" value="Add Student">
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
    echo "<table border='1' cellpadding='10'><tr><th>Name</th><th>Grade</th></tr>";
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
    echo "Average Grade: " . round(calculateAverage($total_sum, $total_students),1) . "<br>";
    echo "Highest Grade: " . findHighestGrade($_SESSION['students']) . "<br>";
    echo '<div class="result"> "Lowest Grade: "  </div>' . findLowestGrade($_SESSION['students']) . "<br>";
}
?>

</body>
</html>