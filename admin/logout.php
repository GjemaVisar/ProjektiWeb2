<?php 
    session_start();  
   
    unset($_SESSION['admin']); //destroy the session
    unset($_SESSION['user']);
    header("location:../login.php"); //to redirect back to "index.php" after logging out
    exit();
?>