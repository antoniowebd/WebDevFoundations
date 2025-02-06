<?php
//Start the session
session_start()
?>
<!DOCTYPE html>
<html>
<body>
    <?php
    echo "<strong>Username is </strong>" . $_SESSION["username"] . "<br>";
    echo "<strong>Email is </strong>" . $_SESSION["email"] . "<br>";
    ?>
</body>
</html>