<?php
//Start the session
session_start()
?>
<!DOCTYPE html>
<html>
<body>
    <?php
    //Set session variables
    $_SESSION["username"] = "Antonio Acatecatl";
    $_SESSION["email"] = "antonioa@slcc.edu";
    echo "<strong>Session variables 'username' and 'email' are set.</strong>";
    ?>
</body>
</html>