<?php
//Start the session
session_start()
?>
<!DOCTYPE html>
<html>
<body>
    <?php
    //Set session variables
    $_SESSION["username"] = " ";
    $_SESSION["email"] = " ";
    echo "<strong>Session variables 'username' and 'email' are set.</strong>";
    ?>
</body>
</html>