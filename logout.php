
<?php
   session_start();
   unset($_SESSION["session"]);
   session_destroy();

   
   echo '<script> alert("LOGGING OUT")</script>';
   echo "<script> location.href='login-signup.php'; </script>";

?>


