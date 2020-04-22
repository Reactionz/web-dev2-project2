<?php 
    require_once "connect.php";
    require_once "utilities.php";
    session_unset(); // Unset all session variables
    session_destroy(); // Destroy the session
    // Redirect back to the home page!
    
    header("location: home.php");
?>