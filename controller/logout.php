<?php
session_start();
//destroying session variables
unset($_SESSION["sessionId"]);
unset($_SESSION["sessionEmail"]);
unset($_SESSION["sessionFname"]);
unset($_SESSION["sessionLname"]);

header("Location:../index.php");
?>
