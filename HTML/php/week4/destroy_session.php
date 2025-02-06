<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// remove all session variables
session_unset();
echo"Variables were removed<br>";

// destroy the session
session_destroy();
echo"Session was destroyed<br>";
?>

</body>
</html>