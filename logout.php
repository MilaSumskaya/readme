<?php
    session_start();
    unset($_SESSION["UserRole"]); 
    unset($_SESSION["UserID"]);
    unset($_SESSION["UserLogin"]);
    header("Location: index.php");
?>
