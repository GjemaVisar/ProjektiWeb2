<?php

require('../../storeDB.php');
session_start();

if (isset($_POST['delete_btn'])) {
    $id = $_POST['delete_id'];

    
    $allowedAdminId = 13; 

    if ($_SESSION['admin_id'] != $allowedAdminId) {
        $_SESSION['status'] = "You are not authorized to delete admins.";
        header('Location: accounts.php');
        exit();
    }

    
    if ($allowedAdminId == $id) {
        $_SESSION['status'] = "You cannot delete your own admin account.";
        header('Location: accounts.php');
        exit();
    }

    
    if (!filter_var($id, FILTER_VALIDATE_INT)) {
        $_SESSION['status'] = "Invalid admin ID.";
        header('Location: accounts.php');
        exit();
    }

    $id = mysqli_real_escape_string($conn, $id); 

    $query = "DELETE FROM user WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['success'] = "Admin with ID $id has been deleted.";
        header('Location: accounts.php');
        exit();
    } else {
        $_SESSION['status'] = "Failed to delete admin with ID $id.";
        header('Location: accounts.php');
        exit();
    }
}

mysqli_close($conn);
?>
