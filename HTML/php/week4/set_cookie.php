<?php
   $cookie_name = "user";
   $cookie_value = "Antonio Acatecatl";
   setcookie($cookie_name, $cookie_value, time() + (86400 * 1), "/"); // 86400 = 1 day
   ?>
   <!DOCTYPE html>
   <html>
   <body>
   
   <?php
   if(!isset($_COOKIE[$cookie_name])) {
       echo "Cookie named '" . $cookie_name . "' is not set!";
   } else {
       echo "<strong>Cookie '</strong>" . $cookie_name . "<strong>' is set!</strong><br>";
       echo "<strong>Value is: </strong>" . $_COOKIE[$cookie_name];
   }
   ?>
   
   </body>
   </html>