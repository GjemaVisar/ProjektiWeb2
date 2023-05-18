<?php
    session_start(); // to ensure you are using the same session
    session_unset(); // remove all session variables
    session_destroy(); // destroy the session
    header("location:../login.php");
    exit();
?>