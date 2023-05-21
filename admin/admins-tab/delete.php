<?php

require('../../storeDB.php');
session_start();

if (isset($_POST['delete_btn'])) {
    $id = $_POST['delete_id'];

    // Check if the current admin is the one allowed to delete
    $allowedAdminId = 13; // Replace 13 with the ID of the specific admin

    if ($_SESSION['admin_id'] != $allowedAdminId) {
        $_SESSION['status'] = "You are not authorized to delete admins.";
        header('Location: accounts.php');
        exit();
    }

    // Check if the admin is deleting their own account
    if ($allowedAdminId == $id) {
        $_SESSION['status'] = "You cannot delete your own admin account.";
        header('Location: accounts.php');
        exit();
    }

    // Validate and sanitize the input
    if (!filter_var($id, FILTER_VALIDATE_INT)) {
        $_SESSION['status'] = "Invalid admin ID.";
        header('Location: accounts.php');
        exit();
    }

    $id = mysqli_real_escape_string($conn, $id); // Sanitize the input

    $query = "DELETE FROM user WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    // if ($query_run) {
    //     $_SESSION['success'] = "Admin with ID $id has been deleted.";
    //     header('Location: accounts.php');
    //     exit();
    // } else {
    //     $_SESSION['status'] = "Failed to delete admin with ID $id.";
    //     header('Location: accounts.php');
    //     exit();
    // }
}

mysqli_close($conn);
?>
