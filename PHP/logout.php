<?php
session_start();
unset($_SESSION["usernm"]);  
header("Location: ../login.php");

?>