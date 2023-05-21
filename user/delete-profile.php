<?php 

    require('../storeDB.php');
    session_start();
    if (isset($_SESSION['user'])) {
        $userId = $_SESSION['user_id'];
        $query = "DELETE FROM user WHERE id='$userId'";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            echo "success";
           
        } else {
            echo "error";
        }
    } else {
        echo "error";
    }


    mysqli_close($conn); 
?>