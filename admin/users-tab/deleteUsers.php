<?php
require('../../storeDB.php');

if(isset($_POST['delete'])) {
    // Get the user ID to be deleted
    $id = $_POST['id'];
  
    // Create a delete query
    $sql = "DELETE FROM user WHERE id = '$id'";
  
    // Execute the delete query
    mysqli_query($conn, $sql);
  
    // Redirect to the page with the table of users
    header("Location: user.php");
     mysqli_close($conn); 
  }


 





















?>